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

// Set up the page.
$PAGE->set_url($CFG->wwwroot.'/mod/quiz/listquiz.php');
$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('admin');
$PAGE->set_title("List quiz");
$PAGE->set_heading("List quiz");

echo $OUTPUT->header();
// mod_quiz_get_quizzes_by_courses

// $PAGE->set_context(get_system_context());

// $coursecontext = context_course::instance(3);
// $categories = $DB->get_records_menu('question_categories', array('contextid'=>$coursecontext->id), 'name', 'id, name');
// $quiz = $DB->get_records_menu('quiz', array('course' => 3), 'id');
// foreach ($categories as $key => $value) {
// 	# code...
// 	echo $value;
// }

$params = array();
list($udeletedsql , $param) = $DB->get_in_or_equal(0, SQL_PARAMS_NAMED);
$params += $param;
list($enrolsql, $param) = $DB->get_in_or_equal('manual', SQL_PARAMS_NAMED);
$params += $param;
list($coursesql, $param) = $DB->get_in_or_equal(8, SQL_PARAMS_NAMED);
$params += $param;
list($usersql, $param) = $DB->get_in_or_equal($selID, SQL_PARAMS_NAMED);
$params += $param;
$activities = null;
$quiz = $DB->get_record_sql('SELECT COUNT(*) FROM {quiz} ', $param, MUST_EXIST);
echo $quiz;

// // $quiz = $DB->get_records_menu('quiz');
// // $quiz = context_quiz::instance();
// $quiz = $DB->get_records_sql_menu("SELECT * FROM quiz");
// foreach ($quiz as $key => $value) {
// echo $quiz[$key];
// 	# code...
// }

// foreach ($quiz as $key => $value) {
// 	echo $OUTPUT->box_start();
// 	$btncourse = new single_button(new moodle_url('mod/quiz/view.php'), "Course", 'get');
// 	echo $OUTPUT->render_single_button(new single_button(new moodle_url('view.php',array('id' => $key)), "quiz", 'get'));
// 	echo $OUTPUT->box_end();
// 	// echo $key;
// 	// echo "<a href='"+new moodle_url('mod/quiz/view.php',array('id' => $key))+"''>Link quiz</a>";
// }
echo $OUTPUT->footer();


// foreach ($categories as $key => $value) {
// 	echo $key;
// }
?>