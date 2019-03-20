<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This script lists all the instances of quiz in a particular course
 *
 * @package    mod_quiz
 * @copyright  1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir.'/gradelib.php');
require_once($CFG->dirroot.'/mod/quiz/locallib.php');
require_once($CFG->libdir . '/completionlib.php');
require_once($CFG->dirroot . '/course/format/lib.php');

defined('MOODLE_INTERNAL') || die();

// Set up the page.
$PAGE->set_url($CFG->wwwroot.'/mod/quiz/listquiz.php');
$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title("List quiz");
$PAGE->set_heading("List quiz");

echo $OUTPUT->header();
// mod_quiz_get_quizzes_by_courses

// $PAGE->set_context(get_system_context());
$result = $DB->get_records("quiz", array()); // get all records in mdl_user table

foreach($result as $record){

    echo $record->name;

}


echo $OUTPUT->footer();

?>