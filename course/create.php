<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

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

// // Get raw courseed data
// $data = json_decode(file_get_contents("php://input"));

$course->name = $_POST['name'];
$course->code = $_POST['code'];
$course->progression = $_POST['progression'];
$course->syllabus = $_POST['syllabus'];

// Create course
if ($course->create()) {
    echo json_encode(
        array(
            'message' => 'Course Created',
            // 'id' => $course->id,
            'name' => $course->name,
            'code' => $course->code,
            'progression' => $course->progression,
            'syllabus' => $course->syllabus,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Course Not Created')
    );
}
