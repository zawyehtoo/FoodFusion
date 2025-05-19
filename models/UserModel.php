<?php
require_once 'include/db_connect.php';

class UserModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Register a new user
    public function register($firstName, $lastName, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);
        return $stmt->execute();
    }

    // Authenticate user login
    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // Check if email is unique
    public function isEmailUnique($email)
    {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows === 0; // Returns true if no rows are found (email is unique)
    }

    public function updateProfile($userId, $firstName, $lastName, $password = null)
    {
        // Base query for updating firstName, lastName, and email
        $query = "UPDATE users SET first_name = ?, last_name = ?";
        $params = [$firstName, $lastName];
        $types = "ss";

        // If a new password is provided, include it in the query
        if (!empty($password)) {
            $query .= ", password = ?";
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $params[] = $hashedPassword;
            $types .= "s";
        }

        // Add the WHERE clause to update the specific user
        $query .= " WHERE id = ?";
        $params[] = $userId;
        $types .= "i";

        // Prepare and execute the query
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        $result = $stmt->get_result();

        return true;
    }
}
