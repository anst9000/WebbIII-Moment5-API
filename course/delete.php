<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

// Get raw courseed data
// $data = json_decode(file_get_contents("php://input"));

// Set ID to update
// $course->id = $data->id;
// $course->id = isset($_GET['id']) ? $_GET['id'] : die();
$course->id = $_POST['id'];

// Delete course
if ($course->delete()) {
    echo json_encode(
        array(
            'message' => 'Course Deleted',
            'value' => $course->id,
        )
    );
} else {
    echo json_encode(
        array('message' => 'Course Not Deleted')
    );
}
