<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/course.php";

// include_once "../config/database.php";
// include_once "../models/course.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog course object
$course = new Course($db);

// Get ID
// $course->id = isset($_GET['id']) ? $_GET['id'] : die();

// Set ID to update
$course->id = $_POST['id'];

// Get course
if ($course->read_single()) {
    // Create array
    $course_arr = array(
        'id' => $course->id,
        'name' => $course->name,
        'code' => $course->code,
        'progression' => $course->progression,
        'syllabus' => $course->syllabus,
        'created_at' => $course->created_at,
    );

    // Make JSON
    print_r(json_encode($course_arr));
} else {
    echo json_encode(
        array('message' => 'Course Not Found')
    );
}
