<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
            <h3 class="text-center">Cật Nhật Sản Phẩm</h3>
            <form action="/admin/update-product" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="productId" value="<?= $product['productId']; ?>">
                <label class="form-label" for=" productName">Product Name</label>
                <input class="form-control" type="text" id="productName" name="productName"
                    value="<?= $product['productName']; ?>" required>
                <label class="form-label" for="category">Category</label>
                <select class="form-control" id="category" name="catId" required>
                    <option value="">-- Select Category --</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['catId']; ?>"
                        <?= ($category['catId'] == $product['catId']) ? 'selected' : ''; ?>>
                        <?= $category['catName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label class="form-label" for="brand">Brand</label>
                <select class="form-control" id="brand" name="brandId" required>
                    <option value="">-- Select Brand --</option>
                    <?php foreach ($brands as $brand): ?>
                    <option value="<?= $brand['brandId']; ?>"
                        <?= ($brand['brandId'] == $product['brandId']) ? 'selected' : ''; ?>>
                        <?= $brand['brandName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <label class="form-label" for="desc">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="4"><?= $product['desc']; ?></textarea>

                <label class="form-label" for="price">Price (VND)</label>
                <input class="form-control" type="number" id="price" name="price" step="0.01"
                    value="<?= $product['price']; ?>" required>
                <label class="form-label" for="price">Type (VND)</label>
                <input class="form-control" type="number" id="price" name="type" step="0.01"
                    value="<?= $product['type']; ?>" required>
                <label class="form-label" for="price">Price Sale (VND)</label>
                <input class="form-control" type="number" id="price" name="price_sale"
                    value="<?= $product['price_sale']; ?>" step="0.01" required>
                <label class="form-label" for="price">Offer Price(VND)</label>
                <input class="form-control" type="number" id="price" name="offer_price"
                    value="<?= $product['offer_price']; ?>" step="0.01" required>
                <label class="form-label" for="image">Product Image</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                <img src="/public/img/<?= $product['image']; ?>" alt="<?= $product['productName']; ?>" width="100px">
                <div class="text-center">
                    <button class="mt -3 btn btn-primary" type="submit">Update Product</button>

                </div>
            </form>
        </div>

    </div>
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>