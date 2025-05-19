<?php
require_once 'include/db_connect.php';

class RecipeModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Get filtered recipes with pagination
    public function getRecipes($filters = [], $page = 1, $perPage = 6) {
        $offset = ($page - 1) * $perPage;
        
        $query = "SELECT r.*, 
                  c.name AS cuisine_type, 
                  d.name AS dietary_preference, 
                  df.name AS difficulty 
                  FROM recipes r
                  JOIN cuisine_types c ON r.cuisine_type_id = c.id
                  JOIN dietary_preferences d ON r.dietary_preference_id = d.id
                  JOIN difficulties df ON r.difficulty_id = df.id WHERE 1=1";
        
        // Add filters
        if (!empty($filters['cuisine'])) {
            $query .= " AND r.cuisine_type_id = " . (int)$filters['cuisine'];
        }
        if (!empty($filters['diet'])) {
            $query .= " AND r.dietary_preference_id = " . (int)$filters['diet'];
        }
        if (!empty($filters['difficulty'])) {
            $query .= " AND r.difficulty_id = " . (int)$filters['difficulty'];
        }

        $query .= " LIMIT $perPage OFFSET $offset";
        
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Count total recipes for pagination
    public function countRecipes($filters = []) {
        $query = "SELECT COUNT(*) as total FROM recipes WHERE 1=1";
        
        // Add filters
        if (!empty($filters['cuisine'])) {
            $query .= " AND cuisine_type_id = " . (int)$filters['cuisine'];
        }
        if (!empty($filters['diet'])) {
            $query .= " AND dietary_preference_id = " . (int)$filters['diet'];
        }
        if (!empty($filters['difficulty'])) {
            $query .= " AND difficulty_id = " . (int)$filters['difficulty'];
        }

        $result = $this->conn->query($query);
        return $result->fetch_assoc()['total'];
    }

    // Get filter options
    public function getFilterOptions() {
        return [
            'cuisines' => $this->conn->query("SELECT * FROM cuisine_types")->fetch_all(MYSQLI_ASSOC),
            'diets' => $this->conn->query("SELECT * FROM dietary_preferences")->fetch_all(MYSQLI_ASSOC),
            'difficulties' => $this->conn->query("SELECT * FROM difficulties")->fetch_all(MYSQLI_ASSOC)
        ];
    }
}