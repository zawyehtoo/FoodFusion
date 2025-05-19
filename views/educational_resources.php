<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culinary Education Hub | Cooking Resources</title>
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
            font-family: 'Open Sans', sans-serif;
            background-color: var(--light);
            color: var(--dark);
        }

        /* New Banner Design */
        .culinary-banner {
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            margin-bottom: 60px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 0 20px;
            animation: fadeInUp 1s ease;
        }

        .culinary-banner h1 {
            font-weight: 800;
            font-size: 4rem;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        .culinary-banner .lead {
            font-size: 1.5rem;
            color: white;
            opacity: 0.9;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 30px;
        }

        .btn-banner {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-banner:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .resource-panel {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 40px;
            overflow: hidden;
            transition: all 0.3s ease;
            border-left: 5px solid var(--primary);
        }

        .resource-panel:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .panel-header {
            background-color: var(--primary);
            color: white;
            padding: 15px 25px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .panel-header i {
            margin-right: 15px;
            font-size: 1.5rem;
        }

        .panel-body {
            padding: 25px;
        }

        .resource-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .resource-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-top: 3px solid var(--accent);
        }

        .resource-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .resource-card h5 {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .resource-card p {
            color: #666;
            font-size: 0.95rem;
        }

        .btn-culinary {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }

        .btn-culinary:hover {
            background-color: var(--accent);
            color: white;
            transform: translateY(-2px);
        }

        .btn-culinary i {
            margin-right: 8px;
        }

        .video-display {
            background-color: var(--secondary);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .culinary-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 8px;
            margin-bottom: 8px;
            background-color: var(--secondary);
            color: var(--dark);
        }

        .badge-technique {
            background-color: #FFECB3;
            color: #FF6F00;
        }

        .badge-recipe {
            background-color: #FFCCBC;
            color: #E64A19;
        }

        .badge-baking {
            background-color: #F8BBD0;
            color: #C2185B;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .culinary-banner {
                height: 400px;
                background-attachment: scroll;
            }

            .culinary-banner h1 {
                font-size: 2.5rem;
            }

            .culinary-banner .lead {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <?php include 'include/header.php'; ?>
    <!-- Culinary Header -->
    <section class="culinary-banner">
        <div class="banner-content">
            <h1>Master the Art of Cooking</h1>
            <p class="lead">Professional resources, techniques, and recipes to elevate your culinary skills</p>
            <a href="#resources" class="btn bg-primary">
                <i class="fas fa-utensils me-2"></i> Explore Resources
            </a>
        </div>
    </section>

    <div class="container mb-5">
        <!-- Recipe Cards Panel -->
        <div class="resource-panel">
            <div class="panel-header">
                <i class="fas fa-utensils"></i>
                <span>Educational resources</span>
            </div>
            <div class="panel-body">
                <p>Download our professionally designed recipe cards with step-by-step instructions.</p>

                <div class="resource-grid">
                    <div class="resource-card">
                        <span class="culinary-badge badge-technique">Techniques</span>
                        <h5>Knife Skills Masterclass</h5>
                        <p>Essential cutting techniques every cook should know (PDF, 1.8MB)</p>
                        <a href="http://localhost/FoodFusion/assets/resources/Knife_mastery.pdf" class="btn-culinary" download>
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>

                    <div class="resource-card">
                        <span class="culinary-badge badge-recipe">Italian</span>
                        <h5>Pasta Making Guide</h5>
                        <p>From dough to plate - authentic Italian pasta recipes (PDF, 2.4MB)</p>
                        <a href="http://localhost/FoodFusion/assets/resources/pastaguide.pdf" class="btn-culinary" download>
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>

                    <div class="resource-card">
                        <span class="culinary-badge badge-baking">Baking</span>
                        <h5>Artisan Bread Handbook</h5>
                        <p>Complete guide to sourdough and crusty breads (PDF, 3.1MB)</p>
                        <a href="http://localhost/FoodFusion/assets/resources/Artisan_Bread.pdf" class="btn-culinary" download>
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Video Tutorials Panel -->
        <div class="resource-panel">
            <div class="panel-header">
                <i class="fas fa-video"></i>
                <span>Video Tutorials</span>
            </div>
            <div class="panel-body">
                <p>Watch professional chefs demonstrate essential techniques.</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="video-display">
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/4aZr5hZXP_s" allowfullscreen></iframe>
                            </div>
                            <h5>Perfect Knife Skills</h5>
                            <p>Master chopping, dicing, and mincing techniques</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="video-display">
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/1IszT_guI08" allowfullscreen></iframe>
                            </div>
                            <h5>Making Pasta From Scratch</h5>
                            <p>Traditional Italian pasta dough and shaping</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>