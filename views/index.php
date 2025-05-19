<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodFusion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set a fixed height for the carousel */
        .carousel-inner img {
            height: 500px;
            /* Adjust the height as needed */
            object-fit: cover;
            /* Ensures the image scales properly */
        }

        /* Overlay for the carousel */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black with 50% opacity */
            z-index: 1;
        }

        .landingImgContainer {
            position: relative;
            width: 100%;
            height: 500px;
            /* Adjust the height as needed */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Centered text and button */
        .overlay-content {
            position: absolute;

            z-index: 2;
            text-align: center;
            color: white;
        }

        .overlay-content p {
            font-size: 1.2rem;
        }

        .overlay-content .btn {
            margin-top: 10px;
        }

        .carousel-inner img {
            height: 500px;
            object-fit: cover;
        }

        .pinterest-layout {
            column-count: 3;
            column-gap: 20px;
            padding: 0 10px;
        }

        @media (max-width: 992px) {
            .pinterest-layout {
                column-count: 2;
            }
        }

        @media (max-width: 576px) {
            .pinterest-layout {
                column-count: 1;
            }

            .card img {
                height: 300px;
            }
        }

        @media(max-width: 768px) {
            .carousel-inner img {
                height: 300px;
            }
        }

        .card {
            display: inline-block;
            width: 100%;
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .card-img-top {
            width: 100%;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #FF9F00;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        /* Modal Custom Styling */
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #FF9F00;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border: 1px solid #ddd;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #FF9F00;
            box-shadow: 0 0 5px rgba(255, 159, 0, 0.5);
        }

        .btn-primary {
            background-color: #FF9F00;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e68a00;
        }
    </style>
</head>

<body>
    <?php include 'include/header.php'; ?>

    <div>
        <div class="landingImgContainer">
            <div class="overlay"></div>
            <div class="overlay-content px-4">
                <h1 class="text-primary display-4 fw-bold">Welcome to FoodFusion</h1>
                <p class="display-5">Discover delicious recipes and culinary inspiration.</p>
                <?php if (!isset($_SESSION['user'])): ?>
                    <button type="button" class="btn text-white bg-primary rounded px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Join Us
                    </button>
                <?php endif; ?>

            </div>
            <img src="assets/landing/landing_img.png" alt="landing_image" class="w-100" style="height: 500px; object-fit: cover;">
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h2 class="modal-title text-center" id="exampleModalLabel">Join Us</h2>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="/FoodFusion/signup" method="POST">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input name="firstName" type="text" class="form-control <?= isset($errors['firstName']) ? 'is-invalid' : '' ?>" id="firstName" placeholder="Enter your first name" value="<?= htmlspecialchars($_POST['firstName'] ?? '') ?>">
                                <?php if (isset($errors['firstName'])): ?>
                                    <div class="invalid-feedback"><?= $errors['firstName'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input name="lastName" type="text" class="form-control <?= isset($errors['lastName']) ? 'is-invalid' : '' ?>" id="lastName" placeholder="Enter your last name" value="<?= htmlspecialchars($_POST['lastName'] ?? '') ?>">
                                <?php if (isset($errors['lastName'])): ?>
                                    <div class="invalid-feedback"><?= $errors['lastName'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" placeholder="Enter your email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" placeholder="Enter your password">
                                <?php if (isset($errors['password'])): ?>
                                    <div class="invalid-feedback"><?= $errors['password'] ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary rounded px-4 w-100">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <section id="featured_recipes" class="my-4 container">
            <h1 class="text-center text-primary">Featured Recipes</h1>
            <div class="card-container mt-4">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-90">
                            <img src="/FoodFusion/assets/recipes/Spicy-Penne-Pasta_-done.png" class="card-img-top" height="300px" alt="Spicy Penne Pasta">
                            <div class="card-body">
                                <h5 class="card-title">Spicy Arrabbiata Penne</h5>
                                <p class="card-text">Al dente penne tossed in fiery tomato sauce with garlic, chili flakes, and fresh basil. Ready in just 20 minutes!</p>
                                <a href="/FoodFusion/recipe-collection" class="btn bg-primary text-white">Get Recipe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-90">
                            <img src="/FoodFusion/assets/recipes/No-rise-pizza-dough.jpg" class="card-img-top" height="300px" alt="No-Rise Pizza Dough">
                            <div class="card-body">
                                <h5 class="card-title">Quick Pizza Dough</h5>
                                <p class="card-text">Crispy, chewy crust in 30 minutes flat - no waiting! Perfect for weeknight pizza cravings. It is easy to cook</p>
                                <a href="/FoodFusion/recipe-collection" class="btn bg-primary text-white">Get Recipe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-90">
                            <img src="/FoodFusion/assets/recipes/Tacos.jpg" class="card-img-top" height="300px" alt="Street-Style Tacos">
                            <div class="card-body">
                                <h5 class="card-title">Street-Style Tacos</h5>
                                <p class="card-text">Authentic corn tortillas stuffed with seasoned meat, fresh cilantro, and zesty lime. Serve with spicy salsa!</p>
                                <a href="/FoodFusion/recipe-collection" class="btn bg-primary text-white">Get Recipe</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="culinary_trends" class="my-4 container">
            <h1 class="text-center text-primary">Culinary Trends</h1>
            <div class="pinterest-layout mt-4">
                <div class="card">
                    <img src="/FoodFusion/assets/recipes/trend1.jpg" class="card-img-top" alt="Recipe 1">
                    <div class="card-body">
                        <h5 class="card-title">Recipe 1</h5>
                        <p class="card-text">A delicious recipe to try at home.</p>
                    </div>
                </div>

                <div class="card">
                    <img src="/FoodFusion/assets/recipes/TomYumRice.jpg" class="card-img-top" alt="Recipe 3">
                    <div class="card-body">
                        <h5 class="card-title">Recipe 3</h5>
                        <p class="card-text">A healthy and tasty recipe for everyone.</p>
                    </div>
                </div>

                <div class="card">
                    <img src="/FoodFusion/assets/recipes/Lasagna.jpg" class="card-img-top" alt="Recipe 2">
                    <div class="card-body">
                        <h5 class="card-title">Recipe 2</h5>
                        <p class="card-text">A quick and easy recipe for busy days.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/FoodFusion/assets/recipes/spaghetti.jpg" class="card-img-top" alt="Recipe 4">
                    <div class="card-body">
                        <h5 class="card-title">Recipe 4</h5>
                        <p class="card-text">A perfect recipe for special occasions.</p>
                    </div>
                </div>


                <div class="card">
                    <img src="/FoodFusion/assets/recipes/salad-card.jpg" class="card-img-top" alt="Recipe 4">
                    <div class="card-body">
                        <h5 class="card-title">Recipe 4</h5>
                        <p class="card-text">A perfect recipe for special occasions.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/FoodFusion/assets/recipes/pad kra pao.jpg" class="card-img-top" alt="Recipe 3">
                    <div class="card-body">
                        <h5 class="card-title">Recipe 3</h5>
                        <p class="card-text">A healthy and tasty recipe for everyone.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="upcoming_events" class="my-5">
            <h1 class="text-center text-primary">Upcoming Events</h1>
            <div id="carouselExampleAutoplaying" class="carousel slide mt-4 mx-2 mx-sm-4 mx-md-5" data-bs-ride="carousel">
                <div class="carousel-overlay"></div>

                <div class="carousel-inner rounded-4">
                    <div class="carousel-item active">
                        <img src="/FoodFusion/assets/resources/event-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/FoodFusion/assets/resources/event-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/FoodFusion/assets/resources/event-3.avif" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

    </div>

    <?php include 'include/footer.php'; ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>