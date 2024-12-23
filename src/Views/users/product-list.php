<?php ob_start();
include_once(__DIR__ . '/header.php');
?>

<main>
  <!-- page-header -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="page-breadcrumb">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li>Product List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.page-header-->
  <!-- product-list -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <!-- sidenav-section -->
          <div id='cssmenu'>
            <ul>
              <li class='has-sub'><a href='#'>CATEGORY</a>
                <ul>
                  <?php foreach ($categories as $category) { ?>
                    <li><a href='?catId=<?= $category['catId'] ?>'><?= $category['catName'] ?></a></li>
                  <?php } ?>
                </ul>
              </li>
              <li class='has-sub'><a href='#'>Brand</a>
                <ul>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Alcatel
                    </label>
                    </span>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Apple</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Google</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">HTC</span>
                    </label>
                    </span>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Samsung</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Vivo</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Nexus</span>
                    </label>
                  </li>
                </ul>
              </li>
              <li class='has-sub'><a href='#'>Price</a>
                <ul>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">500-1000</span>
                    </label>
                  </li>
                  <li><span>
                      <label>
                        <input type="checkbox">
                        <span class="checkbox-list">1000-2000</span>
                      </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">2000-5000</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">5000-10000</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">10000-1800</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">18000-25000</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Above-25000</span>
                    </label>
                  </li>
                </ul>
              </li>
              <li class='has-sub'><a href='#'>Screen Size</a>
                <ul>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">3 - 3.9 inches</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">4 - 4.9 inches</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">5 - 5.9 inches</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">6 inch &amp; above</span>
                    </label>
                  </li>
                </ul>
              </li>
              <li class='has-sub'><a href='#'>PROCESSOR CORES</a>
                <ul>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Hexa Core</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Octa Core</span>
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Quad Core</span>
                    </label>
                  </li>
                </ul>
              </li>
              <li class='has-sub'><a href='#'>FEATURES</a>
                <ul>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">3G Support</span></label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">4G Support</span></label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Duel Camera</span></label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">Expandable Memory</span></label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox">
                      <span class="checkbox-list">FM Radio</span></label>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.sidenav-section -->
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb10 alignright">
              <form>
                <div class="select-option form-group">
                  <select name="sort" class="form-control" onchange="location = this.value;">
                    <option value="">Select</option>
                    <option value="?sort=low_price">Low Price</option>
                    <option value="?sort=high_price">High Price</option>
                  </select>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <!-- product -->
            <?php foreach ($products as $product) { ?>
              <a href="/productDetails/<?= $product['productId'] ?>">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb30">
                  <div class="product-block">
                    <div class="product-img"><img src="../public/userslte/images/<?= $product['image'] ?>" alt=""></div>
                    <div class="product-content">
                      <h5><a href="/productDetails/<?= $product['productId'] ?>" class="product-title"><?= $product['productName'] ?></a></h5>
                      <div class="product-meta"><a href="/productDetails/<?= $product['productId'] ?>" class="product-price">$<?= $product['price'] ?></a>
                        <a href="/productDetails/<?= $product['productId'] ?>" class="discounted-price">$<?= $product['price_sale'] ?></a>
                        <span class="offer-price"><?= $product['offer_price'] ?>%off</span>
                      </div>
                      <div class="shopping-btn">
                        <a href="/productDetails/<?= $product['productId'] ?>" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                        <a href="/productDetails/<?= $product['productId'] ?>" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            <?php } ?>
            <!-- /.product -->
            <div class="row">
              <!-- pagination start -->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="st-pagination">
                  <ul class="pagination">
                    <li><a href="#" aria-label="previous"><span aria-hidden="true" tabindex="-1">Previous</span></a></li>
                    <?php for ($i = 1; $i <= $count; $i++): ?>
                      <?php $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; ?> <!-- lấy ra trang hiện tại  -->
                      <li class="<?= ($i === $page) ? 'active' : ''; ?>"><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <li><a href="#" aria-label="Next"><span aria-hidden="true" tabindex="+1">Next</span></a></li>
                  </ul>
                </div>
              </div>
              <!-- pagination close -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.product-list -->
</main>

<?php include_once(__DIR__ . '/footer.php'); ?>
<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '/../../../templates/layout_template.php');
?>
<script type="text/javascript">
  (function($) {
    $(document).ready(function() {
      $('#cssmenu ul ul li:odd').addClass('odd');
      $('#cssmenu ul ul li:even').addClass('even');
      $('#cssmenu > ul > li > a').click(function() {
        $('#cssmenu li').removeClass('active');
        $(this).closest('li').addClass('active');
        var checkElement = $(this).next();
        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
          $(this).closest('li').removeClass('active');
          checkElement.slideUp('normal');
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
          $('#cssmenu ul ul:visible').slideUp('normal');
          checkElement.slideDown('normal');
        }
        if ($(this).closest('li').find('ul').children().length == 0) {
          return true;
        } else {
          return false;
        }
      });
    });
  })(jQuery);
</script>