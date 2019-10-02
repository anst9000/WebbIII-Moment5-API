<?php
class Course
{

    // database connection and table name
    private $conn;
    private $table = "courses";

    // object properties
    public $id;
    public $name;
    public $code;
    public $progression;
    public $syllabus;
    public $created_at;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read products
    public function read()
    {
        // select all query
        $query = "SELECT * FROM " . $this->table .
            " ORDER BY code DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Post
    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table .
            ' WHERE id = ?';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Bind ID
        $stmt->bindParam(1, $this->id);
        // Execute query
        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            $this->name = $row['name'];
            $this->code = $row['code'];
            $this->progression = $row['progression'];
            $this->syllabus = $row['syllabus'];
            $this->created_at = $row['created_at'];
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Create Post
    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name, code = :code, progression = :progression, syllabus = :syllabus';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->code = htmlspecialchars(strip_tags($this->code));
        $this->progression = htmlspecialchars(strip_tags($this->progression));
        $this->syllabus = htmlspecialchars(strip_tags($this->syllabus));
        // Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':progression', $this->progression);
        $stmt->bindParam(':syllabus', $this->syllabus);
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Update Post
    public function update()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                  SET name = :name,
                  code = :code,
                  progression = :progression,
                  syllabus = :syllabus
                WHERE id = :id';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->code = htmlspecialchars(strip_tags($this->code));
        $this->progression = htmlspecialchars(strip_tags($this->progression));
        $this->syllabus = htmlspecialchars(strip_tags($this->syllabus));
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':progression', $this->progression);
        $stmt->bindParam(':syllabus', $this->syllabus);
        $stmt->bindParam(':id', $this->id);
        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Delete Post
    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
