<!-- filepath: c:\laragon\www\FoodFusion\include\header.php -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['REQUEST_URI']);
?>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
    /* Set the default font for the entire website */
    body {
        font-family: 'Nunito', sans-serif;
    }

    .text-primary {
        color: #FF9F00 !important;
    }

    .active {
        color: #FF9F00 !important;
        font-weight: bold;
    }

    .bg-primary {
        background-color: #FF9F00 !important;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary" href="#">
                <h2>FoodFusion</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <!-- Links for both desktop and mobile -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'FoodFusion' ? 'active' : ''; ?>" href="/FoodFusion">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'about' ? 'active' : ''; ?>" href="/FoodFusion/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'recipe-collection' ? 'active' : ''; ?>" href="/FoodFusion/recipe-collection">Recipes Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'contact-us' ? 'active' : ''; ?>" href="/FoodFusion/contact-us">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'community-cookbook' ? 'active' : ''; ?>" href="/FoodFusion/community-cookbook">Community Cookbook</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo $current_page === 'resources' ? 'active' : ''; ?>" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resources
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="resourcesDropdown">
                            <li><a class="dropdown-item" href="/FoodFusion/culinary-resources">Culinary Resources</a></li>
                            <li><a class="dropdown-item" href="/FoodFusion/educational-resources">Educational Resources</a></li>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <!-- Show username if authenticated -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="/FoodFusion/profile">Profile</a></li>
                                <!-- Trigger the logout confirmation modal -->
                                <li><button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <!-- Show login/signup links if not authenticated -->
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page === 'login.php' ? 'active' : ''; ?>" href="/FoodFusion/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $current_page === 'signup.php' ? 'active' : ''; ?>" href="/FoodFusion/signup">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="/FoodFusion/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>