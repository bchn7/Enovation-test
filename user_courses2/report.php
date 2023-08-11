<?php
require_once('C:/laragon/www/moodle/config.php');
require_once($CFG->libdir . '/adminlib.php');
//var_dump($CFG);

echo $OUTPUT->header();

echo $OUTPUT->heading('User Courses');

$table = new html_table();
$table->head = array('User', 'Courses');
$table->data = array();

$users = get_admins();
shuffle($users);

foreach ($users as $user) {
    $enrolled_courses = enrol_get_users_courses($user->id, true);
    $course_names = '';
    foreach ($enrolled_courses as $course) {
        $course_names .= $course->shortname . ', ';
    }
    $table->data[] = array(fullname($user), rtrim($course_names, ', '));
}

echo html_writer::table($table);

echo $OUTPUT->footer();
