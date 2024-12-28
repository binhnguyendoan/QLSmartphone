<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
            <h3 class="text-center">Danh sách khách hàng</h3>
            <div style="overflow-x: auto; max-width: 100%;">
                <table class="table table-dark table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Zipcode</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <?php if (!empty($user)): ?>
                        <?php foreach ($user as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['address']; ?></td>
                                <td><?php echo $user['city']; ?></td>
                                <td><?php echo $user['country']; ?></td>
                                <td><?php echo $user['zipcode']; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <a href="/admin/delete-user/<?= $user['id']; ?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9">Không có khách hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>


            <div class="pagination-container">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($currentPage > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $currentPage - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($currentPage < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $currentPage + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>