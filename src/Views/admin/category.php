<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
            <h3 class="text-center">Danh sách Danh mục</h3>
            <button class="m-3 btn btn-primary  ">
                <a class="text-black" href="/admin/create-category">Thêm Danh mục</a>
            </button>
            <div class="mt-3">
                <table class=" table table-dark table-striped">
                    <tr class="mt-3">
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
                            <a href="/admin/edit-category/<?php echo $category['catId']; ?>"><i
                                    class="fa-regular fa-pen-to-square"></i></a> |
                            <a class="text-red" href="/admin/delete-category/<?php echo $category['catId']; ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4">Không có danh mục nào.</td>
                    </tr>
                    <?php endif; ?>
                </table>
                <div class="pagination justify-content-center">
                    <ul class="pagination">
                        <li class="page-item <?= ($currentPage == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="/admin/category/<?= max(1, $currentPage - 1); ?>">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                            <a class="page-link" href="/admin/category/<?= $i; ?>"><?= $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                            <a class="page-link"
                                href="/admin/category/<?= min($totalPages, $currentPage + 1); ?>">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>