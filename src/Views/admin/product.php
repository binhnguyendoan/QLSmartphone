<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
            <h3 class="text-center">Danh sách Sản Phẩm</h3>
            <button class="m-3 btn btn-primary  ">
                <a class="text-black" href="/admin/create-product">Thêm Sản phẩm</a>
            </button>
            <div class="mt-3">
                <table class=" table table-dark table-striped">
                    <tr class="mt-3">
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Price Sale</th>
                        <th>Offer Price</th>
                        <th></th>
                    </tr>
                    <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['productName']; ?></td>
                        <td><img src="/public/img/<?= $product['image']; ?>" alt="<?= $product['productName']; ?>"
                                width="100px">
                        <td><?= $product['catName']; ?></td>
                        <td><?= $product['brandName']; ?></td>
                        <td><?= $product['desc']; ?></td>
                        <td><?= number_format($product['price'], 0, ',', '.') . ' (VND)'; ?></td>
                        <td><?= number_format($product['type'], 0, ',', '.') . ' (VND)'; ?></td>
                        <td><?= number_format($product['price_sale'], 0, ',', '.') . ' (VND)'; ?></td>
                        <td><?= number_format($product['offer_price'], 0, ',', '.') . ' (VND)'; ?></td>
                        <td>
                            <a href="/admin/edit-product/<?php echo $product['productId']; ?>"><i
                                    class="fa-regular fa-pen-to-square"></i></a> |
                            <a class="text-red" href="/admin/delete-product/<?= $product['productId']; ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="4">Không có sản phẩm nào.</td>
                    </tr>
                    <?php endif; ?>
                </table>
                <div class="pagination justify-content-center">
                    <ul class="pagination">
                        <li class="page-item <?= ($currentPage == 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="/admin/products/<?= max(1, $currentPage - 1); ?>">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                            <a class="page-link" href="/admin/products/<?= $i; ?>"><?= $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                            <a class="page-link"
                                href="/admin/products/<?= min($totalPages, $currentPage + 1); ?>">Next</a>
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