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
              <li>Profile</li>
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
                <h3 class="mb10">Profile Setting</h3>
                <p>Please fill all Resgister form Fields Below.</p>
              </div>
              <form action="/update" method="post">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="name">Name</label>
                    <input
                      id="id"
                      name="id"
                      type="hidden"
                      class="form-control"
                      placeholder="Enter Your Name"
                      value="<?= $_SESSION['user']['id'] ?>"
                      required
                    />
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control"
                      placeholder="Enter Your Name"
                      value="<?= $_SESSION['user']['name'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="phone">Address</label>
                    <input
                      id="address"
                      name="address"
                      type="text"
                      class="form-control"
                      placeholder="Enter Your Address"
                      value="<?= $_SESSION['user']['address'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="phone">City</label>
                    <input
                      id="city"
                      name="city"
                      type="text"
                      class="form-control"
                      placeholder="Enter Your City"
                      value="<?= $_SESSION['user']['city'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="phone">Country</label>
                    <input
                      id="country"
                      name="country"
                      type="text"
                      class="form-control"
                      placeholder="Enter Your Country"
                      value="<?= $_SESSION['user']['country'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="email">Zipcode</label>
                    <input
                      id="zipcode"
                      name="zipcode"
                      type="text"
                      class="form-control"
                      placeholder="Enter Your Zipcode"
                      value="<?= $_SESSION['user']['zipcode'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="password">Phone number</label>
                    <input
                      id="phone"
                      name="phone"
                      type="text"
                      class="form-control"
                      placeholder="Enter Your Phone Number"
                      value="<?= $_SESSION['user']['phone'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="control-label sr-only" for="password">Email</label>
                    <input
                      id="email"
                      name="email"
                      type="email"
                      class="form-control"
                      placeholder="Enter Your Email"
                      value="<?= $_SESSION['user']['email'] ?>"
                      required
                    />
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block mb10">
                    Update
                  </button>
                  <div>
                    <p>
                      <a href="/changepassword">Change your password</a>
                    </p>
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