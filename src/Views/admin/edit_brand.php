<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">
<?php include './src/Views/admin/header_admin.php' ?>
<div class="content-wrapper">
<div class="container"> 
<h1 class="text-center">Cập Nhật Thương Hiệu</h1>
<form action="/admin/edit-brand/<?php echo $brand['brandId']; ?>" method="POST">
    <div class="form-group">
        <label for="name_add">Tên thươg hiệu:</label>
        <input type="text" id="name_add" name="name" value="<?php echo htmlspecialchars($brand['brandName']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</div>
</div>
<?php include './src/Views/admin/footer_admin.php' ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>