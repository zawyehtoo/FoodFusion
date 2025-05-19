<?php
require_once 'models/RecipeModel.php';

class RecipeController {
    private $model;
    private $perPage = 6;

    public function __construct() {
        $this->model = new RecipeModel();
    }

    // Get filters from request
    private function getFilters() {
        return [
            'cuisine' => $_GET['cuisine'] ?? null,
            'diet' => $_GET['diet'] ?? null,
            'difficulty' => $_GET['difficulty'] ?? null
        ];
    }

    // Get current page from request
    private function getCurrentPage() {
        return isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    }

    public function index() {
        $filters = $this->getFilters();
        $currentPage = $this->getCurrentPage();

        // Get data
        $recipes = $this->model->getRecipes($filters, $currentPage, $this->perPage);
        $totalRecipes = $this->model->countRecipes($filters);
        $filterOptions = $this->model->getFilterOptions(); // Fetch filter options

        // Extract filter options
        $cuisines = $filterOptions['cuisines'];
        $diets = $filterOptions['diets'];
        $difficulties = $filterOptions['difficulties'];

        // Calculate pagination
        $totalPages = ceil($totalRecipes / $this->perPage);

        // Pass to view
        include 'views/recipe_collection.php';
    }
}