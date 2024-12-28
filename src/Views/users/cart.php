<?php ob_start();
include_once(__DIR__ . '/header.php');
?>
<!-- main -->
<main>
  <!-- page-header -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="page-breadcrumb">
            <ol class="breadcrumb">
            <li><a href="/home">Home</a></li>
              <li><a href="/productList">product list</a></li>
              <li>cart</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.page-header-->
  <!-- cart-section -->
  <div class="space-medium">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <div class="box-head">
              <h3 class="head-title">My Cart (<?=  $_SESSION['user']['cartItems'] ?>)</h3>
            </div>
            <!-- cart-table-section -->
            <div class="box-body">
              <div class="table-responsive">
                <div class="cart">
                  <table class="table table-bordered ">
                  <?php if ($cartItems == null){?>
                      <tr><p>Giỏ hàng trống</p></tr>
                    <?php }  else {?>
                    <thead>
                      <tr>
                        <th>
                          <span>Item</span>
                        </th>
                        <th>
                          <span>Price</span>
                        </th>
                        <th>
                          <span>Quantity</span>
                        </th>
                        <th>
                          <span>Total</span>
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($cartItems as $item): ?>
                      <tr>
                        <td><a href="#"><img style="width: 80px; height: 100px;" src="../public/userslte/images/<?= $item[5]?>" alt=""></a>
                          <span><a href="#"></a><?= $item[2]?></span>
                        </td>
                        <td><?= $item[3]?>$</td>
                        <form action="/addorder" method="post">
                        <td>
                          <input type="hidden" name="productId" id="productId" value="<?= $item[1]?>">
                          <input type="hidden" name="productName" id="productName" value="<?= $item[2]?>">
                          <input type="hidden" name="price" id="price" value="<?= $item[3]?>">
                          <input type="hidden" name="image" id="image" value="<?= $item[5]?>">
                          <div class="product-quantity">
                            <div class="quantity">
                              <input type="number" class="input-text qty text" step="1" min="1"  name="quantity" value="<?= $item[4]?>" title="Qty" size="4" pattern="[0-9]*">
                            </div>
                          </div>
                        </td>
                        <td><?= (int)$item[3] * (int)$item[4]?>$</td>
                        <th scope="row"><a href="/removeitem?productId=<?= $item[1]?>" class="btn-close"><i class="fa fa-times-circle-o"></i></a></th>
                        <th scope="row"><button class="btn btn-primary btn-block" type="submit">Buy Now</button></th>
                        </form>
                      </tr>
                      
                      <?php endforeach; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div >
            <div>
              <a href="/productList" class="btn-link"><i class="fa fa-angle-left" ></i> back to shopping</a>
              <div class="page-breadcrumb">
              <a href="/orderlist" class="btn-link" ><i class="fa fa-angle-right "></i> history purchase</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include_once(__DIR__ . '/footer.php'); ?>
<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '/../../../templates/layout_template.php');
?>  