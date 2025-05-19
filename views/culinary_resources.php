<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culinary Resources - FoodFusion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF9F00;
            --primary-light: #FF9F00;
            --secondary: #FFD699;
            --dark: #2E2E2E;
            --light: #FFF9F0;
            --accent: #FF3D00;
        }

        body {
            background-color: var(--light);
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

      


        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header h2 {
            font-weight: 700;
            color: var(--dark);
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-header h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
        }

        .resource-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 30px;
            background: white;
            position: relative;
        }

        .resource-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .resource-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        .card-img-container {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .resource-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .resource-card:hover img {
            transform: scale(1.1);
        }

        .card-body {
            padding: 25px;
        }

        .card-body h5 {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .card-body p {
            color: #666;
            margin-bottom: 20px;
        }

        .btn-resource {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 107, 0, 0.3);
        }

        .btn-resource:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 0, 0.4);
            color: white;
        }

        .video-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-info {
            padding: 20px;
            background: white;
        }

        .video-info h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .video-info p {
            color: #666;
        }

        .category-badge {
            background-color: var(--secondary);
            color: var(--dark);
            font-weight: 600;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 15px;
        }

    </style>
</head>

<body>
    <?php include 'include/header.php'; ?>


    <div class="container mb-5">
        <!-- Recipe Cards Section -->
        <section class="my-5">
            <div class="section-header">
                <h2>Premium Recipe Cards</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="resource-card">
                        <div class="card-img-container">
                            <img src="/FoodFusion/assets/recipes/pasta-card.jpg" alt="Pasta Recipe">
                        </div>
                        <div class="card-body p-3">
                            <span class="category-badge">Italian Cuisine</span>
                            <h5>Artisan Pasta Masterclass</h5>
                            <p>From dough preparation to perfect plating - all the secrets of Italian pasta making</p>
                            <a href="http://localhost/FoodFusion/assets/resources/cookbook.pdf" class="btn text-white bg-primary" download>
                                <i class="fas fa-download me-2"></i> Download Guide
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="resource-card">
                        <div class="card-img-container">
                            <img src="/FoodFusion/assets/recipes/pancakes-card.jpg" alt="Pancakes Recipe">
                        </div>
                        <div class="card-body p-3">
                            <span class="category-badge">Breakfast</span>
                            <h5>Fluffy Pancakes Collection</h5>
                            <p>5 variations of perfect pancakes with pro tips for consistent results</p>
                            <a href="http://localhost/FoodFusion/assets/resources/Easy_recipes.pdf" class="btn text-white bg-primary" download>
                                <i class="fas fa-download me-2"></i> Download Guide
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="resource-card">
                        <div class="card-img-container">
                            <img src="/FoodFusion/assets/recipes/salad-card.jpg" alt="Salad Recipe">
                        </div>
                        <div class="card-body p-3">
                            <span class="category-badge">Healthy Eating</span>
                            <h5>Gourmet Salad Handbook</h5>
                            <p>Transform simple ingredients into restaurant-quality salad creations</p>
                            <a href="http://localhost/FoodFusion/assets/resources/The_cook's_collection.pdf" class="btn text-white bg-primary" download>
                                <i class="fas fa-download me-2"></i> Download Guide
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Tutorials Section -->
        <section class="mb-5">
            <div class="section-header">
                <h2>Masterclass Videos</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/1IszT_guI08" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span class="category-badge">Pasta Techniques</span>
                            <h5>The Science of Perfect Pasta</h5>
                            <p>Learn the exact timing, water salinity, and sauce pairing techniques from Michelin chefs</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/4aZr5hZXP_s" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span class="category-badge">Knife Skills</span>
                            <h5>Professional Knife Mastery</h5>
                            <p>From basic cuts to advanced techniques - everything about knife handling and maintenance</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kitchen Hacks Section -->
        <section>
            <div class="section-header">
                <h2>Pro Kitchen Hacks</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/uNT_AxXrUGs" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span class="category-badge">Gordon Ramsay's Guide To Steak</span>
                            <h5>Gordon Ramsay</h5>
                            <p>Professional tricks that will cut your prep time in half and improve your results</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="video-card">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/G8xELw231qs" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span class="category-badge">How to cook perfect steak</span>
                            <h5>Nick DiGiovanni</h5>
                            <p>How steak is perfectly cooked and taste very delicious. It is very simple to do if you do like in video</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>