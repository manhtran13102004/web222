<div class="page-wrapper">
  <?php require_once './mvc/views/' . $data['header'] . '.php'; ?>
  <main class="page-main">
    <!--==========================GIOI THIEU======================-->
    <div class="section-first-screen">
      <div uk-slideshow="animation push">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex=-1 uk-slideshow="min-height: 300; max-height: 600;">
          <ul class="uk-slideshow-items">
            <li>
              <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                <img src="https://freshfood.exdomain.net/image/cache/catalog/Slide/banner%202-1360x577.png" alt="slider-1" data-uk-cover>
              </div>
            </li>
            <li>
              <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                <img src="https://thucphamsachvita.com/wp-content/uploads/2020/05/banner-vita-2.jpg" alt="slider-2" data-uk-cover>
              </div>
            </li>
          </ul>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

        </div>
      </div>
    </div>
    <!----==================TIN TUC==============-->

    <div class="section-features">
      <div class="uk-container">
        <div class="uk-grid uk-child-width-1-2@m uk-flex-middle data-uk-grid" style="margin-top: 50px;">
          <div>
            <div class="section-title">
              <h1 style="font-weight: bold;">CAM KẾT CỦA COOPFOOD</h1>
            </div>

            <div class="section-content">
              <p style="color: #56B280">
              <ul style="list-style-type: none;">
                <li>
                  <i class="bi bi-check-circle"></i>
                  Hàng nhập khẩu tận gốc, bao bì xuất xứ rõ ràng
                </li>
                <li>
                  <i class="bi bi-check-circle"></i>
                  Thực phẩm tươi ngon - Hải sản chế biến trong ngày
                </li>
                <li>
                  <i class="bi bi-check-circle"></i>
                  Dập, hư hoàn tiền kèm tặng thêm phần trái cây tươi mới tương tự
                </li>
                <li>
                  <i class="bi bi-check-circle"></i>
                  Giao nhanh trong 2h
                </li>

              </ul>
              <div class="uk-margin-medium-top"><a class="uk-button" href="http://localhost:8080/web222/home/catalog"><span>Mua ngay</span></a></div>
            </div>

          </div>



          <div class="uk-text-center" style="padding-top:50px;"> <img src="https://cdn.tgdd.vn/Products/Images/8788/295171/bhx/tao-braeburn-mini-nhap-khau-new-zealand-hop-1kg-8-11-trai-202210280833231720.jpg" alt="">
          </div>
        </div>

        <br><br>

      </div>
    </div>
    <!--=================DANH MUC SAN PHAM=================-->
    <div class="category" style="margin-bottom: 50px;padding-bottom:30px;">
      <div class="sectionheader">
        <h2 class="sectiontitle">DANH MỤC SẢN PHẨM</h2>
        <p class="sectiondescription">
          Chúng tôi cung cấp các loại thịt, trái cây, rau củ tươi xanh, thủy hải sản tươi ngon nhất cùng với các loại nước giải khát, bánh kẹo
        </p>
      </div>
      <div class="uk-container">
        <ul class="js-filter uk-grid uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@l" data-uk-grid>

          <li class="category-card" style="text-align :center;">
            <a href="http://localhost:8080/web222/home/catalog">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/pages/home/food.jpg" alt="">
              </div>
              <h5 class="name">Thực phẩm</h5>
            </a>
          </li>
          <li class="category-card" style="text-align :center;">
            <a href="http://localhost:8080/web222/home/catalog">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/pages/home/water.png" alt="">
              </div>
              <h5 class="name">Nước ngọt</h5>
            </a>
          </li>
          <li class="category-card" style="text-align :center;">
            <a href="http://localhost:8080/web222/home/catalog">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/pages/home/candy.jpg" alt="">
              </div>
              <h5 class="name">Bánh kẹo</h5>
            </a>
          </li>
          <li class="category-card" style="text-align :center;">
            <a href="http://localhost:8080/web222/home/catalog">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/pages/home/fruit.png" alt="">
              </div>
              <h5 class="name">Trái cây</h5>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!--=======================TRAI CAY KHUYEN MAI=====================-->
    <div class="category" style="padding-bottom:30px;">
      <div class="sectionheader">
        <h2 class="sectiontitle">SẢN PHẨM KHUYẾN MÃI HÔM NAY</h2>
        <p class="sectiondescription">
          Có COOPFOOD - Không lo về giá
        </p>
        <p class="sectiondescription">
          Giảm ngay 25% Cho khách hàng lần đầu đặt qua ứng dụng Online
        </p>
      </div>
      <div class="uk-container">
        <div class="js-filter uk-grid uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@l" data-uk-grid>
          <li class="category-card" style="text-align: center;">
            <a href="http://localhost:8080/web222/home/product/11" style="text-decoration: none;">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/products/11.png" alt="">
              </div>
              <h5 class="name">Dưa lưới vỏ xanh</h5>
            </a>
          </li>
          <li class="category-card" style="text-align: center;">
            <a href="http://localhost:8080/web222/home/product/13" style="text-decoration: none;">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/products/13.png" alt="">
              </div>
              <h5 class="name">Nho xanh không hạt</h5>
            </a>
          </li>
          <li class="category-card" style="text-align: center;">
            <a href="http://localhost:8080/web222/home/product/31" style="text-decoration: none;">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/products/31.png" alt="">
              </div>
              <h5 class="name">Bí xanh</h5>
            </a>
          </li>
          <li class="category-card" style="text-align: center;">
            <a href="http://localhost:8080/web222/home/product/12" style="text-decoration: none;">
              <div class="category-img">
                <img src="../../../web222/public/assets/img/products/12.png" alt="">
              </div>
              <h5 class="name">Dưa hoàng kim</h5>
            </a>
          </li>
        </div>
      </div>
    </div>
    <!-- ==============================CAC DIEM DAC BIET======================================== -->

    <div class="section-features">
      <div class="uk-section uk-container">
        <div class="sectionheader">
          <h2 class="sectiontitle">COOPFOOD CÓ GÌ ĐẶC BIỆT</h2>
          <p class="sectiondescription">
            Chúng tôi cung cấp các loại trái cây, rau củ tươi xanh, các loại thịt, thủy hải sản tươi ngon nhất.
          </p>
        </div>
        <div class="uk-grid uk-child-width-1-3@s data-uk-grid">
          <div>
            <div class="feature-item">
              <i class="bi bi-brightness-high"></i>
              <div class="feature-item__title">Sản phẩm sạch, an toàn</div>
              <div class="feature-item__desc">Sản phẩm của chúng tôi đạt được các chứng nhận của ISO, VietGAP br về độ an toàn.</div>
            </div>
          </div>
          <div>
            <div class="feature-item">
              <i class="bi bi-truck"></i>
              <div class="feature-item__title">Đặt hàng tiện lợi</div>
              <div class="feature-item__desc">Đặt hàng trực tiếp trên website hoặc gọi tới hotline.</div>
            </div>
          </div>
          <div>
            <div class="feature-item">
              <i class="bi bi-award"></i>
              <div class="feature-item__title">Chuỗi cửa hàng</div>
              <div class="feature-item__desc">COOPFOOD có khoảng 400 cửa hàng trải rộng khắp Thành phố Hồ Chí Minh.</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ==============================DANH GIA KHACH HANG=========================== -->
    <div class="section-features">
      <div style="text-align: center; margin-top :10px;padding-top:50px;">
        <h2 class="sectiontitle">ĐÁNH GIÁ CỦA KHÁCH HÀNG</h2>
      </div>
      <div class="uk-container">
        <div class="uk-grid uk-child-width-1-3@s" data-uk-grid style="text-align: center; padding-top:30px;padding-bottom:50px">
          <div>
            <img src="../../../web222/public/assets/img/pages/home/customer2.png" alt="">
            <p style="color: #56B280">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </p>
            <h5 style="margin-bottom: 0%; margin-top: 10px;">Anh Lê Minh Khiêm</h5>
            <em style="color: #56B280">23 tuổi, đến từ quận Thủ Đức, TP.HCM</em>
            <div style="margin-top: 10px;">"Mua hàng online rất tiện lợi và nhanh chóng"</div>
          </div>

          <div>
            <img src="../../../web222/public/assets/img/pages/home/customer1.png" alt="">
            <p style="color: #56B280">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </p>
            <h5 style="margin-bottom: 0%; margin-top: 10px;">Chị Lý Nhã Kỳ</h5>
            <em style="color: #56B280">30 tuổi, đến từ quận Bình Thạnh, TP.HCM</em>
            <div style="margin-top: 10px;">"Trái cây rất tươi ngon"</div>
          </div>
          <div>
            <div>
              <img src="../../../web222/public/assets/img/pages/home/customer3.png" alt="">
              <p style="color: #56B280">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </p>
              <h5 style="margin-bottom: 0%; margin-top: 10px;">Anh Trịnh Tiến Đạt</h5>
              <em style="color: #56B280">25 tuổi, đến từ quận 9, TP.HCM</em>
              <div style="margin-top: 10px;">"Giá cả hợp lí. Giao hàng nhanh"</div>
            </div>

          </div>
        </div>
      </div>






  </main>
  <?php require_once './mvc/views/' . $data['footer'] . '.php'; ?>
</div>