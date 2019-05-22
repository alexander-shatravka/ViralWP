<ul id="wpstg-steps">
    <li class="wpstg-current-step">
        <span class="wpstg-step-num">1</span>
        <?php echo __( "Overview", "wp-staging" ) ?>
    </li>
    <li>
        <span class="wpstg-step-num">2</span>
        <?php echo __( "Scanning", "wp-staging" ) ?>
    </li>
    <li>
        <span class="wpstg-step-num">3</span>
        <?php echo __( "Cloning", "wp-staging" ) ?>
    </li>
    <li>
        <button type="button" id="wpstg-report-issue-button" class="wpstg-button">
            <i class="wpstg-icon-issue"></i><?php echo __( "Report Issue", "wp-staging" ); ?>
        </button>
    </li>
    <li>
        <span id="wpstg-loader" style="display:none;"></span>
    </li>
</ul>

<div id="wpstg-workflow"></div>