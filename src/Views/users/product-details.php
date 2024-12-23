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
              <li>Product Single</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.page-header-->
  <!-- product-single -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <!-- product-description -->
            <div class="box-body">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <ul id="demo1_thumbs" class="slideshow_thumbs">
                    <li>
                      <a href="images/thumb_big_1.jpg">
                        <div class=" thumb-img"><img src="images/thumb_1.jpg" alt=""></div>
                      </a>
                    </li>
                    <li>
                      <a href="images/thumb_big_2.jpg">
                        <div class=" thumb-img"><img src="images/thumb_2.jpg" alt=""></div>
                      </a>
                    </li>
                    <li>
                      <a href="images/thumb_big_3.jpg" alt="">
                        <div class=" thumb-img"><img src="images/thumb_3.jpg" alt=""></div>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div id="slideshow"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="product-single">
                    <h2>Google Pixel </h2>
                    <div class="product-rating">
                      <span><i class="fa fa-star"></i></span>
                      <span><i class="fa fa-star"></i></span>
                      <span><i class="fa fa-star"></i></span>
                      <span><i class="fa fa-star"></i></span>
                      <span><i class="fa fa-star-o"></i></span>
                      <span class="text-secondary">&nbsp;(4.8 Review Stars)</span>
                    </div>
                    <p class="product-price" style="font-size: 38px;">$1100 <strike>$1300</strike></p>
                    <p>12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor</p>
                    <div class="product-quantity">
                      <h5>Quantity</h5>
                      <div class="quantity mb20">
                        <input type="number" class="input-text qty text" step="1" min="1" max="6" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-shopping-cart"></i>&nbsp;Add to cart</button>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="box-head scroll-nav">
            <div class="head-title"> <a class="page-scroll active" href="#product">Product Details</a>
              <a class="page-scroll" href="#rating">Ratings &amp; Reviews</a>
              <a class="page-scroll" href="#review">Add Your Reviews</a>
            </div>
          </div>
        </div>
      </div>
      <!-- highlights -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="box" id="product">
            <div class="box-body">
              <div class="highlights">
                <h4 class="product-small-title">Highlights</h4>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <ul class="arrow">
                      <li>12.2 MP Rear | 8 MP Front Camera </li>
                      <li>4GB RAM </li>
                      <li>2700 mAh battery</li>
                    </ul>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <ul class="arrow">
                      <li>Android 8.0 </li>
                      <li>Qualcomm Snapdragon 835</li>
                      <li>Fingerprint Sensor</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="highlights">
                <h4 class="product-small-title">Specification</h4>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>General</h4>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb30">
                    <ul>
                      <li>Brand</li>
                      <li>Model Number </li>
                      <li>Body Material</li>
                      <li>Sim Size</li>
                    </ul>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb30">
                    <ul>
                      <li style="color: #1c1e1e;">Google Pixel </li>
                      <li style="color: #1c1e1e;">Google XYZ</li>
                      <li style="color: #1c1e1e;">Metal and Polycarbonate</li>
                      <li style="color: #1c1e1e;">Micro</li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>Display</h4>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <ul>
                      <li>Screen Size </li>
                      <li>Display Resolution </li>
                      <li>Pixel Density</li>
                      <li>Screen Protection </li>
                    </ul>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <ul>
                      <li style="color: #1c1e1e;">5 inch </li>
                      <li style="color: #1c1e1e;">1280 X 720 Pixels</li>
                      <li style="color: #1c1e1e;">294 PPI</li>
                      <li style="color: #1c1e1e;">Gorilla Glass 4</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- rating reviews  -->
      <div id="rating">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
              <div class="box-head">
                <h3 class="head-title">Rating &amp; Reviews</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="rating-review">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <h1>4.8</h1>
                      <div class="product-rating">
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star-o"></i></span>
                      </div>
                      <p class="text-secondary">20 Ratings &amp; 10 Reviews</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <h2>80%</h2>
                      <p class="text-secondary">Based on 20 Recommendations.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <h4>Have you used this product?</h4>
                      <a href="#" class="btn btn-primary btn-sm">review</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.rating reviews  -->
        <!-- customers review  -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
              <div class="box-head">
                <h3 class="head-title">Customer Reviews</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="customer-reviews">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="product-rating">
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star-o"></i></span>
                      </div>
                      <p class="reviews-text">By <span class="text-default">Michael Byrd</span> on 14 August 2017 </p>
                      <p>Mauris aliquet augue seenim finibusat consectetur metus congutiam convallis aliquam conguen ornare exdolornon scelerisque nisl fringilla ut. Maecenas faucibus purus id elementum laoreen a hendrerit ested laoreet nibh vel lacus sagittis, eu laoreet metus viverraed rutrum.</p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="divider-line"></div>
                    </div>
                  </div>
                  <div class="customer-reviews">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="product-rating">
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star-o"></i></span>
                      </div>
                      <p class="reviews-text">By <span class="text-default">Marc Scott</span> on 13 August 2017 </p>
                      <p>Vivamus molestie enim ut libero condimentumvel malesuada mivulpuorem ipsum dolor sitamet consectetur adipiscing elinec semper orcinec ultricies ultricieunc velitest variussed suscipit sed dignissim acanteras aliquet magna ipsum dictum vulputate dolor suscipit non. </p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="divider-line"></div>
                    </div>
                  </div>
                  <div class="customer-reviews">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="product-rating">
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star-o"></i></span>
                      </div>
                      <p class="reviews-text">By <span class="text-default">William Cassidy</span> on 13 August 2017 </p>
                      <p>Suspendisse viverra nibh vel mattis aliqueroin ultricies vitaeex quis sceleriuisque eleifend convallis leoorbi ultricies turpis nullanec accumsan mi molestie nonaecenas cursus massa quis condimentum venenati uspendisse idmassaut lacus dignissim vestibuonec malesuada ultricies euismod. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- customers review  -->
        <!-- reviews-form -->
        <div id="review">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="box">
                <div class="box-head">
                  <h3 class="head-title">Add A Reviews</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="review-form">

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-rating">
                          <h5>Your Rating : &nbsp;</h5>
                          <div class="star-rate" id="rateYo"></div>


                        </div>
                      </div>
                      <form>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <label class="control-label sr-only " for="name"></label>
                            <input id="name" type="text" class="form-control" placeholder="Name" required="">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <label class="control-label sr-only " for="email"></label>
                            <input id="email" type="text" class="form-control" placeholder="Email" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                          <div class="form-group">
                            <label class="control-label sr-only " for="textarea"></label>
                            <textarea class="form-control" id="textarea" name="textarea" rows="4" placeholder="Enter your Reviews"></textarea>
                          </div>
                          <button id="submit" name="singlebutton" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.reviews-form -->




      </div>




















    </div>
    <!-- /.product-description -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="box-head">
            <h3 class="head-title">Related Product</h3>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="box-body">
          <div class="row">
            <!-- product -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb30">
              <div class="product-block">
                <div class="product-img"><img src="images/product_img_1.png" alt=""></div>
                <div class="product-content">
                  <h5><a href="#" class="product-title">Google Pixel <strong>(128GB, Black)</strong></a></h5>
                  <div class="product-meta"><a href="#" class="product-price">$1100</a>
                    <a href="#" class="discounted-price">$1400</a>
                    <span class="offer-price">20%off</span>
                  </div>
                  <div class="shopping-btn">
                    <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                    <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.product -->
            <!-- product -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb30">
              <div class="product-block">
                <div class="product-img"><img src="images/product_img_2.png" alt=""></div>
                <div class="product-content">
                  <h5><a href="#" class="product-title">HTC U Ultra <strong>(64GB, Blue)</strong></a></h5>
                  <div class="product-meta"><a href="#" class="product-price">$1200</a>
                    <a href="#" class="discounted-price">$1700</a>
                    <span class="offer-price">10%off</span>
                  </div>
                  <div class="shopping-btn">
                    <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                    <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.product -->
            <!-- product -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb30">
              <div class="product-block">
                <div class="product-img"><img src="images/product_img_3.png" alt=""></div>
                <div class="product-content">
                  <h5><a href="#" class="product-title">Samsung Galaxy Note 8</a></h5>
                  <div class="product-meta"><a href="#" class="product-price">$1500</a>
                    <a href="#" class="discounted-price">$2000</a>
                    <span class="offer-price">40%off</span>
                  </div>
                  <div class="shopping-btn">
                    <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                    <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.product -->
            <!-- product -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb30">
              <div class="product-block">
                <div class="product-img"><img src="images/product_img_4.png" alt=""></div>
                <div class="product-content">
                  <h5><a href="#" class="product-title">Vivo V5 Plus <strong>(Matte Black)</strong></a></h5>
                  <div class="product-meta"><a href="#" class="product-price">$1500</a>
                    <a href="#" class="discounted-price">$2000</a>
                    <span class="offer-price">15%off</span>
                  </div>
                  <div class="shopping-btn">
                    <a href="#" class="product-btn btn-like">
                      <i class="fa fa-heart"></i></a>
                    <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.product -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.product-single -->
  </div>
</main>
?>
<?php include(__DIR__ . '/../../../templates/layout_user_home.php');
?>