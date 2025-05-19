<!-- filepath: c:\laragon\www\FoodFusion\include\footer.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .footer-link {
        text-decoration: none;
        color: white;
        position: relative;
        margin-top: 5px;
        display: inline-block;
    }

    .footer-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: black;
        transition: width 0.3s ease-in-out;
    }

    .footer-link:hover::after {
        width: 100%;
    }

    #cookieConsent {
        z-index: 1050;
        width: 300px;
        border-radius: 10px;
        margin-left: 10px;
        margin-bottom: 10px;
    }

    #cookieConsent .btn-primary {
        background-color: #007bff;
        border: none;
    }

    #cookieConsent .btn-primary:hover {
        background-color: #0056b3;
    }

    #cookieConsent .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }

    #cookieConsent .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        color: #343a40;
    }

    #cookieConsent a {
        font-weight: bold;
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
        background: rgba(255, 255, 255, 0.2);
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
</style>

<body>

    <footer class="bg-primary text-white py-4">
        <div class="container px-4 mb-4">
            <div class="row">
                <!-- First Column: Text -->
                <div class="col-md-7">
                    <h3 class="text-dark display-1 fw-bold">About FoodFusion</h3>
                    <p>
                        FoodFusion is your go-to destination for delicious recipes and culinary inspiration.
                        Join us to explore a world of flavors and creativity in the kitchen.
                    </p>
                </div>

                <!-- Second Column: Quick Links -->
                <div class="col-md-5">
                    <h5 class="text-dark">Quick Links</h5>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <ul class="list-unstyled">
                                <li><a href="/FoodFusion" class="footer-link">Home</a></li>
                                <li><a href="/FoodFusion/about" class="footer-link">About</a></li>
                                <li><a href="/FoodFusion/recipe-collection" class="footer-link">Recipe Collection</a></li>
                                <li><a href="/FoodFusion/contact-us" class="footer-link">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="list-unstyled">
                                <li><a href="/FoodFusion/community-cookbook" class="footer-link">Community Cookbook</a></li>
                                <li><a href="/FoodFusion/culinary-resources" class="footer-link">Culinary Resources</a></li>
                                <li><a href="/FoodFusion/educational-resources" class="footer-link">Educational Resources</a></li>
                                <li><a href="/FoodFusion/privacy-policy" class="footer-link">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="mt-4">
                        <h5 class="text-dark">Follow Us</h5>
                        <div class="d-flex gap-3">
                            <a href="https://www.facebook.com/" class="social-link"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.twitter.com/" class="social-link"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.pinterest.com/" class="social-link"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Cookie consent -->
        <div id="cookieConsent" class="position-fixed bottom-0 start-0 bg-light border shadow-sm p-3">
            <div class="d-flex flex-column align-items-start">
                <div class="text-dark mb-2">
                    <span>We use cookies to ensure you get the best experience on our website. By continuing to browse, you agree to our <a href="privacy.php" class="text-primary text-decoration-none">Privacy Policy</a>.</span>
                </div>
                <div>
                    <button id="accept-cookies" class="btn btn-primary me-2">Accept</button>
                    <button id="decline-cookies" class="btn btn-outline-secondary">Decline</button>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Cookie consent functionality
        document.addEventListener('DOMContentLoaded', function() {
            const cookieConsent = document.getElementById('cookieConsent');
            const acceptButton = document.getElementById('accept-cookies');
            const declineButton = document.getElementById('decline-cookies');

            // Check if the user has already accepted or declined cookies
            if (localStorage.getItem('cookieConsent') === 'accepted') {
                cookieConsent.style.display = 'none';
            } else if (localStorage.getItem('cookieConsent') === 'declined') {
                cookieConsent.style.display = 'none';
            }

            acceptButton.addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'accepted');
                cookieConsent.style.display = 'none';
            });

            declineButton.addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'declined');
                cookieConsent.style.display = 'none';
            });
            const alertCloseButtons = document.querySelectorAll('.alert .btn-close');

            alertCloseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Reload the page when the alert is closed
                    location.href = location.pathname;
                });
            });
        });
    </script>
</body>