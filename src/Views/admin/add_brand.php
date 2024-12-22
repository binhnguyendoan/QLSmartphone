<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">
<?php include './src/Views/admin/header_admin.php' ?>
<div class="content-wrapper">
    <div class="container">
        <h1 class="text-center">Thêm thương hiệu</h1>
            <form action="/admin/update-brand" method="POST">
                <label  for="name_add">Tên Thương hiệu:</label>
                <input  type="text" id="name_add" name="Brandname" required>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
    </div>
</div>
<?php include './src/Views/admin/footer_admin.php' ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>

