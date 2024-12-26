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
              <li><a href="#">Home</a></li>
              <li>Change Password</li>
            </ol>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /.page-header-->
  <!-- sign-up form -->
  <div class="content">
      <div class="container">
        <div class="row">
          <!-- form -->
          <div class="box-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                <h3 class="mb10">Password Setting</h3>
                <p>Please fill all Resgister form Fields Below.</p>
              </div>
              <form action="/updatepassword" method="post">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="password"></label>
                    <input
                      id="id"
                      name="id"
                      type="hidden"
                      class="form-control"
                      value="<?= $_SESSION['user']['id'] ?>"
                      required
                    />
                  </div>
                </div>  
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="password"></label>
                    <input
                      id="oldpassword"
                      name="oldpassword"
                      type="password"
                      class="form-control"
                      placeholder="Enter Old Password"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="password"></label>
                    <input
                      id="newpassword"
                      name="newpassword"
                      type="password"
                      class="form-control"
                      placeholder="Enter New Password"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="password"></label>
                    <input
                      id="passwordconfirm"
                      name="passwordconfirm"
                      type="password"
                      class="form-control"
                      placeholder="Enter Password Confirm"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block mb10">
                    Update Password
                  </button>
                  <div>
                    <p><a href="/profile">Change your infomation</a></p>
                  </div>
                </div>
              </form>

              <!-- /.form -->
            </div>
          </div>
          <!-- /.address-block -->
        </div>
        <!-- support-block -->
      </div>
    </div>
  <!-- /.sign-up form -->
</main>
<?php include_once(__DIR__ . '/footer.php'); ?>
<?php
$content = ob_get_clean();
?>
<?php include(__DIR__ . '/../../../templates/layout_template.php');
?>