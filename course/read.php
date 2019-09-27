<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include __DIR__ . "/../config/database.php";
include __DIR__ . "/../models/course.php";

// include_once "../config/database.php";
// include_once "../models/course.php";

// instantiate database and course object
$database = new Database();
$db = $database->connect();

// initialize object
$course = new Course($db);

// query courses
$stmt = $course->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // courses array
    $courses_arr = array();
    $courses_arr["records"] = array();

    // retrieve our table contents, fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row this will make $row['name'] to just $name only
        extract($row);

        $course_item = array(
            "id" => $id,
            "name" => $name,
            "code" => html_entity_decode($code),
            "progression" => $progression,
            "syllabus" => $syllabus,
            "created_at" => $created_at,
        );

        array_push($courses_arr["records"], $course_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show courses data in json format
    echo json_encode($courses_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no courses found
    echo json_encode(
        array("message" => "No courses found.")
    );
}
