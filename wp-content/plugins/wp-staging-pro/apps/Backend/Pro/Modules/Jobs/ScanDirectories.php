<?php

namespace WPStaging\Backend\Pro\Modules\Jobs;

// No Direct Access
if( !defined( "WPINC" ) ) {
    die;
}

use WPStaging\WPStaging;
use WPStaging\Utils\Logger;
use WPStaging\Utils\Strings;
use WPStaging\Iterators\RecursiveDirectoryIterator;
use WPStaging\Iterators\RecursiveFilterExclude;

/**
 * Class ScanDirectories
 * Scan the file system for all files and folders to copy
 * @package WPStaging\Backend\Modules\Directories
 */
class ScanDirectories extends \WPStaging\Backend\Modules\Jobs\JobExecutable {

    /**
     * @var array
     */
    private $files = array();

    /**
     * Total steps to do
     * @var int
     */
    private $total = 4;

    /**
     * File name of the caching file
     * @var type 
     */
    private $filename;

    /**
     * Initialize
     */
    public function initialize() {
        $this->filename = $this->cache->getCacheDir() . "files_to_copy." . $this->cache->getCacheExtension();
    }

    /**
     * Calculate Total Steps in This Job and Assign It to $this->options->totalSteps
     * @return void
     */
    protected function calculateTotalSteps() {

        $this->options->totalSteps = $this->total + count( $this->options->extraDirectories );
    }

    /**
     * Start Module
     * @return object
     */
    public function start() {

        // Execute steps
        $this->run();

        // Save option, progress
        $this->saveProgress();

        return ( object ) $this->response;
    }

    /**
     * Step 0
     * Get Plugin Files    
     */
    public function getStagingPlugins() {

        $path = trailingslashit( $this->options->path ) . 'wp-content' . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR;

        // Skip it
        if( $this->isDirectoryExcluded( $path ) ) {
            $this->log( "Scanning: Skip " . $path );
            return true;
        }


        // open file handle
        $files = $this->open( $this->filename, 'a' );

        $excludeFolders = array(
            'cache',
            'wps-hide-login',
            'node_modules',
            'nbproject',
            'wp-staging'
        );

        try {

            // Iterate over plugins directory
            $iterator = new \WPStaging\Iterators\RecursiveDirectoryIterator( $path );

            // Exclude uploads, plugins or themes
            $iterator = new \WPStaging\Iterators\RecursiveFilterExclude( $iterator, apply_filters( 'wpstg_push_excl_folders_custom', $excludeFolders ) );

            // Recursively iterate over content directory
            $iterator = new \RecursiveIteratorIterator( $iterator, \RecursiveIteratorIterator::LEAVES_ONLY, \RecursiveIteratorIterator::CATCH_GET_CHILD );

            $this->log( "Scanning {$path} for its sub-directories and files" );

            // Write path line
            foreach ( $iterator as $item ) {
                if( $item->isFile() ) {
                    if( $this->write( $files, 'wp-content' . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . $iterator->getSubPathName() . PHP_EOL ) ) {
                        $this->options->totalFiles++;

                        // Too much time consuming
                        //$this->options->totalFileSize += $iterator->getSize();
                    }
                }
            }
        } catch ( \Exception $e ) {
            $this->returnException( 'Error: ' . $e->getMessage() );
        } catch ( \Exception $e ) {
            // Skip bad file permissions
        }

        // close the file handler
        $this->close( $files );
        return true;
    }

    /**
     * Step 1
     * Get Themes Files    
     */
    public function getStagingThemes() {

        $path = trailingslashit( $this->options->path ) . 'wp-content' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR;

        // Skip it
        if( $this->isDirectoryExcluded( $path ) ) {
            $this->log( "Scanning: Skip " . $path );
            return true;
        }

        // open file handle
        $files = $this->open( $this->filename, 'a' );

//        $excludefolders = array(
//            'cache',
//            'wps-hide-login',
//            'node_modules',
//            'nbproject'
//        );

        try {

            // Iterate over plugins directory
            $iterator = new \WPStaging\Iterators\RecursiveDirectoryIterator( $path );

            // Exclude folders
            //$iterator = new \WPStaging\Iterators\RecursiveFilterExclude( $iterator, $excludeFolders );
            // Exclude themes
            // Recursively iterate over content directory
            $iterator = new \RecursiveIteratorIterator( $iterator, \RecursiveIteratorIterator::LEAVES_ONLY, \RecursiveIteratorIterator::CATCH_GET_CHILD );

            $this->log( "Scanning: {$path} for its sub-directories and files" );

            // Write path line
            foreach ( $iterator as $item ) {
                if( $item->isFile() ) {
                    if( $this->write( $files, 'wp-content' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . $iterator->getSubPathName() . PHP_EOL ) ) {
                        $this->options->totalFiles++;

                        // Too much time consuming
                        //$this->options->totalFileSize += $iterator->getSize();
                    }
                }
            }
        } catch ( \Exception $e ) {
            //$this->returnException('Out of disk space.');
            //throw new \Exception('Error: ' . $e->getMessage());
            $this->returnException( 'Error: ' . $e->getMessage() );
        } catch ( \Exception $e ) {
            // Skip bad file permissions
        }

        // close the file handler
        $this->close( $files );
        return true;
    }

    /**
     * Step 2
     * Get Media Files    
     */
    public function getStagingUploads() {

        $path = trailingslashit( $this->options->path ) . $this->getUploadFolder() . DIRECTORY_SEPARATOR;

        // Skip it
        if( $this->isDirectoryExcluded( $path ) ) {
            $this->log( "Scanning: Skip " . $path );
            return true;
        }

        if( !is_dir( $path ) ) {
            $this->log( "Scanning: Not a valid path " . $path );
            return true;
        }

        // open file handle
        $files = $this->open( $this->filename, 'a' );

        $excludeFolders = array(
            'cache',
            'wps-hide-login',
            'node_modules',
            'nbproject',
            'wp-content'
        );

        try {

            // Iterate over uploads directory
            $iterator = new \WPStaging\Iterators\RecursiveDirectoryIterator( $path );

            // Exclude folders
            $iterator = new \WPStaging\Iterators\RecursiveFilterExclude( $iterator, $excludeFolders );

            // Recursively iterate over uploads directory
            $iterator = new \RecursiveIteratorIterator( $iterator, \RecursiveIteratorIterator::LEAVES_ONLY, \RecursiveIteratorIterator::CATCH_GET_CHILD );

            $this->log( "Scanning {$path} for its sub-directories and files" );

            // Write path line
            foreach ( $iterator as $item ) {
                if( $item->isFile() ) {
                    //if( $this->write( $files, 'wp-content' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $iterator->getSubPathName() . PHP_EOL ) ) {
                    //$newPath = str_replace( ABSPATH . $this->options->directoryName . DIRECTORY_SEPARATOR, '', $path ) . $iterator->getSubPathName() . PHP_EOL;

                    $relUploadPath = str_replace( trailingslashit( $this->options->path ), '', $path ) . $iterator->getSubPathName() . PHP_EOL;
                    if( $this->write( $files, $relUploadPath ) ) {
                        $this->options->totalFiles++;

                        // Too much time consuming
                        //$this->options->totalFileSize += $iterator->getSize();
                    }
                }
            }
        } catch ( \Exception $e ) {
            //throw new \Exception('Error: ' . $e->getMessage());
            $this->returnException( 'Error: ' . $e->getMessage() );
        } catch ( \Exception $e ) {
            // Skip bad file permissions
        }

        // close the file handler
        $this->close( $files );
        return true;
    }

    /**
     * Step 4 - x 
     * Get extra folders of the wp root level
     * Does not collect wp-includes, wp-admin and wp-content folder
     */
    private function getExtraFiles( $folder ) {

        $folder = rtrim( $folder, DIRECTORY_SEPARATOR );

        if( !is_dir( $folder ) ) {
            return true;
        }

        // open file handle and attach data to end of file
        $files = $this->open( $this->filename, 'a' );

        try {

            // Iterate over wp-admin directory
            $iterator = new \WPStaging\Iterators\RecursiveDirectoryIterator( $folder );

            $exclude = array();

            $iterator = new \WPStaging\Iterators\RecursiveFilterExclude( $iterator, $exclude );
            // Recursively iterate over content directory
            $iterator = new \RecursiveIteratorIterator( $iterator, \RecursiveIteratorIterator::LEAVES_ONLY, \RecursiveIteratorIterator::CATCH_GET_CHILD );

            $strings = new Strings();
            $this->log( "Scanning {$folder} for its sub-directories and files" );

            // Write path line
            foreach ( $iterator as $item ) {
                if( $item->isFile() ) {
                    //if( $this->write( $files, $strings->getLastElemAfterString( '/', $folder ) . DIRECTORY_SEPARATOR . $iterator->getSubPathName() . PHP_EOL ) ) {
                    //$newPath = str_replace( ABSPATH, '', $folder ) . $iterator->getSubPathName() . PHP_EOL;
                    $newPath = trailingslashit( str_replace( $this->options->path, '', $folder ) ) . $iterator->getSubPathName() . PHP_EOL;
                    if( $this->write( $files, ltrim( $newPath, DIRECTORY_SEPARATOR ) ) ) {
                        $this->options->totalFiles++;
                        // Too much time consuming
                        //$this->options->totalFileSize += $iterator->getSize();
                    }
                }
            }
        } catch ( \Exception $e ) {
            $this->returnException( 'Error: ' . $e->getMessage() );
        } catch ( \Exception $e ) {
            // Skip bad file permissions
        }

        // close the file handler
        $this->close( $files );
        return true;
    }

    /**
     * Closes a file handle
     *
     * @param  resource $handle File handle to close
     * @return boolean
     */
    public function close( $handle ) {
        return @fclose( $handle );
    }

    /**
     * Opens a file in specified mode
     *
     * @param  string   $file Path to the file to open
     * @param  string   $mode Mode in which to open the file
     * @return resource
     * @throws Exception
     */
    public function open( $file, $mode ) {

        $file_handle = @fopen( $file, $mode );
        if( false === $file_handle ) {
            $this->returnException( sprintf( __( 'Unable to open %s with mode %s', 'wp-staging' ), $file, $mode ) );
        }

        return $file_handle;
    }

    /**
     * Write contents to a file
     *
     * @param  resource $handle  File handle to write to
     * @param  string   $content Contents to write to the file
     * @return integer
     * @throws Exception
     * @throws Exception
     */
    public function write( $handle, $content ) {
        $write_result = @fwrite( $handle, $content );
        if( false === $write_result ) {
            if( ( $meta = \stream_get_meta_data( $handle ) ) ) {
                //$this->returnException(sprintf(__('Unable to write to: %s', 'wp-staging'), $meta['uri']));
                throw new \Exception( sprintf( __( 'Unable to write to: %s', 'wp-staging' ), $meta['uri'] ) );
            }
        } elseif( strlen( $content ) !== $write_result ) {
            //$this->returnException(__('Out of disk space.', 'wp-staging'));
            throw new \Exception( __( 'Out of disk space.', 'wp-staging' ) );
        }

        return $write_result;
    }

    /**
     * Execute the Current Step
     * Returns false when over threshold limits are hit or when the job is done, true otherwise
     * @return bool
     */
    protected function execute() {

        // No job left to execute
        if( $this->isFinished() ) {
            $this->prepareResponse( true, false );
            return false;
        }


//        if ($this->options->currentStep == 0) {
//            $this->getStagingWpRootFiles();
//            $this->prepareResponse(false, true);
//            return false;
//        }

        if( $this->options->currentStep == 0 ) {
            $this->getStagingPlugins();
            $this->prepareResponse( false, true );
            return false;
        }
        if( $this->options->currentStep == 1 ) {
            $this->getStagingThemes();
            $this->prepareResponse( false, true );
            return false;
        }
        if( $this->options->currentStep == 2 ) {
            $this->getStagingUploads();
            $this->prepareResponse( false, true );
            return false;
        }

        if( isset( $this->options->extraDirectories[$this->options->currentStep - $this->total] ) ) {
            $this->getExtraFiles( $this->options->extraDirectories[$this->options->currentStep - $this->total] );
            $this->prepareResponse( false, true );
            return false;
        }

//        if ($this->options->currentStep == 3) {
//            $this->getStagingWpAdminFiles();
//            $this->prepareResponse(false, true);
//            return false;
//        }
        // Not finished - Prepare response
        $this->prepareResponse( false, true );
        return true;
    }

    /**
     * Checks Whether There is Any Job to Execute or Not
     * @return bool
     */
    protected function isFinished() {
        if( $this->options->currentStep > $this->options->totalSteps ) {
            return true;
        }
    }

    /**
     * Save files
     * @return bool
     */
    protected function saveProgress() {
        return $this->saveOptions();
    }

    /**
     * Get files
     * @return void
     */
    protected function getFiles() {
        $fileName = $this->cache->getCacheDir() . "files_to_copy." . $this->cache->getCacheExtension();

        if( false === ($this->files = @file_get_contents( $fileName )) ) {
            $this->files = array();
            return;
        }

        $this->files = explode( PHP_EOL, $this->files );
    }

    /**
     * Replace forward slash with current directory separator
     * Windows Compatibility Fix
     * @param string $path Path
     *
     * @return string
     */
    private function sanitizeDirectorySeparator( $path ) {
        $string = str_replace( "/", "\\", $path );
        return str_replace( '\\\\', '\\', $string );
    }

    /**
     * Check if directory is excluded from scanning
     * @param string $directory
     * @return bool
     */
    protected function isDirectoryExcluded( $directory ) {
        $directory = $this->sanitizeDirectorySeparator( $directory );
        foreach ( $this->options->excludedDirectories as $excludedDirectory ) {
            $excludedDirectory = $this->sanitizeDirectorySeparator( $excludedDirectory );
            if( strpos( trailingslashit( $directory ), trailingslashit( $excludedDirectory ) ) === 0 ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get WP media folder
     * 
     * @return string
     */
    protected function getUploadFolder() {
        $uploads = wp_upload_dir();
        $folder  = str_replace( ABSPATH, '', $uploads['basedir'] );
        return $folder;
    }

}
