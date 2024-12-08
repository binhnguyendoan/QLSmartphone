<?php ob_start(); ?>
<div class="container my-5">
    <h1 class="text-center mb-4"><?= isset($user['id']) ? 'Update User' : 'Create User' ?></h1>


    <form action="/user/<?= isset($user['id']) ? 'update/' . $user['id'] : 'create' ?>" method="post">

        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?= isset($user['username']) ? $user['username'] : '' ?>" required>
        </div>


        <div class="mb-3">
            <label for="firstname" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname"
                value="<?= isset($user['firstname']) ? $user['firstname'] : '' ?>">
        </div>


        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname"
                value="<?= isset($user['lastname']) ? $user['lastname'] : '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="password_input" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password_input" name="password_input"
                value="<?= isset($user['password_input']) ? $user['password_input'] : '' ?>">
        </div>

        <div class="mb-3">
            <label for="password_check" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="password_check" name="password_check"
                value="<?= isset($user['password_check']) ? $user['password_check'] : '' ?>">
        </div>


        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?= isset($user['email']) ? $user['email'] : '' ?>">
        </div>

        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="<?= isset($user['id']) ? 'Update' : 'Create' ?>">
        </div>
    </form>


    <div class="text-center mt-4">
        <a href="/index.php" class="btn btn-secondary">Back to User List</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ .  '/../../../templates/layout.php'); ?>