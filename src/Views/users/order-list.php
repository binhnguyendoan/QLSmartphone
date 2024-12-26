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
              <li><a href="/cart">cart</a></li>
              <li>history purchase</li>
            </ol>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /.page-header-->
  <!-- checkout -->
  <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xs-12">
            <div class="box checkout-form">
              <!-- checkout - form -->
              <div class="box-head">
                <h2 class="head-title">History Purchase</h2>
              </div>
              <div class="box-body">
                <div class="row">
                  <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                      <?php
                      if($orderItems != null) {
                      ?>
                      <tr>
                        <th></th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>State</th>
                        <th>Order Date</th>
                        <th>Get Total</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Dữ liệu đơn hàng mẫu -->
                       
                      <?php
                      foreach ($orderItems as $item): ?>
                      <tr>
                        <td><img src="../public/userslte/images/<?= $item[6]?>" alt=""></td>
                        <td><?= $item[2]?></td>
                        <td class="d-flex align-items-center justify-content-center vertical-text"><?= $item[4]?></td>
                        <td class="d-flex align-items-center justify-content-center vertical-text"><?= $item[5]?></td>
                        <td class="d-flex align-items-center justify-content-center vertical-text"><span class="<?= ($item[7]==0) ? "badge bg-warning" : "badge bg-success" ?>"><?= ($item[7]==0) ? "Pending" : "Paid"?></td>
                        <td class="d-flex align-items-center justify-content-center vertical-text"><?= $item[8]?></td>
                        <td class="d-flex align-items-center justify-content-center vertical-text"><?= $item[4]*$item[5]?></td>
                        <td class="d-flex align-items-center justify-content-center vertical-text"><a href="#">
                          <?= ($item[7]==0) ? "Payment" : "View Details"?></a></td>
                      </tr>
                      <?php endforeach; 
                      } else {
                      ?>
                      <tr>
                        <td>Không có lịch sử mua hàng</td>
                        <?php
                        }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                  <!-- /.checkout-form -->
                </div>
              </div>
            </div>
          </div>
          <!-- product total -->
        </div>
      </div>
    </div>
          <!-- /.place order -->
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