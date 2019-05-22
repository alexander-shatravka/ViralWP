<?php
if( empty( $options->current ) || null === $options->current ) {
    ?>

    <p>
        <strong style="font-size: 14px;"> <?php _e( 'Copy Staging Site to Custom Directory', 'wp-staging' ); ?></strong>
        <br>
        <?php _e( 'Path must be writeable by PHP and an absolute path like <code>/www/public_html/dev</code>.', 'wp-staging' ); ?>
    </p>
    <table cellspacing="0" id="wpstg-clone-directory">
        <tbody>
            <tr><th style="text-align:left;min-width: 120px;">Target Directory: </th>
                <td> <input style="width:300px;" type="text" name="wpstg_clone_dir" id="wpstg_clone_dir" value="" title="wpstg_clone_dir" placeholder="<?php echo \WPStaging\WPStaging::getWPpath(); ?>" autocapitalize="off"></td>
            </tr>
            <tr>
                <td></td>
                <td><code>Default: <?php echo \WPStaging\WPStaging::getWPpath(); ?></code></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p><strong style="font-size: 14px;"> <?php _e( 'Specify Target Hostname', 'wp-staging' ); ?></strong>
                    <br/>
                    <?php _e( 'Set the hostname of the target site, for instance https://staging.domain.com', 'wp-staging' ); ?></p>
                </td>
            </tr>
            <tr><th style="text-align:left;min-width:120px;">Target Hostname: </th><td> <input style="width:300px;" type="text" name="wpstg_clone_hostname" id="wpstg_clone_hostname" value="" title="wpstg_clone_hostname" placeholder="<?php echo get_site_url(); ?>" autocapitalize="off">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><code>Default: <?php echo get_site_url(); ?></code></td>
            </tr>
        </tbody>
    </table>

    <?php
} else {

    $cloneDir  = isset( $options->existingClones[$options->current]['cloneDir'] ) ? $options->existingClones[$options->current]['cloneDir'] : '';
    $hostname  = isset( $options->existingClones[$options->current]['url'] ) ? $options->existingClones[$options->current]['url'] : '';
    $directory = isset( $options->existingClones[$options->current]['path'] ) ? $options->existingClones[$options->current]['path'] : '';
    ?>

    <table cellspacing="0" id="wpstg-clone-directory">
        <tbody>
            <tr><th style="text-align:left;min-width: 120px;">Target Directory: </th>
                <td> <input disabled="disabled" readonly style="width:300px;" type="text" name="wpstg_clone_dir" id="wpstg_clone_dir" value="<?php echo $directory; ?>" title="wpstg_clone_dir" placeholder="<?php echo \WPStaging\WPStaging::getWPpath(); ?>" autocapitalize="off"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
            </tr>
            <tr><th style="text-align:left;min-width:120px;">Target Hostname: </th><td> <input style="width:300px;" type="text" name="wpstg_clone_hostname" id="wpstg_clone_hostname" value="<?php echo $hostname; ?>" title="wpstg_clone_hostname" placeholder="<?php echo get_site_url(); ?>" autocapitalize="off">
                </td>
            </tr>
        </tbody>
    </table>

<?php } ?>

