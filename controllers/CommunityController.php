<?php
require_once 'models/CommunityModel.php';
require_once 'models/RecipeModel.php';

class CommunityController
{
    private $model;
    private $recipeModel;

    public function __construct()
    {
        $this->model = new CommunityModel();
        $this->recipeModel = new RecipeModel();
    }

    public function index()
    {
        // Fetch all posts with their associated comments
        $filterOptions = $this->recipeModel->getFilterOptions(); // Fetch filter options
        $posts = $this->model->getAllPosts();
        $cuisines = $filterOptions['cuisines'];
        $diets = $filterOptions['diets'];
        $difficulties = $filterOptions['difficulties'];
        // Include the view and pass the posts to it
        include './views/community_cookbook.php';
    }

    public function addPost()
    {
        session_start();

        // Redirect unauthenticated users to the login page
        if (!isset($_SESSION['user'])) {
            header("Location: /FoodFusion/login");
            exit;
        }

        $errors = [];
        $success = null;
        $keepModalOpen = false; // Flag to keep the modal open
        $filterOptions = $this->recipeModel->getFilterOptions(); // Fetch filter options
        $cuisines = $filterOptions['cuisines'];
        $diets = $filterOptions['diets'];
        $difficulties = $filterOptions['difficulties'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id'];
            $cuisineTypeId = $_POST['cuisine_type_id'] ?? null;
            $dietaryPreferenceId = $_POST['dietary_preference_id'] ?? null;
            $difficultyId = $_POST['difficulty_id'] ?? null;
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $cookingTips = trim($_POST['cooking_tips'] ?? '');
            $ingredients = trim($_POST['ingredients'] ?? '');

            // Handle image upload
            $image = null;
            if (!empty($_FILES['image']['name'])) {
                $targetDir = "assets/recipes/";
                $image = $targetDir . basename($_FILES['image']['name']);
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
                    $errors['image'] = 'Failed to upload image.';
                }
            }

            // Validate inputs
            if (empty($title)) {
                $errors['title'] = 'Title is required.';
            }
            if (empty($content)) {
                $errors['content'] = 'Content is required.';
            }
            if (empty($cuisineTypeId)) {
                $errors['cuisine_type_id'] = 'Cuisine type is required.';
            }
            if (empty($dietaryPreferenceId)) {
                $errors['dietary_preference_id'] = 'Dietary preference is required.';
            }
            if (empty($difficultyId)) {
                $errors['difficulty_id'] = 'Difficulty is required.';
            }
            if (empty($image)) {
                $errors['image'] = 'Image is required.';
            }
            if (empty($ingredients)) {
                $errors['ingredients'] = 'Ingredient is required.';
            }
            if (empty($cookingTips)) {
                $errors['cookingTips'] = 'Cooking tip is required.';
            }

            // If no errors, add the post
            if (!empty($errors)) {
                $keepModalOpen = true;
            } else {
                // If no errors, add the post
                $success = $this->model->addPost($userId, $cuisineTypeId, $dietaryPreferenceId, $difficultyId, $title, $content, $image, $cookingTips, $ingredients);

                if ($success) {
                    header("Location: /FoodFusion/community-cookbook");
                    exit;
                } else {
                    $errors['general'] = 'An error occurred while adding your post. Please try again later.';
                    $keepModalOpen = true;
                }
            }
        }
        $posts = $this->model->getAllPosts();

        include 'views/community_cookbook.php';
    }

    public function addComment()
    {
        session_start();

        // Redirect unauthenticated users to the login page
        if (!isset($_SESSION['user'])) {
            header("Location: /FoodFusion/login");
            exit;
        }

        $errors = [];
        $success = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['post_id'] ?? null;
            $userId = $_SESSION['user']['id'];
            $comment = trim($_POST['comment'] ?? '');

            // Validate inputs
            if (empty($postId)) {
                $errors[$postId]['post_id'] = 'Post ID is required.';
            }
            if (empty($comment)) {
                $errors[$postId]['comment'] = 'Comment is required.';
            }

            // If no errors, add the comment
            if (empty($errors)) {
                $success = $this->model->addComment($postId, $userId, $comment);

                if ($success) {
                    header("Location: /FoodFusion/community-cookbook");
                    exit;
                } else {
                    $errors[$postId]['general'] = 'An error occurred while adding your comment. Please try again later.';
                }
            }
        }

        // Always fetch posts to display them in the view
        $posts = $this->model->getAllPosts();

        include 'views/community_cookbook.php';
    }
}
