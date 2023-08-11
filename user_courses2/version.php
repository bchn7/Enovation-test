<?php
defined('MOODLE_INTERNAL') || die();

$plugin->version = 2023081000;  // Plugin version (YYYYMMDDHH).
$plugin->requires = 2020110900; // Moodle version required.
$plugin->component = 'user_courses2';

$plugin->capabilities = array(
    'local/user_courses2:view' => array(
        'riskbitmask' => RISK_CONFIG,
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        )
    ),
);