<?php

namespace WPStaging\Backend\Pro\Modules\Jobs;

// No Direct Access
use WPStaging\Utils\Logger;

if( !defined( "WPINC" ) ) {
    die;
}

/**
 * Class Files
 * @package WPStaging\Backend\Modules\Jobs
 */
class Files extends \WPStaging\Backend\Modules\Jobs\JobExecutable {

    /**
     * @var \SplFileObject
     */
    private $file;

    /**
     * @var int
     */
    private $maxFilesPerRun;

    /**
     * @var string
     */
    private $destination;

    /**
     * Initialization
     */
    public function initialize() {

        if( empty( $this->options->clone ) ) {
            $this->returnException( 'Fatal Error: Files - Can not detect staging site sub folder' );
        }

        $this->destination = ABSPATH;

        $filePath = $this->cache->getCacheDir() . "files_to_copy." . $this->cache->getCacheExtension();

        if( is_file( $filePath ) ) {
            $this->file = new \SplFileObject( $filePath, 'r' );
        }

        // Informational logs
        if( 0 == $this->options->currentStep ) {
            $this->log( "Files: Copying files..." );
        }

        $this->settings->batchSize = $this->settings->batchSize * 1000000;
        //$this->maxFilesPerRun = $this->settings->fileLimit;
        $this->maxFilesPerRun      = ($this->settings->cpuLoad === 'low') ? 50 : 1;

        // Finished - We need this here as well as in the execute() method because execute() is not run at all if totalSteps == 0 (e.g. excluding all folders). Otherwise job never ends
        if( $this->isFinished() ) {
            $this->prepareResponse( true, false );
            return false;
        }
    }

    /**
     * Calculate Total Steps in This Job and Assign It to $this->options->totalSteps
     * @return void
     */
    protected function calculateTotalSteps() {
        $this->options->totalSteps = ceil( $this->options->totalFiles / $this->maxFilesPerRun );
    }

    /**
     * Execute the Current Step
     * Returns false when over threshold limits are hit or when the job is done, true otherwise
     * @return bool
     */
    protected function execute() {
        // Finished
        if( $this->isFinished() ) {
            $this->log( "Files: Copy process finished. Continue next step..." );
            $this->prepareResponse( true, false );
            return false;
        }

        // Get files and copy'em
        if( !$this->getFilesAndCopy() ) {
            $this->prepareResponse( false, false );
            return false;
        }

        // Prepare and return response
        $this->prepareResponse();

        // Not finished
        return true;
    }

    /**
     * Get files and copy
     * @return bool
     */
    private function getFilesAndCopy() {
        // Over limits threshold
        if( $this->isOverThreshold() ) {
            // Prepare response and save current progress
            $this->prepareResponse( false, false );
            $this->saveOptions();
            return false;
        }

        // Go to last copied line and than to next one
        //if ($this->options->copiedFiles != 0) {
        if( isset( $this->options->copiedFiles ) && $this->options->copiedFiles != 0 ) {
            $this->file->seek( $this->options->copiedFiles - 1 );
        }

        $this->file->setFlags( \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_AHEAD );

        // Start time
        //$start = microtime( true );
        // Loop x files at a time
        //$this->maxFilesPerRun = 300;
        for ( $i = 0; $i < $this->maxFilesPerRun; $i++ ) {

            // Reached timeout
//            if( ( $timeout = apply_filters( 'wpstg_job_timeout', 10 ) ) ) {
//                if( ( \microtime( true ) - $start ) > $timeout ) {
//                    // Prepare response and save current progress
//                    $this->prepareResponse( false, true );
//                    $this->saveOptions();
//                    return false;
//                }
//            }
            // Increment copied files
            // Do this anytime to make sure to not stuck in the same step / files
            $this->options->copiedFiles++;

            // End of file
            if( $this->file->eof() ) {
                break;
            }

            $file = $this->file->fgets();

//            if( false !== strpos( $file, 'index.php' ) ) {
//                $test = $file;
//            }
            $this->copyFile( $file );
        }

        $totalFiles = $this->options->copiedFiles;
        // Log this only every 50 entries to keep the log small and to not block the rendering browser
        if( $this->options->copiedFiles % 50 == 0 ) {
            $this->log( "Total {$totalFiles} files processed" );
        }

        return true;
    }

    /**
     * Checks Whether There is Any Job to Execute or Not
     * @return bool
     */
    private function isFinished() {
        if(
                $this->options->totalSteps == 0 ||
                $this->options->currentStep > $this->options->totalSteps ||
                $this->options->copiedFiles >= $this->options->totalFiles ) {

            return true;
        }
        return false;
    }

    /**
     * @param string $file
     * @return bool
     */
    private function copyFile( $file ) {
        // Add missing path
        $file = trim( $this->options->path . $file );

        $directory = dirname( $file );

        // Directory is excluded
        if( $this->isDirectoryExcluded( $directory ) ) {
            $this->debugLog( "Files: Skipping file/directory by rule: {$file}", Logger::TYPE_INFO );
            return false;
        }

        // Invalid file, skipping it as if succeeded
        if( !is_file( $file ) ) {
            $this->debugLog( "Not a file {$file}" );
            return true;
        }
        // Invalid file, skipping it as if succeeded
        if( !is_readable( $file ) ) {
            $this->log( "Can't read file {$file}", Logger::TYPE_WARNING );
            return true;
        }

        // File is excluded
        if( $this->isFileExcluded( $file ) ) {
            $this->debugLog( "Files: Skipping file by rule: {$file}", Logger::TYPE_INFO );
            return false;
        }


        // Get file size
        $fileSize = filesize( $file );

        // File is over maximum allowed file size (8MB)
        if( $fileSize >= $this->settings->maxFileSize * 1000000 ) {
            $this->debugLog( "Files: Skipping big file: {$file}", Logger::TYPE_INFO );
            return false;
        }

        // Failed to get destination
        if( false === ($destination = $this->getDestination( $file )) ) {
            $this->log( "Files: Can't get the destination of {$file}", Logger::TYPE_WARNING );
            return false;
        }

        // File is over batch size
        if( $fileSize >= $this->settings->batchSize ) {
            $this->log( "Files: Trying to copy big file: {$file} -> {$destination}", Logger::TYPE_INFO );
            return $this->copyBig( $file, $destination, $this->settings->batchSize );
        }

        // Attempt to copy
        if( !@copy( $file, $destination ) ) {
            $errors = error_get_last();
            $this->log( "Files: Failed to copy file to destination. Error: {$errors['message']} {$file} -> {$destination}", Logger::TYPE_ERROR );
            return false;
        }

        // Set file permissions
        @chmod( $destination, wpstg_get_permissions_for_file() );

        $this->setDirPermissions( $destination );

        $this->debugLog( 'Files: Copy file ' . $file, Logger::TYPE_DEBUG );

        return true;
    }

    /**
     * Set directory permissions
     * @param type $file
     * @return boolean
     */
    private function setDirPermissions( $file ) {
        $dir = dirname( $file );
        if( is_dir( $dir ) ) {
            @chmod( $dir, wpstg_get_permissions_for_directory() );
        }
        return false;
    }

    /**
     * Gets destination file and checks if the directory exists, if it does not attempt to create it.
     * If creating destination directory fails, it returns false, gives destination full path otherwise
     * @param string $file
     * @return bool|string
     */
    private function getDestination( $file ) {

        // Change path if wp-content or wp-content/uploads have been customized
        $file = $this->getWpContentPath( $file );

        $relativePath         = str_replace( $this->options->path, null, $file );
        $destinationPath      = $this->destination . $relativePath;
        $destinationDirectory = dirname( $destinationPath );

        if( !is_dir( $destinationDirectory ) && !@mkdir( $destinationDirectory, wpstg_get_permissions_for_directory(), true ) ) {
            $this->log( "Files: Can not create directory {$destinationDirectory}", Logger::TYPE_ERROR );
            return false;
        }

        return $this->sanitizeDirectorySeparator( $destinationPath );
    }

    /**
     * Get wp-content and wp-content/uploads destination dir
     * Necessary if these folders were customized and changed from the default ones.
     * 
     * @return string absolute path to the file on the staging site
     */
    protected function getWpContentPath( $file ) {
        $uploads = wp_upload_dir();

        // Get absolute upload dir
        $uploadsAbsPath = trailingslashit( $uploads['basedir'] );

        // Relative upload dir including trailingslash and leading slash
        $uploadsRelDir = str_replace( ABSPATH, '', $uploadsAbsPath );
        $uploadsRelDir = trim( $uploadsRelDir, '/' );
        $uploadsRelDir = "/{$uploadsRelDir}/";


        // Get relative custom wp-content dir including trailingslash and leading slash
        $wpContentRelDir = str_replace( ABSPATH, '', WP_CONTENT_DIR );
        $wpContentRelDir = trim( $wpContentRelDir, '/' );
        $wpContentRelDir = "/{$wpContentRelDir}/";

        // How many search & replace has been done
        $count = 0;
        
        // Check if there is a custom uploads directory and do a search $ replace if path begins with wp-content/uploads
        if( strpos( $file, $this->options->path . 'wp-content/uploads/' ) === 0 ) {
            $count = 1;
            $file = str_replace( '/wp-content/uploads/', $uploadsRelDir, $file, $count );
        }

        // If there is no custom wp-content/uploads directory do a search & replace of the custom wp-content part if strings begins with wp-content/
        if( $count === 0 && strpos( $file, $this->options->path . 'wp-content/' ) === 0 ) {
            //$file = str_replace( 'wp-content/', $wpContentRelDir , $file );
            $file = wpstg_replace_first_match( '/wp-content/', $wpContentRelDir, $file );
        }


        return $file;
    }

    /**
     * Copy bigger files than $this->settings->batchSize
     * @param string $src
     * @param string $dst
     * @param int $buffersize
     * @return boolean
     */
    private function copyBig( $src, $dst, $buffersize ) {
        $src  = fopen( $src, 'r' );
        $dest = fopen( $dst, 'w' );

        // Try first method:
        while ( !feof( $src ) ) {
            if( false === fwrite( $dest, fread( $src, $buffersize ) ) ) {
                $error = true;
            }
        }
        // Try second method if first one failed
        if( isset( $error ) && ($error === true) ) {
            while ( !feof( $src ) ) {
                if( false === stream_copy_to_stream( $src, $dest, 1024 ) ) {
                    $this->log( "Can not copy file; {$src} -> {$dest}" );
                    fclose( $src );
                    fclose( $dest );
                    return false;
                }
            }
        }
        // Close any open handler
        fclose( $src );
        fclose( $dest );
        return true;
    }

    /**
     * Check if file is excluded from copying process
     * 
     * @param string $file filename including ending
     * @return boolean
     */
    private function isFileExcluded( $file ) {
        // If file name exists
        if( in_array( basename( $file ), $this->options->excludedFiles ) ) {
            return true;
        }
        // If path exists
        foreach ( $this->options->excludedFiles as $excludedFile ) {
            if( false !== strpos( $file, $excludedFile ) ) {
                return true;
            }
        }
        return false;
    }

    /**
     * Replace forward slash with current directory separator
     * Windows Compatibility Fix
     * @param string $path Path
     *
     * @return string
     */
    private function sanitizeDirectorySeparator( $path ) {
        //$string = str_replace( '\\', '/', $path );
        //$string = str_replace( "/", "\\", $path );
        //return str_replace( '\\\\', '\\', $string );
        //return preg_replace( '/[\\\\]+/', '\\\\\\\\', $string );
        return preg_replace( '/[\\\\]+/', '/', $path );
    }

    /**
     * Check if directory is excluded from copying
     * @param string $directory
     * @return bool
     */
    private function isDirectoryExcluded( $directory ) {
        $directory = $this->sanitizeDirectorySeparator( $directory );
        foreach ( $this->options->excludedDirectories as $excludedDirectory ) {
            $excludedDirectory = $this->sanitizeDirectorySeparator( $excludedDirectory );
            if( strpos( trailingslashit( $directory ), trailingslashit( $excludedDirectory ) ) === 0 ) {
                return true;
            }
        }

        return false;
    }

}
