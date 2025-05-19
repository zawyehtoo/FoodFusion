<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About FoodFusion - Culinary Innovation</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/FoodFusion/assets/recipes/Chicken-Biryani-Recipe-SQ-scaled.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        
        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .value-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .value-card:hover {
            transform: translateY(-10px);
        }
        
        .value-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #FF9F00; 
        }
        
        .philosophy-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }
        
        .team-section {
            padding: 60px 0;
        }
    </style>
</head>
<body>

  <?php include 'include/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4 text-primary">Our Culinary Journey</h1>
            <p class="lead">Where tradition meets innovation in every bite</p>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="philosophy-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">Our Culinary Philosophy</h2>
                    <p class="lead">At FoodFusion, we believe food is more than sustenance - it's an experience, a memory, a connection to culture and community.</p>
                    <p>We celebrate the diversity of global cuisines while pushing boundaries with innovative techniques and unexpected flavor combinations. Our approach respects traditional methods while embracing modern creativity.</p>
                    <p>Every recipe we share is crafted with care, tested for perfection, and designed to inspire your culinary adventures.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Food presentation" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Our Core Values</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="value-card text-center p-4">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Passion</h3>
                        <p>We're driven by an unrelenting love for food and the joy it brings to people's lives.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card text-center p-4">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Innovation</h3>
                        <p>We constantly explore new techniques and combinations to push culinary boundaries.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card text-center p-4">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3>Diversity</h3>
                        <p>We celebrate global flavors and believe in inclusive, accessible cooking for all.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Meet Our Culinary Team</h2>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-member text-center">
                        <img src="/FoodFusion/assets/resources/chef-1.jpg" alt="Chef Maria" class="mb-3">
                        <h4>Maria Rodriguez</h4>
                        <p class="text-muted">Executive Chef</p>
                        <p>With 15 years in Michelin-starred kitchens, Maria brings precision and creativity to every dish.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-member text-center">
                        <img src="/FoodFusion/assets/resources/chef-2.jpg" alt="Chef James" class="mb-3">
                        <h4>James Chen</h4>
                        <p class="text-muted">Fusion Specialist</p>
                        <p>Blending Asian and Western techniques, James creates unexpected flavor harmonies.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-member text-center">
                        <img src="/FoodFusion/assets/resources/chef-3.jpg" alt="Nutritionist Sarah" class="mb-3">
                        <h4>Sarah Johnson</h4>
                        <p class="text-muted">Nutrition Expert</p>
                        <p>Sarah ensures our recipes are as nourishing as they are delicious.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="team-member text-center">
                        <img src="/FoodFusion/assets/resources/chef-4.webp" alt="Pastry Chef David" class="mb-3">
                        <h4>David Müller</h4>
                        <p class="text-muted">Pastry Chef</p>
                        <p>Viennese-trained David elevates desserts to art forms.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary m-md-5 ">
        <div class="container text-center">
            <h2 class="fw-bold mb-4 text-dark">Ready to Start Your Culinary Adventure?</h2>
            <p class="lead mb-4">Join our community of food enthusiasts and explore hundreds of innovative recipes.</p>
            <a href="#" class="btn btn-light btn-lg px-4">Browse Recipes</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php include 'include/footer.php'; ?>  
</body>
</html>