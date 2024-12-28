<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
            <h3 class="text-center">Danh sách blog</h3>
            <button class="  mb-3 btn btn-primary  ">
                <a class="text-black" href="/admin/create-blog">Thêm blog</a>
            </button>
            <table class="table table-dark table-striped">
                <tr>
                    <th>ID</th>
                    <th>Tên Blog</th>
                    <th>Image</th>
                    <th>Desc</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($blog)): ?>
                <?php foreach ($blog as $blog): ?>
                <tr>
                    <td><?php echo $blog['id']; ?></td>
                    <td><?php echo $blog['title']; ?></td>
                    <td><img src="/public/img/<?= $blog['image']; ?>" alt="<?= $blog['title']; ?>" width="100px">
                    <td><?php echo $blog['desc']; ?></td>
                    <td>
                        <a href="/admin/edit-blog/<?php echo $blog['id']; ?>"><i
                                class="fa-regular fa-pen-to-square"></i></a> |
                        <a class="text-red" href="/admin/delete-blog/<?php echo $blog['id']; ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i
                                class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4">Không có blog nào.</td>
                </tr>
                <?php endif; ?>
            </table>
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="/admin/blog/<?= max(1, $currentPage - 1); ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="/admin/blog/<?= $i; ?>"><?= $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="/admin/blog/<?= min($totalPages, $currentPage + 1); ?>">Next</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>