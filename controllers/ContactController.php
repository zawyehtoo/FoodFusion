<?php
require_once 'models/ContactModel.php';
class ContactController {
    private $model;

    public function __construct() {
        $this->model = new ContactModel();
    }

    public function handleRequest() {
        $success = null;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $subject = trim($_POST['subject'] ?? '');
            $message = trim($_POST['message'] ?? '');

            // Validate inputs
            if (empty($name)) {
                $errors['name'] = 'Name is required';
            }
            if (empty($email)) {
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email format';
            }
            if (empty($subject)) {
                $errors['subject'] = 'Subject is required';
            }
            if (empty($message)) {
                $errors['message'] = 'Message is required';
            }

            if (empty($errors)) {
                $success = $this->model->createContactMessages($name, $email, $subject, $message);
            }
        }

        include 'views/contact_us.php';
    }
}
?>