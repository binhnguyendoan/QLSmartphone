<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
        <h3 class="text-center">Danh sách Danh mục</h3>
        <button class="  mb-3 btn btn-primary  ">
        <a class="text-black"  href="/admin/create-category">Thêm Danh mục</a>
     </button>
     <table class="table table-dark table-striped">
        <tr>
            <th>ID</th>
            <th>Tên Danh mục</th>
            <th></th>
        </tr>
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['catId']; ?></td>
                    <td><?php echo $category['catName']; ?></td>
                    <td>
                        <a href="/admin/edit-category/<?php echo $category['catId']; ?>"><i class="fa-regular fa-pen-to-square"></i></a> |
                        <a class="text-red" href="/admin/delete-category/<?php echo $category['catId']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Không có danh mục nào.</td>
            </tr>
        <?php endif; ?>
    </table>
        </div>
 
    </div>
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>

