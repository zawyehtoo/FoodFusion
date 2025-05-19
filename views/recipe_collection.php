<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Collection - FoodFusion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://t3.ftcdn.net/jpg/09/81/56/10/360_F_981561091_94xGRYYV1nqZb6PKT7IfpxLQIBm6mWQ4.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 30px;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .filter-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .recipe-card {
            display: flex;
            flex-direction: column;
            height: 100%; /* Ensure all cards take up the same height */
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
        }

        .recipe-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .recipe-card img {
            height: 200px; /* Set a consistent height for images */
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .recipe-card .card-body {
            flex-grow: 1; /* Make the card body expand to fill available space */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensure spacing between content and button */
            padding: 20px;
        }

        .recipe-card h5 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #FF9F00;
            margin-bottom: 10px;
        }

        .recipe-card p {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 15px;
        }

        .recipe-tags {
            margin-bottom: 15px;
        }

        .recipe-tags span {
            font-size: 0.85rem;
            margin-right: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            background-color: #f1f1f1;
            color: #555;
        }

        .recipe-tags span.cuisine {
            background-color: #FF9F00;
            color: white;
        }

        .recipe-tags span.diet {
            background-color: #28a745;
            color: white;
        }

        .recipe-tags span.difficulty {
            background-color: #007bff;
            color: white;
        }

        .recipe-card .btn {
            background-color: #FF9F00;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .recipe-card .btn:hover {
            background-color: #e68a00;
            color: white;
        }

        .position-relative {
            position: relative;
        }

        .difficulty-tag {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <?php include 'include/header.php'; ?>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1 class="text-primary">Recipe Collection</h1>
        <p>A curated collection of diverse recipes from around the world, categorized by cuisine type, dietary preferences, and cooking difficulty.</p>
    </div>

    <div class="container my-5">
        <!-- Filter Section -->
        <section class="filter-section">
            <h2 class="text-center text-primary mb-4">Filter Recipes</h2>
            <form method="GET" action="">
                <div class="row">
                    <!-- Cuisine Type -->
                    <div class="col-md-4 mb-3">
                        <label for="cuisine" class="form-label">Cuisine Type</label>
                        <select name="cuisine" id="cuisine" class="form-select">
                            <option value="">All</option>
                            <?php foreach ($cuisines as $cuisine): ?>
                                <option value="<?= $cuisine['id'] ?>" <?= isset($_GET['cuisine']) && $_GET['cuisine'] == $cuisine['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cuisine['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Dietary Preferences -->
                    <div class="col-md-4 mb-3">
                        <label for="diet" class="form-label">Dietary Preferences</label>
                        <select name="diet" id="diet" class="form-select">
                            <option value="">All</option>
                            <?php foreach ($diets as $diet): ?>
                                <option value="<?= $diet['id'] ?>" <?= isset($_GET['diet']) && $_GET['diet'] == $diet['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($diet['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Cooking Difficulty -->
                    <div class="col-md-4 mb-3">
                        <label for="difficulty" class="form-label">Cooking Difficulty</label>
                        <select name="difficulty" id="difficulty" class="form-select">
                            <option value="">All</option>
                            <?php foreach ($difficulties as $difficulty): ?>
                                <option value="<?= $difficulty['id'] ?>" <?= isset($_GET['difficulty']) && $_GET['difficulty'] == $difficulty['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($difficulty['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn text-white mx-1 bg-primary">Apply Filters</button>
                    <a href="/FoodFusion/recipe-collection" class="btn btn-danger">Reset Filters</a>
                </div>
            </form>
        </section>

        <!-- Recipe Grid Section -->
        <section class="recipe-grid">
            <h2 class="text-center text-primary mb-4">Recipe Collection</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <?php if (!empty($recipes)): ?>
                    <?php foreach ($recipes as $recipe): ?>
                        <div class="col">
                            <div class="card recipe-card">
                                <div class="position-relative">
                                    <img src="/FoodFusion/<?= htmlspecialchars($recipe['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($recipe['title']) ?>">
                                    <span class="difficulty-tag"><?= htmlspecialchars($recipe['difficulty']) ?></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($recipe['title']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($recipe['description']) ?></p>
                                    <div class="recipe-tags">
                                        <span class="cuisine"><?= htmlspecialchars($recipe['cuisine_type']) ?></span>
                                        <span class="diet"><?= htmlspecialchars($recipe['dietary_preference']) ?></span>
                                    </div>
                                    <div class="mt-3">
                                        <!-- Button to trigger modal -->
                                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#recipeModal<?= $recipe['id'] ?>">
                                            View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="recipeModal<?= $recipe['id'] ?>" tabindex="-1" aria-labelledby="recipeModalLabel<?= $recipe['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="recipeModalLabel<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="/FoodFusion/<?= htmlspecialchars($recipe['image']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($recipe['title']) ?>">
                                        <p><strong>Description:</strong> <?= htmlspecialchars($recipe['description']) ?></p>
                                        <p><strong>Cuisine Type:</strong> <?= htmlspecialchars($recipe['cuisine_type']) ?></p>
                                        <p><strong>Dietary Preference:</strong> <?= htmlspecialchars($recipe['dietary_preference']) ?></p>
                                        <p><strong>Difficulty:</strong> <?= htmlspecialchars($recipe['difficulty']) ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-white bg-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="d-flex flex-column justify-content-center align-items-center text-center" style="min-height: 50vh; width: 100%;">
                        <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="No Recipes Found" style="width: 150px; height: 150px;">
                        <h3 class="mt-4 text-secondary">No Recipes Found</h3>
                        <p class="text-muted">Try adjusting your filters or explore other categories.</p>
                        <a href="/FoodFusion/recipe-collection" class="btn btn-primary mt-3">Reset Filters</a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <nav class="d-flex justify-content-center mt-5">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?><?= !empty($filters['cuisine']) ? '&cuisine=' . $filters['cuisine'] : '' ?><?= !empty($filters['diet']) ? '&diet=' . $filters['diet'] : '' ?><?= !empty($filters['difficulty']) ? '&difficulty=' . $filters['difficulty'] : '' ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </section>
    </div>

    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>