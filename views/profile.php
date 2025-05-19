<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $user = $_SESSION['user'] ?? [];
}
if (!isset($_SESSION['user'])) {
    header("Location: /FoodFusion/login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - FoodFusion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #FF9F00;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e68a00;
        }
    </style>
</head>

<body>
    <?php include 'include/header.php'; ?>

    <div class="container profile-container">
        <h2 class="text-center mb-4">Profile Details</h2>

        <?php if (isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?= htmlspecialchars($success) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>


        <form method="POST" action="/FoodFusion/profile-update">

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control <?= isset($errors['firstName']) ? 'is-invalid' : '' ?>"
                    id="firstName" name="firstName" placeholder="Enter your first name"
                    value="<?= htmlspecialchars($_POST['firstName'] ?? $user['first_name'] ?? '') ?>">
                <?php if (isset($errors['firstName'])): ?>
                    <div class="invalid-feedback"><?= $errors['firstName'] ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control <?= isset($errors['lastName']) ? 'is-invalid' : '' ?>"
                    id="lastName" name="lastName" placeholder="Enter your last name"
                    value="<?= htmlspecialchars($_POST['lastName'] ?? $user['last_name'] ?? '') ?>">
                <?php if (isset($errors['lastName'])): ?>
                    <div class="invalid-feedback"><?= $errors['lastName'] ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-body-tertiary">(read only)</span></label>
                <input readonly type="email" class="form-control text-body-tertiary"
                    id="email" name="email" placeholder="Enter your email"
                    value="<?= $user['email'] ?>">
            </div>

            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="text" class="form-control <?= isset($errors['current_password']) ? 'is-invalid' : '' ?>"
                    id="current_password" name="current_password" placeholder="Enter your current password" value="<?= htmlspecialchars($_POST['current_password'] ?? '') ?>">
                <?php if (isset($errors['current_password'])): ?>
                    <div class="invalid-feedback"><?= $errors['current_password'] ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="text" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                    id="password" name="password" placeholder="Enter a new password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>">
                <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="text" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>"
                    id="confirm_password" name="confirm_password" placeholder="Confirm your new password" value="<?= htmlspecialchars($_POST['confirm_password'] ?? '') ?>">
                <?php if (isset($errors['confirm_password'])): ?>
                    <div class="invalid-feedback"><?= $errors['confirm_password'] ?></div>
                <?php endif; ?>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
            </div>
        </form>
    </div>

    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>