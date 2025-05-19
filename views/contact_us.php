<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - FoodFusion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF9F00;
            --secondary: #FF8E8E;
            --accent: #FFD166;
            --light: #FFF5F5;
            --dark: #333333;
        }
        
        body {
            background-color: #f9f9f9;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        .contact-hero {
            background: linear-gradient(135deg, rgba(255,107,107,0.9) 0%, rgba(255,214,107,0.9) 100%), 
                        url('https://images.unsplash.com/photo-1504754524776-8f4f37790ca0');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }
        
        .contact-hero::before {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="%23f9f9f9" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="%23f9f9f9" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23f9f9f9"/></svg>');
            background-size: cover;
            z-index: 1;
        }
        
        .contact-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .contact-hero p {
            font-size: 1.3rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        
        .contact-container {
            position: relative;
            z-index: 2;
            margin-top: -50px;
        }
        
        .contact-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .contact-form {
            padding: 40px;
        }
        
        .form-floating label {
            color: #777;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 15px;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(255,107,107,0.25);
        }
        
        .btn-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-submit:hover {
            background-color: #e05a5a;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255,107,107,0.3);
        }
        
        .contact-info {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 40px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .contact-info-item {
            margin-bottom: 30px;
            display: flex;
            align-items: flex-start;
        }
        
        .contact-info-icon {
            font-size: 1.5rem;
            margin-right: 15px;
            margin-top: 5px;
            color: white;
        }
        
        .contact-info-text h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }
        
        .contact-info-text p {
            margin-bottom: 0;
            opacity: 0.9;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: white;
        }
        
        .social-link:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
        }
        
        .floating-ingredients {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        
        .ingredient {
            position: absolute;
            opacity: 0.1;
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .contact-hero {
                padding: 80px 0;
            }
            
            .contact-hero h1 {
                font-size: 2.5rem;
            }
            
            .contact-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <?php include 'include/header.php'; ?>

    <!-- Hero Section -->
    <section class="contact-hero text-center">
        <div class="container">
            <h1 class="display-3 fw-bold">Let's Cook Up a Conversation</h1>
            <p class="lead">We're hungry for your feedback, questions, and recipe ideas!</p>
        </div>
    </section>

    <div class="container contact-container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-card">
                    <div class="row g-0">
                        <div class="col-lg-7">
                            <div class="contact-form">
                                <h2 class="mb-4" style="color: var(--primary);">Send Us a Message</h2>
                                
                                <?php if (isset($success) && $success): ?>
                                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                        <i class="fas fa-check-circle me-2"></i>
                                        <strong>Message Sent!</strong> We'll get back to you soon.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                
                                <form method="POST" action="/FoodFusion/contact-us" >
                                    <div class="mb-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
                                                   id="name" name="name" placeholder="Your Name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                                            <label for="name">Your Name</label>
                                            <?php if (isset($errors['name'])): ?>
                                                <div class="invalid-feedback"><?= $errors['name'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <div class="form-floating">
                                            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                                                   id="email" name="email" placeholder="Email Address" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                            <label for="email">Email Address</label>
                                            <?php if (isset($errors['email'])): ?>
                                                <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control <?= isset($errors['subject']) ? 'is-invalid' : '' ?>" 
                                                   id="subject" name="subject" placeholder="Subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                                            <label for="subject">Subject</label>
                                            <?php if (isset($errors['subject'])): ?>
                                                <div class="invalid-feedback"><?= $errors['subject'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <div class="form-floating">
                                            <textarea class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" 
                                                      id="message" name="message" placeholder="Your Message" style="height: 150px"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                                            <label for="message">Your Message</label>
                                            <?php if (isset($errors['message'])): ?>
                                                <div class="invalid-feedback"><?= $errors['message'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-submit">
                                            <i class="fas fa-paper-plane me-2"></i> Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="contact-info">
                                <h2 class="mb-4">Contact Information</h2>
                                
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <h3>Our Kitchen</h3>
                                        <p>123 Culinary Avenue<br>Foodie City, FC 12345</p>
                                    </div>
                                </div>
                                
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <h3>Call Us</h3>
                                        <p>+1 (555) 123-4567<br>Mon-Fri: 9am-6pm</p>
                                    </div>
                                </div>
                                
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <h3>Email Us</h3>
                                        <p>hello@foodfusion.com<br>support@foodfusion.com</p>
                                    </div>
                                </div>
                                
                                <div class="social-links">
                                    <a href="https://www.facebook.com/" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.twitter.com/" class="social-link"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.pinterest.com/" class="social-link"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-info d-lg-none mt-5">
        <h2 class="mb-4 text-center">Contact Information</h2>

        <div class="contact-info-item">
            <div class="contact-info-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="contact-info-text">
                <h3>Our Kitchen</h3>
                <p>123 Culinary Avenue<br>Foodie City, FC 12345</p>
            </div>
        </div>

        <div class="contact-info-item">
            <div class="contact-info-icon">
                <i class="fas fa-phone-alt"></i>
            </div>
            <div class="contact-info-text">
                <h3>Call Us</h3>
                <p>+1 (555) 123-4567<br>Mon-Fri: 9am-6pm</p>
            </div>
        </div>

        <div class="contact-info-item">
            <div class="contact-info-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-info-text">
                <h3>Email Us</h3>
                <p>hello@foodfusion.com<br>support@foodfusion.com</p>
            </div>
        </div>

        <div class="social-links text-center">
            <a href="https://www.facebook.com/" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="https://www.twitter.com/" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="https://www.pinterest.com/" class="social-link"><i class="fab fa-pinterest-p"></i></a>
        </div>
    </div>

    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>