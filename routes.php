<?php
require_once 'Router.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/RecipeController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/ProfileController.php';
require_once 'controllers/CommunityController.php';

$router = new Router();

// Define routes
$router->get("/", function () {
    include './views/index.php';
});

$router->get('/login', function () {
    include 'views/auth/login.php';
});
$router->get('/signup', function () {
    include 'views/auth/signup.php';
});
$router->get('/about', function () {
    include './views/about.php';
});
$router->post('/signup', [AuthController::class, 'signup']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/recipe-collection', [RecipeController::class, 'index']);
$router->get('/contact-us', function () {
    include './views/contact_us.php';
}); 
$router->post('/contact-us', [ContactController::class, 'handleRequest']);
$router->get('/profile', function () {
    include './views/profile.php';
});
$router->post('/profile-update',[ProfileController::class, 'updateProfile']);
$router->get('/community-cookbook', [CommunityController::class, 'index']);
$router->post('/add-post', [CommunityController::class, 'addPost']);
$router->post('/add-comment', [CommunityController::class, 'addComment']);
$router->get('/culinary-resources', function () {
    include './views/culinary_resources.php';
}); 
$router->get('/educational-resources', function () {
    include './views/educational_resources.php';
});
$router->get('/privacy-policy', function () {
    include './views/privacy_policy.php';
});