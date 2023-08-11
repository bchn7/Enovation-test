<?php
/**
 * Installation and other custom steps for the local_user_courses plugin.
 *
 * @package   local_user_courses
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Installation procedure.
 *
 * @see upgrade_plugins_modules()
 */
function xmldb_local_user_courses2_install() {
    // No specific installation steps required for this report plugin.
    // You might leave this function empty if no installation is needed.
}

/**
 * Post installation recovery procedure
 *
 * @see upgrade_plugins_modules()
 */
function xmldb_local_user_courses2_install_recovery() {
    // No post-installation recovery steps needed for this report plugin.
    // You might leave this function empty if no recovery is needed.
}