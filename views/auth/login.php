<?php
// Redirect authenticated users to the home page
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    header("Location: /FoodFusion");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FoodFusion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h1 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #FF9F00;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            border: 1px solid #ddd;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #FF9F00;
            box-shadow: 0 0 5px rgba(255, 159, 0, 0.5);
        }

        .btn-primary {
            background-color: #FF9F00;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e68a00;
        }

        .text-muted a {
            color: #FF9F00;
            text-decoration: none;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php include 'include/header.php'; ?>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (isset($errors['general'])): ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <p><?= htmlspecialchars($errors['general']) ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <form action="/FoodFusion/login" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" placeholder="Enter your email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback"><?= htmlspecialchars($errors['email']) ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" placeholder="Enter your password">
                <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback"><?= htmlspecialchars($errors['password']) ?></div>
                <?php endif; ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn text-white bg-primary rounded px-4 w-100">Login</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <p class="text-muted">Don't have an account? <a href="/FoodFusion/signup">Sign up</a></p>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>