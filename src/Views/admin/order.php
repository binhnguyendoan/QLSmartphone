<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <d<div class="container mt-4">
    <h3 class="text-center">Danh sách Order</h3>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Customer ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= $order['productName']; ?></td>
                            <td><?= $order['customerId']; ?></td>
                            <td><?= $order['quantity']; ?></td>
                            <td><?= number_format($order['price'], 0, ',', '.') . ' (VND)'; ?></td>
                            <td><img src="/public/img/<?= $order['image']; ?>" alt="<?= $order['productName']; ?>" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td><?= $order['status'] == 0 ? 'Pending' : 'Completed'; ?></td>
                            <td><?= $order['odDate']; ?></td>
                            <td>
                                <a class="text-danger" href="/admin/delete-order/<?= $order['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <?php if ($order['status'] == 0): ?>
                                    <a href="/admin/update-status/<?= $order['id']; ?>" class="text-success" onclick="return confirm('Bạn có chắc chắn muốn cập nhật trạng thái?');">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center">Không có đơn hàng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
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
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>