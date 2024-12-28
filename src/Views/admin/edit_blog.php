<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>
<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
            <h3 class="text-center">Cật Nhật Blog</h3>
            <form action="/admin/update-blog" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $blog['id']; ?>">
                <label class="form-label" for=" productName">Title</label>
                <input class="form-control" type="text" id="productName" name="title" value="<?= $blog['title']; ?>"
                    required>

                <label class="form-label" for="desc">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="4"><?= $blog['desc']; ?></textarea>

                <label class="form-label" for="image"> Image</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                <img src="/public/img/<?= $blog['image']; ?>" alt="<?= $blog['title']; ?>" width="100px">
                <div class="text-center">
                    <button class="mt -3 btn btn-primary" type="submit">Update Blog</button>

                </div>
            </form>
        </div>

    </div>
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>


<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>