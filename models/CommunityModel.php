<?php
class CommunityModel {
    private $conn;

     public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllPosts() {
        $query = "
            SELECT 
                p.id, p.title, p.content, p.image, p.created_at, p.cooking_tips, p.ingredients,
                u.first_name AS user_name, 
                c.name AS cuisine_type, 
                d.name AS dietary_preference, 
                df.name AS difficulty
            FROM community_posts p
            JOIN users u ON p.user_id = u.id
            JOIN cuisine_types c ON p.cuisine_type_id = c.id
            JOIN dietary_preferences d ON p.dietary_preference_id = d.id
            JOIN difficulties df ON p.difficulty_id = df.id
            ORDER BY p.created_at DESC
        ";

        $result = $this->conn->query($query);
        $posts = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                // Fetch comments for each post
                $row['comments'] = $this->getCommentsByPostId($row['id']);
                $posts[] = $row;
            }
        }

        return $posts;
    }

    public function addPost($userId, $cuisineTypeId, $dietaryPreferenceId, $difficultyId, $title, $content, $image, $cookingTips, $ingredients) {
        $query = "
            INSERT INTO community_posts 
            (user_id, cuisine_type_id, dietary_preference_id, difficulty_id, title, content, image, cooking_tips, ingredients, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiissssss", $userId, $cuisineTypeId, $dietaryPreferenceId, $difficultyId, $title, $content, $image, $cookingTips, $ingredients);

        return $stmt->execute();
    }

    public function addComment($postId, $userId, $comment) {
        $query = "
            INSERT INTO comments (community_post_id, user_id, comment, created_at) 
            VALUES (?, ?, ?, NOW())
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iis", $postId, $userId, $comment);

        return $stmt->execute();
    }

    private function getCommentsByPostId($postId) {
        $query = "
            SELECT 
                c.comment, c.created_at, 
                u.first_name AS user_name
            FROM comments c
            JOIN users u ON c.user_id = u.id
            WHERE c.community_post_id = ?
            ORDER BY c.created_at ASC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = [];

        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }

        $stmt->close();
        return $comments;
    }

}