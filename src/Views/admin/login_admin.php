<?php ob_start(); ?>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="/login" method="post" class="form_login">
    <h3>Login Admin</h3>
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Email or Phone" id="username" required>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password" required>
    <button type="submit">Log In</button>
</form>

<script>
    const error = "<?php echo $error; ?>";
    if (error) {
        Toastify({
            text: error,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
        }).showToast();
    }
</script>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>