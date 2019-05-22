=== WP Staging Pro - DB & File Duplicator & Migration  === 

Author URL: https://wordpress.org/plugins/wp-staging
Plugin URL: https://wordpress.org/plugins/wp-staging
Contributors: ReneHermi, WP-Staging
Donate link: https://wordpress.org/plugins/wp-staging
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: staging, duplication, cloning, clone, migration, sandbox, test site, testing, backup, post, admin, administration, duplicate posts
Requires at least: 3.6+
Tested up to: 5.1
Stable tag: 2.7.6 
Requires PHP: 5.3

A duplicator plugin! Clone, duplicate and migrate live sites to independent staging and development sites that are available only to administrators.

== Description == 

<strong>This cloning and staging plugin is well tested but still work in progress! <br>
If you find a bug please open a ticket in the [support request](https://wordpress.org/support/plugin/wp-staging/ "support forum"). Any issues will be fixed asap!
</strong>
<br /><br />
<strong>Note: </strong> This plugin is not able to push back your changes to the live site at the moment! 
Please let us know your most requested feature and use our quick poll. It only takes one minute of your time: [Start the poll](https://docs.google.com/forms/d/e/1FAIpQLScZ-dO5WffV3xObn16LwG05tr1HrADD_8L4wbTxPHqoPssVcg/viewform?c=0&w=1&usp=mail_form_link "wp staging poll")
<br /> <br />


<blockquote>
<h4> WP Staging for WordPress Migration </h4>
This duplicator plugin allows you to create an staging or development environment in seconds* <br /> <br />
It creates a file clone of your website into a subfolder of your current WordPress installation with an entire copy of your database. 
This sounds pretty simple and yes it is! All the hard time consumptive database and file copy stuff including url replacements is done in the background.
 <br /> <br />
I created this plugin because all other solutions are way too complex, overloaded with dozens of options or having server requirements which are not available on most shared hosting solutions.
All these reasons prevent user from testing new plugins and updates first before installing them on their live website, so its time to release a plugin which has the potential to be merged into everyone´s wordpress workflow.
 <br /> <br />
<p><small><em>* Time of creation depends on size of your database and file size</em></small></p>
</blockquote>

WP Staging helps you to prevent your website from being broken or unavailable because of installing untested plugin updates! 

[youtube https://www.youtube.com/watch?v=Ye3fC6cdB3A]

= Main Features =

* <strong>Easy: </strong> Staging migration applicable for everyone. No configuration needed!
* <strong>Fast: </strong> Migration process lasts only a few seconds or minutes, depending on the site's size and server I/O power
* <strong>Safe: </strong> Access to staging site is granted for administrators only.
<br /><br />
<strong>More safe:</strong> 
<br>
* Admin bar reflects that you are working on a staging site
* Extensive logging if duplication or  migration process should fail.
* New: Compatible to All In One WP Security & Firewall

= What does not work or is not tested when running wordpress migration? =

* Wordpress migration of wordpress multisites (not tested)
* WordPress duplicating process on windows server (not tested but will probably work) 
Edit: Duplication on windows server seems to be working well: [Read more](https://wordpress.org/support/topic/wont-copy-files?replies=5 "Read more") 


<strong>Change your workflow of updating themes and plugins data:</strong>

1. Use WP Staging for migration of a production website to a clone site for staging purposes
2. Customize theme, configuration and plugins or install new plugins
3. Test everything on your staging site first
4. Everything running as expected? You are on the save side for migration of all these modifications to your production site!


<h3> Why should i use a staging website? </h3>

Plugin updates and theme customizations should be tested on a staging platform first. Its recommended to have the staging platform on the same server where the production website is located.
When you run a plugin update or plan to install a new one, it is a necessary task to check first the modifications on a clone of your production website.
This makes sure that any modifications is  working on your website without throwing unexpected errors or preventing your site from loading. (Better known as the wordpress blank page error)

Testing a plugin update before installing it in live environment isn´t done very often by most user because existing staging solutions are too complex and need a lot of time to create a 
up-to-date copy of your website.

Some people are also afraid of installing plugins updates because they follow the rule "never touch a running system" with having in mind that untested updates are increasing the risk of breaking their site.
I totally understand this and i am guilty as well here, but unfortunately this leads to one of the main reasons why WordPress installations are often outdated, not updated at all and unsecure due to this non-update behavior.

<strong> I think its time to change this, so i created "WP Staging" for WordPress migration of staging sites</strong>

<h3> Can´t i just use my local wordpress development copy for testing like xampp / lampp? </h3>

Nope! If your local hardware and software environment is not a 100% exact clone of your production server there is NO guarantee that every aspect 
of your local copy is working on your live website exactely as you would expect it. 
There are some obvious things like differences in the config of php and the server you are running but even such non obvious settings like the amount of ram or the 
the cpu performance can lead to unexpected results on your production website. 
There are dozens of other possible cause of failure which can not be handled well when you are testing your changes on a local staging platform.

This is were WP Staging steps in... Site cloning and staging site creation simplified!

<h3>I just want to migrate the database from one installation to another</h3>
If you want to migrate your local database to a already existing production site you can use a tool like WP Migrate DB.
WP Staging is only for creating a staging site with latest data from your production site. So it goes the opposite way of WP Migrate DB.
Both tools are excellent cooperating eachother.

<h3>What are the benefits compared to a plugin like Duplicator?</h3>
At first, i love the [Duplicator plugin](https://wordpress.org/plugins/duplicator/ "Duplicator plugin"). Duplicator is a great tool for migrating from development site to production one or from production site to development one. 
The downside is that Duplicator needs adjustments, manually interventions and prerequirements for this. Duplicator also needs some skills to be able to create a development / staging site, where WP Staging does not need more than a click from you.
However, Duplicator is best placed to be a tool for first-time creation of your production site. This is something where it is very handy and powerful.

So, if you have created a local or webhosted development site and you need to migrate this site the first time to your production domain than you are doing nothing wrong with using
the Duplicator plugin! If you need all you latest production data like posts, updated plugins, theme data and styles in a testing environment than i recommend to use WP Staging instead!

= I need you feedback =
This plugin has been done in hundreds of hours to work on even the smallest shared webhosting package but i am limited in testing this only on a handful of different server so i need your help:
Please open a [support request](https://wordpress.org/support/plugin/wp-staging/ "support request") and describe your problem exactely. In wp-content/wp-staging/logs you find extended logfiles. Have a look at them and let me know the error-thrown lines.


= Important =

Permalinks are disabled on the staging site because the staging site is cloned into a subfolder and permalinks are not working on all systems
without doing changes to the .htaccess (Apache server) or nginx.conf (Nginx Server). 
[Read here](https://wp-staging.com/docs/activate-permalinks-staging-site/ "activate permalinks on staging site") how to activate permalinks on the staging site.

 
= How to install and setup? =
Install it via the admin dashboard and to 'Plugins', click 'Add New' and search the plugins for 'Staging'. Install the plugin with 'Install Now'.
After installation goto the settings page 'Staging' and do your adjustments there.


== Frequently Asked Questions ==

* I can not login to the staging site
If you are using a security plugin like All In One WP Security & Firewall you need to install latest version of WP Staging. 
Go to WP Staging > Settings and add the slug to the custom login page which you set up in All In One WP Security & Firewall plugin.



== Official Site ==
https://wp-staging.com

== Installation ==
1. Download the file "wp-staging-pro.zip":
2. Upload and install it via the WordPress plugin backend wp-admin > plugins > add new > uploads
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Start Plugins->Staging

== Screenshots ==

1. Step 1. Create new WordPress staging site
2. Step 2. Scanning your website for files and database tables
3. Step 3. Wordpress Staging site creation in progress
4. Finish!

== Changelog ==

= 2.7.6 =
* New: Add Filter to exclude certain tables from search & replace operation
* New: Check if there is already one process running before executing the cloning process
* New: Change WPSTGPRO_PLUGIN_DIR to WPSTG_PLUGIN_DIR
* New: Show PHP user in system info
* New: Support up to WordPress 5.1


= 2.7.5 =
* New: Add new db table selection manager
* New: Allow selection of db tables which has no WP prefix
* Tweak: DB tables and file verification opened as default option
* Tweak: clean up search & replace method
* Fix: Continue cloning if siteurl & home in wp_options could not be changed

= 2.7.4 =
* Fix: wp-config is not copied to the staging site when site is cloned to external database and on multisites
* Fix: Log file folder does not have correct permission 0755
* Tweak: Better warning for update method
* Tweak: Add notice to save permalink settings after pushing
* New: Support search & replace over single or double stroke constants definitions in wp-config.php
* New: New faq entry (page not found error 404)
* New: Bedrock compatibility. Create default wp-config.php if original wp-config is not in the default path


= 2.7.3 =
* Fix: Make sure that active user is not logged out while pushing the staging site
* Fix: Stop delete process if staging site has been deleted manually before
* Fix: Plugin not translated properly

= 2.7.2 =
* Fix: If backslash is contained in password of external database then the pushing fails
* Fix: Improve search & replace parameter for url's
* New: Explain the target directory
* New: Remove folder Library and move class Browser to Utils

= 2.7.1 =
* New: Better word of possible consequences before pushing for woocommerce owners
* New: Add FAQ to footer

= 2.7.0 =
* New: Tested up to WordPress 5.0.3 Gutenberg
* New: Skip table columns with more than 5MB for search & replace operations to inmprove performance

= 2.6.9 =
* Fix: WP Staging does not run with old WordPress version 3.2

= 2.6.8 =
* New: Tested up to WordPress 5.0.2 Gutenberg
* Fix: Error no such file in systeminfo 
* Fix: Prevent throwing error when table prefix of table usermeta can not be changed
* Fix: If backslash is contained in password of external database then the processing fails
* Fix: Pushing interrupts if password of current user is different on staging and live site



= 2.6.7 =
* Fix: Can not login to staging site . Changed minimum user capability to 'manage_options' instead 'administrator' ´

= 2.6.6 =
* New: Tested up to WordPress 5.0 Gutenberg
* New: Tested up to WordPress 5.0.1 Gutenberg
* New: Check if WordPress version number of staging and production site is identical before pushing
* New: Show WP version of staging site in the sysinfo log
* Fix: Make sure optimizer must-use plugin is updated as well after updating the main plugin
* Fix: When custom upload_path is used upload path is broken after pushing
* Fix: Security, prevent downloading wp staging log files by third party users from uploads folder
* Fix: Prevent error $this not in object context in install.php

= 2.6.5 =
* SKIP *


= 2.6.4 =
* New: Support for custom and non-default wp-content and uploads folder
* Fix: Redirect to the correct url after log in to staging site
* Fix: Supports HTML entities in links created by WP Backery Page Builder Plugin
* Fix: Error 500 on some systems when files are collected and plugin iterates through the directories

= 2.6.3 =
* Fix: WP Staging plugin not excluded from being pushed
* Fix: Updating staging site does not exclude Windows IIS configuration file web.config
* Fix: Cloning to external db: custom prefix is ignored

= 2.6.2 =
* Fix: Media links are not correct after push if site is in subfolder

= 2.6.1 =
* New: Allow cloning to external database
* New: Allow cloning to a custom hostname like a subdomain
* New: Allow cloning to a custom destination folder


= 2.6.0 =
* New: Increase file scanning process performance
* New: Add delay between requests setting to prevent timeouts on rate limited servers
* New: Try again automatically cloning process if ajax request has been killed due to server ressource limit error

* Fix: remove ? parameter from staging site
* Fix: Do not load theme while WP Staging is running. Prevents processing interruption if there are fatal errors in the theme
* Fix: Missing debugging variable in preserve options array
* Fix: Error when removing heartbeat api
* Fix: If wp_options is excluded from pushing it will throw a fatal error
* Fix: When cloning has been canceled page needs to be reloaded before beeing able to clone again
* Fix: Windows IIS server compatibilility issues resolved
* Fix: Directory iterating is exceading php maximum execution time
* Fix: Prevent error 503 (firewall/performance timeout) by adding post parameter to the ajax url
* Fix: Adding automatic resume function to the ajax processing to prevent cloning and pushing interruptions due to hitting server ressource or network glitches.
* Fix: Selected folders are not excluded under Windows IIS server


= 2.5.9 =
* Fix: Do not delete staging site if listed site has no table prefix
* Fix: Requirements Check not working as intended
* Fix: Prevent multiple copy of wp_user and wp_user meta on multisite cloning
* New: New filter for adding custom tables to exclude from pushing


= 2.5.8 =
* New: Allow Cloning to separate database (not ready, yet)
* New: Support for wp-config.php located in one level up of the root folder for multisites
* New: Allow exclusion of custom options from wp_options from beeing pushed
* New: Make sure Optimizer is installed and activated
* Tweak: Better looking UI elements

= 2.5.7 =
* Fix: Some of the excluded files from copying process were ignored
* Fix: Do not clone db.php, object-cache.php and advanced-cache.php
* Fix: Show error message if ajax requests fail for any reason
* New: Allow search & replace of url encoded links like domain.com%2Fstaging-site (Used by visual composer)
* New: Set WP_CACHE to false in wp-config.php after cloning to prevent log in issues to staging site
* New: Compatibility mode to skip certain tables from third party plugins from beeing searched & replaced


= 2.5.6 =
* Fix: Images are copied into wrong location after pushing multisites.
* Fix: WP Staging job file not excluded from pushing process leads to wrong or incomplete list of files to push

= 2.5.5 =
* Fix: Different scheme of siteurl and home leads to non available staging site. Show admin notice to ask user to fix that first before creating a staging site
* Fix: Multisites not pushed 100% correct
* New: Support for multisite blogs.dir structure for WordPress 3.5 and lower
* New: Show error if there is not enough free diskspace
* New: Better looking admin notices
* New: Show admin notice if php version and wordpress version do not meet requirements.
* New: Add resume function
* New: Add italian translation

= 2.5.4 =
* Fix: Remove heartbeat only on wp staging admin pages
* Fix: WordPress custom upload path variable upload_path could be wrong after cloning
* Fix: Increase maximum allowed memory consumption
* Tweak: Increase cloning performance


= 2.5.3 =
* Fix: Add version number to css and js files to prevent caching issues
* Fix: Search % Replace during pushing does not replace escaped path delimiters like \/
* Fix: Wrong text domain in a few language strings
* Fix: Optimizer mu-plugin not installed all the time 
* Fix: Language files not loaded correctly 


= 2.5.2 =
* New: Compatible to WordPress 4.9.8
* New: Support for Windows Azure cloud servers
* New: Add filter to exclude strings from search & replace, docs: https://wp-staging.com/docs/actions-and-filters/
* New: Add filter to change search & replace parameters
* New: Add language files and change text domain to slug of the plugin
* New: Enable Optimizer as default option
* New: Disable heartbeat api and user login check for wp staging processing
* Fix: Missing http(s) scheme after cloning multisites results in not working clones
* Fix: Folder permission notice is shown because wrong home path is detected


= 2.5.1 =
* New: Compatible to WordPress 4.9.7
* Fix: Remove term 'Error' from login page
* New: Better error reporting
* New: Detect if wp-config.php has been moved one folder level up
* New: Login options not needed any more - removed


= 2.5.0 =
* Fix: Empty error message in log
* Fix: Do not search & replace mail addresses
* New: Add more details into the system info log

= 2.4.9 =
* New: Supports WordPress 4.9.7
* Fix: Search & Replace not working if serialized object contains __PHP_Incomplete_Class_Name
* Fix: Search & replace path not correct if scheme http/https is not identical in wp-config and db wp_options


= 2.4.8 =
* Fix: Search & Replace not working if serialized object contains __PHP_Incomplete_Class_Name

= 2.4.7 =
* Fix: Undefined object $this->tables
* Fix: Can not open upload folder in file selection menu
* Fix: Ignore url scheme (http/https) when using search & replace on url paths
* Fix: wp-config.php not copied when previous clone updating process has been failed
* Fix: Parameter must be an array or an object that implements Callable
* Fix: Skip search & replace for objects where key is null
* Tweak: Remove certain debugging notices from the default log window


= 2.4.6 =
* Security: Do not allow to create a new staging site into a subfolder which already exists
* Tweaks: Move confirmation dialog for update function after file & db table exclusion interface
* Tweaks: If site to clone is a multisite main site allow the selection of all relevant tables and exclude multisite child tables prefixed with  wp_1_, wp_2_ and so on
* Tweaks: remove term "error" from several log entries
* Fix: Excluded folders are still copied while using push function
* Fix: Progress bar for step 'database' is not filling up to 100%
* Fix: If cloning update process is interrupted it may happen that staging site is not available any longer. (Updating the clone does not copy index.php to staging site again)
* Fix: Progress bar not shown as intended for clone updating process
* New: Use the new progress bar for clone updating process
* New: Option to allow adjustment of the allowed maximum size of files that are going to be copied while cloning.

= 2.4.5 =
* New: Support for WordPress 4.9.6
* New: Add new setting to specify the maximum file size to copy
* Fix: Missing trailingslash results to wrong absolute paths in database after Search & Replace operation 

= 2.4.4 =
* New: Support for custom upload folder. For instance, if upload folder has been renamed and removed outsite wp-content folder
* New: Add cloning / updated date time to list of staging sites
* New: Add filter 'wpstg_filter_options_replace' to exclude certain tables from updating while cloning
* New: Exclude tables for plugin wp_mail_smtp
* New: Add filter 'wpstg_fiter_search_replace_rows' to exclude certain tables from search & replace
* New: Supports search & replace for revslider image slider and several visual editors which are using non default serialized data
* New: Add new setting which allow to specify the search & replace processing   query limit
* Fix: Do not stop pushing process if there are duplicate entries
* Fix: Folder not copied if it begins with same name like excluded one e.g. upload vs. upload_new

= 2.4.3 =
* Fix: If wp_options HOME is empty the pushing process interrupts
* Fix: Serialize replace is not working properly for serialized strings

= 2.4.2 =
* Fix: All methods should be private in class SearchReplace
* Fix: Stop cloning if wp_usermeta or wp_options can not be adapted
* Fix: If live site is in subfolder and staging site has been created in subfolder on same level the push process is not working
* Fix: PHP 7.2 is not countable warning
* Fix: PHP 7.2 can not replace data in objects when object is incomplete (__PHP_Incomplete_Class_Name)
* Fix: Fatal error due to high memory consumption
* New: Link to support section

= 2.4.1 =
* Fix: Under certain circumstances it might happen that Search Engine Visibility is disabled on the live site after pushing staging site.

IMPORTANT: Check your website. Go to WordPress > Settings > Reading > Search Engine Visibility and make sure that the checkbox is unticked

* Fix: If WPML is used the live site is not reachable
* New: Use fully custom login form to prevent access denied issues on sites where access to wp-login.php is denied or redirection plugins are used

= 2.4.0 =
* Fix: If PHP 5.6.34 is used, the pushing process is not executing all necessary data replacement steps

= 2.3.9 =
* New: Compatible up to WP 4.9.5
* New: Allow to select and copy extra folders that are on the root level
* Tweak: Change WP_HOME or WP_SITEURL constants if they are defined in wp-config.php of staging site
* Tweak: Only wp root folders are pre selected before cloning is starting
* Fix: Incorrect login path to staging site if WordPress is installed in subdirectory
* Fix: Cloning process terminats if no tables are selected
* Fix: Login url is wrong if WP is installed in subfolder
* Fix: Do not interrupt cloning process if there is a sql error 'duplicate table'
* Fix: WP Staging Pro plugin is not copied to staging site initially if wp staging free plugin has been excluded. Resulting in broken staging site


= 2.3.8 =
* New: Replace even hardcoded links and server path by using search & replace through all staging site database tables
* New: New and improved progress bar with elapsed time
* New: Compatible to WP 4.9.5
* Fix: Cancel cloning does not clean up unused tables and leads to duplicate tables
* Fix: Login url wrong if wp is installed in subfolder
* Tweak: Better error messages
* Tweak: Open staging site in same window from login request


= 2.3.7 =
* New: Option to set Custom Login Link if there is one
* New: Set meta noindex for staging site to make it non indexable for search engines
* New: Better multiple folder selection. Allows to unselect a parent folder without collapsing all child folders
* New: Sorted list of folders to copy
* New: Add more sys info elements under tools section
* Fix: Can not login to staging site if plugin All In One WP Security & Firewall is used
* Fix: Staging site not reachable because permalinks are not disabled under certain conditions
* Fix: Change default login link to wp-admin
* Fix: Unneccessary duplicates of wpstg tables in db

= 2.3.6 =
* Fix: Better finishing message
* Fix: Old staging site is not listed and pushing is not working properly when plugin is updated from wp staging version 1.6 and lower
* Fix: Undefined property: stdClass::$totalFileSize

= 2.3.5 =
* Fix: Minnor code issues
* Fix: Skip directory listings for symlinks


= 2.3.4 =
* Fix: License menu not shown if db option wpstg_is_staging_site === 'false'
* Fix: Missing files from the staging folder /wp-content/uploads after migration

= 2.3.3 =
* Fix: Ignored selection "none selected tables" instead all of them are copied

= 2.3.2 =
* Fix: Get notice that operation is not allowed on live site
* Fix: Updating process failed with unknown error

= 2.3.1 =
* Fix: mod_security option is preventing cloning execution 

= 2.3.0 =
* New: Remove setting "wordpress in subdir" and detects it automatically
* Fix: If WordPress is in subdir installed, siteurl & home is wrong after pushing process
* Fix: Missing table if table name contains two occurance of the table prefix e.g. wp_affiliate_wp_affiliates

= 2.2.9 =
* New: Search & Replace absolute path
* Fix: High memory consumption leads to timeouts

= 2.2.8 =
* New: Keep permalink structure of live site when migrating from staging site
* Tweak: Increase performance of pushing process by factor 3
* Fix: Hide db table and folder selection when pushing process starts
* Fix: Set permalink to default after updating clone
* Fix: Prevent user session expiration after pushing from live site
* Fix: Undefined property userRoles
* Tweak: Revert to previous loader.gif
* Tweak: Skip files collecting for excluded folders
* Tweak: Do not show license screen on staging site
* Tweak: Do not show lists of staging sites on staging sites

= 2.2.7 =
* New: Allow migrating of database
* Fix: Skipping files leads to interrupted pushing process

= 2.2.6 =
* Tweak: Return more human readable error notices
* Fix: Cloning process stops due to file permission issue
* Fix: Exclude WP Super Cache from copying process because of bug in WP Super Cache, see https://github.com/Automattic/wp-super-cache/issues/505
* New: Tested up to WP 4.9.2


= 2.2.5 =
* New: Allow pushing media folder wp-content/uploads
* Tweak: Throw error if there is not enough disk space for creating a cloning site

= 2.2.4 =
* New: increased speed for cloning process by factor 5, using new method of file agregation 
* New: Skip files larger than 8MB
* Fix: Can not create clone If there is no php memory limit (-1)


= 2.2.3 =
* Fix: Additional checks to ensure that the root path is never deleted

= 2.2.2 =
* Fix: False error: can not push "live prefix table is same as staging table prefix"
* Fix: "Fatal error - The clone does not exist in database. This should not happen."
* Fix: Not all files are pushed from staging to live site
* New: Tested up to WordPress 4.9

= 2.2.1 =
* Fix: Link to the staging site is missing a slash if WordPress is installed in subdir
* Fix: Missing files in clone site if copy file limit is higher than 1


= 2.2.0 =
* Fix: Cloning a new site results in [undefined] 
* Fix: Show all tables from the tables selection dialogue and use default selection for correct tables
* Fix: If clone has been created with an older wp staging version its not possible to use the update function
* Fix: File Copy Limit settings default value is 1 now, which prevents some cases where not all files were copied over
* Fix: Missing files in clone site if copy file limit is higher than 1
* Tweak: Remove table wpstg_rmpermalinks_executed when plugin is uninstalled

= 2.1.9 =
* New: Allow selection of db tables with wpstg_ prefix in the table selection dialog
* Fix: Deleting process throws timout issues and php notices
* Fix: Link to staging site is undefined when staging name contains space characters
* Fix: If file copy limit is lower than 500, not all files are copied in all cases
* Fix: Increase file copy performance
* Fix: Cloning update function created new staging tables everytime it is run

= 2.1.8 =
* New: Allow deactivation of Optimizer plugin
* Fix. Update clone not working

= 2.1.7 =
* Fix: Sanitize Clone Names and Keys to fix "clone not found" issue
* Fix: New file clone limit of 10 files per batch to fix godaddy ajax 404 issues

= 2.1.6 =
* Fix: Remove LOCK_EX parameter in file_put_contents(). LOCK_EX is not working on several systems which results in cloning process timeouts
* Fix: Limit maximum execution time to 30 seconds
* New: New setting to specify the maximum amount of files copied within one ajax call
* Fix: Error 500 when debug mode is activated


= 2.1.5 =
* Fix: Remove test string from staging site
* Fix: Huge Performance improvement in copying process by removing duplicate file entries in the cache file. This also prevents weird timeout issues on some hosted websites

= 2.1.4 =
* Testing: resetMemory() not allowed
* New: Add link to tutorial how to push changes to live site

= 2.1.3 =
* Fix: Can not login to staging site

= 2.1.2 =
* New: Exclude unneccessary files from cloning process: .tmp, .log, .htaccess, .git, .gitignore, desktop.ini, .DS_Store, .svn
* New: More details for debugging in Tools->System Info
* Fix: Check if tables in staging site exists before attempting to modify them
* Fix: WordPress in sub directories were not opening
* Fix: Nonce check not working if nonce life time is filtered by another plugin WP Bug: https://core.trac.wordpress.org/ticket/41617#comment:1
* Fix: Access to staging site not working, if WP_SITEURL and WP_HOME is defined in wp-config.php 
* Tweak: Exclude wp-content/cache folder from copying process

= 2.1.1 =
* Fix: Fatal error causing blank screen

= 2.1.0 =
* Fix: Frontpage not available without login

= 2.0.9 =
* New: Select which user role is able to access the staging site
* Fix: After update from wpstg 1.6.x to 2.x previous settings were not imported resulting in cancellation of cloning process

= 2.0.8 =
* Fix: css file are not loaded on wpstg admin screen 

= 2.0.7 =
* Fix: Fatal error when some db tables are excluded
* Fix: Automatic update function not working

= 2.0.6 =
* Fix: Cancel Cloning button not working
* Fix: Limit max execution time to a maximum of 30sec to prevent high memory consumption and script timeouts

= 2.0.5 =
* Tweak: Improve deletion method
* Fix: Activation hook not running

= 2.0.4 =
* New: Installation of must use plugin to exclude other plugins from execution while wpstg is running and cloning website

= 2.0.3 =
* New: Complete rewrite of the code base
* New: Batch processing allows to clone even huge sites without any timeouts
* New: Preparation for WP QUADS PRO with ability to copy file changes back to live site

= 1.1.6 =
* New: Add download link to WP Staging Beta Version 2.0.1

= 1.1.5 =
* Fix: Admin notice is throwing a false positive write permission error
* New: Move log folder to wp-content/uploads/wp-staging/logs
* New: Tested up to WP 4.7.3

= 1.1.4 =
* Fix: Fatal error Unsupported operand types

= 1.1.3 =
* New: Tested up to wp 4.7.2
* Fix: Arrows in drop down for folder selection are distorted
* Tweak: Show working log as default to make debugging easier

= 1.1.2 = 
* Fix: Settings are not deleted when plugin is removed
* Fix: Staging site is available for non administrators

= 1.1.1 =
* Fix: Change rating url

= 1.1.0 =
* New: Tested up to WP 4.6
* New: Create a poll and ask what feature is most required

= 1.0.9 =
* Fix: Undefined WPSTG() warning
* Fix: Change compatibility version to wp 4.5.3

= 1.0.8 =
* Tested up to WP 4.5.2

= 1.0.7 =
* Fix: Activation hook is not fired and staging site is not working properly
* Performance: Increase default query copy limit to 1000

= 1.0.6 =
* Fix: Uninstalling plugin throwing error
* Fix: Error permission admin notice although permission issues are correct


=  1.0.5 =
* New: Tested up to WP 4.5
* Fix: Download system log not working
* Fix: Click on Optimizer "Select all | none | invert" links leads to jumping
* Tweak: Make clear that unselecting a checkbox will exlude table or file from copy process
* Tweak: Remove unnecessary text
* Tweak: Change beta notice in dashboard. WP Staging is stable
* Tweak: Change twitter handle to @wpstg

= 1.0.3 =
* Fix: Missing const MASHFS_VERSION
* Fix: Remove error "table XY has been created, BUT inserting rows failed."
* Fix: Not tested up to 4.4.2 message shown although it's tested up to WP 4.4.2
* New: Disable either free or pro version and does not allow to have both version enabled at the same time

= 1.0.2 =
* Tweak: Change setting description of uninstall option
* Tweak: Lower tags in readme.txt

= 1.0.1 =
* New: Orange colored admin bar on staging site for better visualization and comparision between production live site and staging site
* Tweak: Remove contact link on multisite notification

= 1.0.0 =
* Fix: Do not follow symlinks during file copy process
* Fix: css error
* Fix: Show "not-compatible" notice only when blog version is higher than plugin tested version.
* Fix: undefined var $size
* Fix: Check if $path is null before writing to remaining_files.json
* Fix: $db_helper undefined message
* Fix: Skip non utf8 encoded files during copying process

Complete changelog: [https://wp-staging.com/changelog.txt](https://wp-staging.com/changelog.txt)

== Upgrade Notice ==

= 2.7.2 =
* New: Tested up to WordPress 5.0.2 Gutenberg
