<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">
<?php include './src/Views/admin/header_admin.php' ?>
<div class="content-wrapper">
    <div class="container">
        <h1 class="text-center">Thêm Danh mục</h1>
            <form action="/admin/update-category" method="POST">
                <label  for="name_add">Tên Danh mục:</label>
                <input  type="text" id="name_add" name="name" required>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
    </div>
</div>
<?php include './src/Views/admin/footer_admin.php' ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>

<script>
    const error = "<?php echo $error; ?>";
    const message = "<?php echo $message; ?>";

    if (error) {
        Toastify({
            text: error,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)",
        }).showToast();
    } else if (message) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();
    }