<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Cookbook - FoodFusion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #FF9F00;
            --secondary-color: #FFD699;
            --accent-color: #FF6B00;
            --light-bg: #FFF9F0;
            --dark-text: #333333;
        }

        body {
            background-color: var(--light-bg);
            color: var(--dark-text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header-title {
            font-family: 'Pacifico', cursive;
            color: var(--accent-color);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            display: inline-block;
        }

        .header-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }

        .posts-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .post-card {
            position: relative;
            background-color: white;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
            width: 100%;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .post-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .post-content {
            padding: 25px;
        }

        .post-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #666;
        }

        .meta-item {
            display: flex;
            align-items: center;
        }

        .meta-item i {
            margin-right: 5px;
            color: var(--primary-color);
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
            border: 2px solid var(--secondary-color);
        }

        .comments-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 0 0 15px 15px;
        }

        .comment {
            display: flex;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .comment-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .comment-content {
            flex-grow: 1;
        }

        .comment-form {
            margin-top: 15px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 8px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(255, 159, 0, 0.3);
        }

        .add-post-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .tag {
            display: inline-block;
            background-color: var(--secondary-color);
            color: var(--dark-text);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        /* Mobile-specific adjustments */
        @media (max-width: 768px) {
            .posts-container {
                padding: 20px 15px;
            }

            .post-card {
                margin-bottom: 30px;
            }

            .post-image {
                height: 250px;
            }

            .post-content {
                padding: 20px;
            }

            .add-post-btn {
                width: 50px;
                height: 50px;
                font-size: 20px;
                bottom: 20px;
                right: 20px;
            }
        }

        /* Animation styles */
        .post-card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .post-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'include/header.php'; ?>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="header-title display-4">Community Cookbook</h1>
            <p class="lead text-muted">Share your culinary creations and connect with fellow food enthusiasts</p>
        </div>

        <!-- Centered Posts Container -->
        <div class="posts-container">
            <?php foreach ($posts as $post): ?>
                <div class="post-card">
                    <!-- Post Image -->
                    <img src="/FoodFusion/<?= htmlspecialchars($post['image']) ?>" class="post-image" alt="<?= htmlspecialchars($post['title']) ?>">

                    <!-- Post Content -->
                    <div class="post-content">
                        <h3 class="mb-3"><?= htmlspecialchars($post['title']) ?></h3>
                        <p class="mb-4">
                            <span class="content-preview">
                                <?= htmlspecialchars(substr($post['content'], 0, 150)) ?><?= strlen($post['content']) > 150 ? '...' : '' ?>
                            </span>
                            <?php if (strlen($post['content']) > 150): ?>
                                <span class="content-full d-none"><?= htmlspecialchars($post['content']) ?></span>
                                <a href="javascript:void(0);" class="see-more-toggle text-primary">See More...</a>
                            <?php endif; ?>
                        </p>


                        <!-- Cooking Tips -->
                        <?php if (!empty($post['cooking_tips'])): ?>
                            <div class="mb-4">
                                <h5><i class="fas fa-lightbulb text-warning"></i> Cooking Tips</h5>
                                <p><?= htmlspecialchars($post['cooking_tips']) ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Ingredients -->
                        <?php if (!empty($post['ingredients'])): ?>
                            <div class="mb-4">
                                <h5><i class="fas fa-utensils text-warning"></i> Ingredients</h5>
                                <p><?= htmlspecialchars($post['ingredients']) ?></p>
                            </div>
                        <?php endif; ?>

                        <!-- Tags -->
                        <div class="post-meta">
                            <span class="meta-item"><i class="fas fa-globe-americas"></i> <?= htmlspecialchars($post['cuisine_type']) ?></span>
                            <span class="meta-item"><i class="fas fa-utensil-spoon"></i> <?= htmlspecialchars($post['dietary_preference']) ?></span>
                            <span class="meta-item"><i class="fas fa-tachometer-alt"></i> <?= htmlspecialchars($post['difficulty']) ?></span>
                        </div>

                        <!-- User Info -->
                        <div class="user-info">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($post['user_name']) ?>&background=FF9F00&color=fff" class="user-avatar">
                            <div>
                                <h6 class="mb-0"><?= htmlspecialchars($post['user_name']) ?></h6>
                                <small class="text-muted"><?= htmlspecialchars($post['created_at']) ?></small>
                            </div>
                        </div>
                    </div>
                    <!-- Comments Section -->
                    <div class="comments-section">
                        <h5><i class="far fa-comments"></i> Comments</h5>

                        <?php foreach ($post['comments'] as $comment): ?>
                            <div class="comment">
                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($comment['user_name']) ?>&background=FF9F00&color=fff" class="comment-avatar">
                                <div class="comment-content">
                                    <strong><?= htmlspecialchars($comment['user_name']) ?></strong>
                                    <p class="mb-0">
                                        <span class="comment-preview">
                                            <?= htmlspecialchars(substr($comment['comment'], 0, 100)) ?><?= strlen($comment['comment']) > 100 ? '...' : '' ?>
                                        </span>
                                        <?php if (strlen($comment['comment']) > 100): ?>
                                            <span class="comment-full d-none"><?= htmlspecialchars($comment['comment']) ?></span>
                                            <a href="javascript:void(0);" class="see-more-toggle text-primary">See More...</a>
                                        <?php endif; ?>
                                    </p>
                                    <small class="text-muted"><?= htmlspecialchars($comment['created_at']) ?></small>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php if (isset($_SESSION['user'])): ?>
                            <!-- Add Comment Form -->
                            <form method="POST" action="/FoodFusion/add-comment" class="comment-form">
                                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                                <div class="input-group">
                                    <input type="text" name="comment"
                                        class="form-control <?= isset($errors[$post['id']]['comment']) ? 'is-invalid' : '' ?>"
                                        placeholder="Write a comment..."
                                        value="<?= htmlspecialchars($_POST['comment'] ?? '') ?>">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i></button>
                                    <?php if (isset($errors[$post['id']]['comment'])): ?>
                                        <div class="invalid-feedback d-block"><?= htmlspecialchars($errors[$post['id']]['comment']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </form>
                        <?php else: ?>
                            <p class="text-muted">You must be logged in to leave a comment.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (isset($_SESSION['user'])): ?>
        <!-- Floating Add Post Button -->
        <button class="btn btn-primary add-post-btn" data-bs-toggle="modal" data-bs-target="#addPostModal">
            <i class="fas fa-plus"></i>
        </button>
    <?php endif; ?>
    <!-- Add Post Modal -->
    <div class="modal fade <?= isset($keepModalOpen) && $keepModalOpen ? 'show' : '' ?>" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true" style="<?= isset($keepModalOpen) && $keepModalOpen ? 'display: block;' : '' ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Share Your Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/FoodFusion/add-post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php if (!empty($errors['general'])): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($errors['general']) ?></div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="title" class="form-label">Recipe Title</label>
                            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" id="title" name="title" placeholder="What are you sharing today?" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
                            <?php if (isset($errors['title'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['title']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Recipe Description</label>
                            <textarea class="form-control <?= isset($errors['content']) ? 'is-invalid' : '' ?>" id="content" name="content" rows="5" placeholder="Tell us about your recipe..."><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
                            <?php if (isset($errors['content'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['content']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Recipe Image</label>
                            <input type="file" class="form-control <?= isset($errors['image']) ? 'is-invalid' : '' ?>" id="image" name="image" accept="image/*">
                            <?php if (isset($errors['image'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['image']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="cuisine" class="form-label">Cuisine Type</label>
                                <select class="form-select" id="cuisine" name="cuisine_type_id">
                                    <?php foreach ($cuisines as $cuisine): ?>
                                        <option value="<?= $cuisine['id'] ?>"><?= htmlspecialchars($cuisine['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dietary" class="form-label">Dietary Preference</label>
                                <select class="form-select" id="dietary" name="dietary_preference_id">
                                    <?php foreach ($diets as $diet): ?>
                                        <option value="<?= $diet['id'] ?>"><?= htmlspecialchars($diet['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="difficulty" class="form-label">Difficulty</label>
                                <select class="form-select" id="difficulty" name="difficulty_id">
                                    <?php foreach ($difficulties as $difficulty): ?>
                                        <option value="<?= $difficulty['id'] ?>"><?= htmlspecialchars($difficulty['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingredients</label>
                            <textarea class="form-control <?= isset($errors['ingredients']) ? 'is-invalid' : '' ?>" id="ingredients" name="ingredients" rows="3" placeholder="List ingredients separated by commas"><?= htmlspecialchars($_POST['ingredients'] ?? '') ?></textarea>
                            <?php if (isset($errors['ingredients'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['ingredients']) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="cooking_tips" class="form-label">Cooking Tips</label>
                            <textarea class="form-control <?= isset($errors['cookingTips']) ? 'is-invalid' : '' ?>" id="cooking_tips" name="cooking_tips" rows="3" placeholder="Share your special tips for this recipe"><?= htmlspecialchars($_POST['cooking_tips'] ?? '') ?></textarea>
                            <?php if (isset($errors['cookingTips'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['cookingTips']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Share Recipe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Animation for post cards when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const postCards = document.querySelectorAll('.post-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            postCards.forEach(card => {
                observer.observe(card);
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const toggleLinks = document.querySelectorAll('.see-more-toggle');

            toggleLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const contentPreview = this.previousElementSibling.previousElementSibling;
                    const contentFull = this.previousElementSibling;

                    if (contentFull.classList.contains('d-none')) {
                        // Show full content
                        contentPreview.classList.add('d-none');
                        contentFull.classList.remove('d-none');
                        this.textContent = 'See Less';
                    } else {
                        // Show preview content
                        contentPreview.classList.remove('d-none');
                        contentFull.classList.add('d-none');
                        this.textContent = 'See More...';
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the modal should remain open
            const keepModalOpen = <?= isset($keepModalOpen) && $keepModalOpen ? 'true' : 'false' ?>;
            if (keepModalOpen) {
                const addPostModal = new bootstrap.Modal(document.getElementById('addPostModal'));
                addPostModal.show();
            }
        });
    </script>
</body>

</html>