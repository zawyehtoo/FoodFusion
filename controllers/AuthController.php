<?php
require_once 'models/UserModel.php';

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    // Handle user signup
    public function signup()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['firstName'] ?? '');
            $lastName = trim($_POST['lastName'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            // Validate inputs
            if (empty($firstName)) {
                $errors['firstName'] = 'First name is required';
            }
            if (empty($lastName)) {
                $errors['lastName'] = 'Last name is required';
            }
            if (empty($email)) {
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email format';
            }
            if (empty($password)) {
                $errors['password'] = 'Password is required';
            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
                $errors['password'] = 'Password must contain at least one uppercase letter, one lowercase letter, and be at least 8 characters long.';
            }

            // Check if email is unique
            if (empty($errors) && !$this->model->isEmailUnique($email)) {
                $errors['email'] = 'Email is already registered';
            }

            // If no errors, proceed with registration
            if (empty($errors)) {
                if ($this->model->register($firstName, $lastName, $email, $password)) {
                    header("Location: /FoodFusion/login");
                    exit;
                } else {
                    $errors['general'] = 'An error occurred while creating your account. Please try again later.';
                }
            }
        }

        include 'views/auth/signup.php';
    }

    // Handle user login
    public function login()
    {
        session_start();

        // Initialize session variables for failed attempts and lockout time
        if (!isset($_SESSION['failed_attempts'])) {
            $_SESSION['failed_attempts'] = 0;
        }
        if (!isset($_SESSION['lockout_time'])) {
            $_SESSION['lockout_time'] = null;
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            // Validate inputs
            if (empty($email)) {
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email format';
            }
            if (empty($password)) {
                $errors['password'] = 'Password is required';
            }

            // Check if the user is locked out
            if ($_SESSION['lockout_time'] && time() < $_SESSION['lockout_time']) {
                $errors['general'] = 'Your account is locked. Please try again after 3 minutes.';
            } else {
                // Reset lockout if time has passed
                if ($_SESSION['lockout_time'] && time() >= $_SESSION['lockout_time']) {
                    $_SESSION['failed_attempts'] = 0;
                    $_SESSION['lockout_time'] = null;
                }

                // If no validation errors, proceed with login
                if (empty($errors)) {
                    $user = $this->model->login($email, $password);

                    if ($user) {
                        // Successful login
                        $_SESSION['user'] = $user;
                        $_SESSION['failed_attempts'] = 0; // Reset failed attempts
                        $_SESSION['lockout_time'] = null; // Reset lockout time
                        header("Location: /FoodFusion");
                        exit;
                    } else {
                        // Increment failed attempts
                        $_SESSION['failed_attempts']++;

                        // Lock the account if failed attempts reach 3
                        if ($_SESSION['failed_attempts'] >= 3) {
                            $_SESSION['lockout_time'] = time() + 180; // Lock for 3 minutes
                            $errors['general'] = 'Your account is locked due to multiple failed login attempts. Please try again after 3 minutes.';
                        } else {
                            $errors['general'] = 'Invalid email or password. You attempted to login ' . $_SESSION['failed_attempts'] . ' times.';
                        }
                    }
                }
            }
        }

        include 'views/auth/login.php';
    }

    // Handle user logout
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /FoodFusion");
    }
}
