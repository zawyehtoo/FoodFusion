<?php
class ProfileController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function updateProfile()
    {
        $errors = [];
        $success = null;

        // Fetch user data (e.g., from session or database)
        session_start();
        $user = $_SESSION['user'] ?? [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['firstName'] ?? '');
            $lastName = trim($_POST['lastName'] ?? '');
            $currentPassword = trim($_POST['current_password'] ?? '');
            $newPassword = trim($_POST['password'] ?? '');
            $confirmPassword = trim($_POST['confirm_password'] ?? '');

            // Validate inputs
             if (empty($firstName)) {
                $errors['firstName'] = 'First name is required';
            }
            if (empty($lastName)) {
                $errors['lastName'] = 'Last name is required';
            }

            if (!empty($newPassword)) {
                if (empty($currentPassword)) {
                    $errors['current_password'] = 'Current password is required to update your password.';
                } elseif (!password_verify($currentPassword, $user['password'])) {
                    $errors['current_password'] = 'Current password is incorrect.';
                } elseif ($newPassword !== $confirmPassword ) {
                    $errors['confirm_password'] = 'Passwords do not match.';
                } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $newPassword)) {
                    $errors['password'] = 'Password must contain at least one uppercase letter, one lowercase letter, and be at least 8 characters long.';
                }
            }

            // If no errors, update the user profile
            if (empty($errors)) {
                $updated = $this->model->updateProfile(
                    $user['id'],
                    !empty($firstName) ? $firstName : $user['first_name'],
                    !empty($lastName) ? $lastName : $user['last_name'],
                    !empty($newPassword) ? $newPassword : null
                );

                if ($updated) {
                    $success = 'Profile updated successfully!';
                    $_SESSION['user'] = $updated;
                    session_destroy();
                    header("Location: /FoodFusion/login");
                    exit;
                } else {
                    $errors['general'] = 'An error occurred while updating your profile. Please try again later.';
                }
            }
        }

        include 'views/profile.php';
    }
}
