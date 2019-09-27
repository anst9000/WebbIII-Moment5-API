# PHP REST API
> This is a simple PHP REST API from scratch with no framework.
> This specific REST API is storing courses that GitHub user anst9000
> has taken during his time at Mid Sweden University.

## Quick Start
> Import the myblog.sql file, change the params in the config
> Database.php file to your own setup.

## Usage
> Information about how to call the REST API.

### Commands
> The application was developed using the software Postman.
> For making calls to the REST API via Postman you can use
> any of the commands that are listed in the table below.
> For Windows if your Apache server is run with XAMPP the project
> should be stored in C:/xampp/htdocs/<PROJECT>
> , so when you make your get, post, put or delete request in Postman
> you type localhost\YOUR_PROJECT_NAME\api\course\read_single.php?id=4

| API call    | Meaning                                             |                      Command                      | Postman settings |
| ----------- | --------------------------------------------------- | :-----------------------------------------------: | ---------------- |
| read        | Show all courses in database                        |       YOUR_PROJECT_NAME/api/course/read.php       | GET              |
| read single | Show single course with given id from database      | YOUR_PROJECT_NAME/api/course/read_single.php?id=4 | GET/POST         |
| create      | Create a course and store it in database            |      YOUR_PROJECT_NAME/api/course/create.php      | PUT              |
| update      | Update existing courese with given id from database |      YOUR_PROJECT_NAME/api/course/update.php      | PUT              |
| delete      | Delete a course with given id from database         |      YOUR_PROJECT_NAME/api/course/delete.php      | GET              |

___
## App Info

### Author
> The original PHP REST API foundation was created by:
> Brad Traversy
> [Traversy Media](http://www.traversymedia.com)

### Version
> 1.0.0

### License
> This project is licensed under the MIT License