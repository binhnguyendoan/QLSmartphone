<?php ob_start();
include(__DIR__ . '/header.php');
?>
<!-- main -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="isotope">
                <?php foreach ($blogs as $blogItem): ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post-masonry">
                    <div class="post-block">
                        <h3 class="post-title">
                            <a href="#" class="title"><?= htmlspecialchars($blogItem['title']) ?></a>
                        </h3>
                        <div class="meta">
                            <span class="meta-date">20 December, 2020</span>
                            <span>|&nbsp; &nbsp;</span>
                            <span class="meta-admin">By <a href="#" class="meta-title">Admin</a></span>
                        </div>

                        <div class="post-img">
                            <a href="#" class="imghover">
                                <img src="/public/img/<?= $blogItem['image']; ?>" alt="<?= $blogItem['title']; ?> ">
                            </a>
                        </div>
                        <div class="post-content">
                            <p><?= htmlspecialchars($blogItem['desc']) ?></p>
                            <a href="/write-blog/<?php echo $blogItem['id']; ?>" class="btn btn-primary btn-sm">read
                                more</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="st-pagination">
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="/blog/<?= max(1, $currentPage - 1); ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="/blog/<?= $i; ?>"><?= $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="/blog/<?= min($totalPages, $currentPage + 1); ?>">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include_once(__DIR__ . '/footer.php'); ?>
<?php
$content = ob_get_clean();
include(__DIR__ . '/../../../templates/layout_template.php');
?>