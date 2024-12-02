
<!-- Start Imgslide -->

<style>
    .home-slide9 img {
        width: 100%; /* Đảm bảo ảnh chiếm hết chiều rộng của container */
        height: 400px; /* Đặt chiều cao cố định (thay đổi theo nhu cầu) */
        object-fit: cover; /* Cắt ảnh để giữ tỷ lệ đẹp */
    }
	.item-slide {
        position: relative;
        overflow: hidden; /* Đảm bảo ảnh không bị tràn */
        height: 400px; /* Chiều cao đồng nhất */
    }
	.logo h2 {
    color: white;
}

</style>



<div class="home-slide9 owl-carousel nav-style2 nav-center-center" data-items="1" data-nav="true" data-dots="false"
    data-loop="true" data-autoplay="true">
    <div class="item-slide">
        <img src="https://euluxury.vn/data/new/Gia_dong_ho_Rolex_nam_(14).jpg" alt="">
    </div>
    <div class="item-slide">
        <img src="https://lucerneluxe.com/wp-content/uploads/2023/07/20230329160045_680_banner_m.jpg" alt="">
    </div>
    <div class="item-slide">
        <img src="https://www.bobswatches.com/rolex-blog/wp-content/uploads/2021/02/Rolex_Submariner_116610_5D3_4341-Edit-1.jpg" alt="">
    </div>
</div>


<!-- End Imgslide -->

<?php include "views/menu/3hopcn.php"; ?>

<div class="container">
	<div class="margin-top-30">
		<div class="box-product-featured">
			<div class="box-head banner-opacity">
				<img src="https://i.pinimg.com/736x/7f/f8/a3/7ff8a3f3de038d29eea8087e56434543.jpg" alt="">
				<div class="inner">
					<h2 class="box-title">ĐỒNG HỒ XỨNG TẦM</h2>
					<a href="index.php?act=sanpham" class="box-link">MUA SẮM </a>
				</div>
			</div>
			<div class="box-content">
				<div class="box-content-inner">
					<ul class="box-product-list owl-carousel nav-style2 nav-center-outside" data-nav="true"
						data-dots="false" data-margin="30" data-loop="true"
						data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
						<?php foreach ($sanphamShop as $sanpham):
							extract($sanpham);

							$hinh = "../upload_file/" . $img;
							$linksp = "index.php?act=chitietsp&id=" . $id;
							?>
							<li class="product-item style2">
								<div class="product-inner">
									<form action="index.php?act=addgiohang" method="post">
										<div class="product-thumb has-back-image">
											<input type="hidden" name="id" value="<?= $id ?>">

											<input type="hidden" name="img" value="<?= $img ?>">
											<a href="<?= $linksp ?>"><img src="<?= $hinh ?>" alt=""></a>

										</div>
										<div class="product-info">
											<input type="hidden" name="tensp" value="<?= $tensp ?>">
											<h3 class="product-name"><a href="#">
													<?= $tensp ?>
												</a></h3>

											<input type="hidden" name="soluong" value="1">

											<input type="hidden" name="giasp" value="<?= $giasp ?>">
											<span class="price">
												<ins>
													<?= $giasp ?> ₫
												</ins>
											</span>
											<input type="submit" name="addtocart" onclick="return confirmAddgh()"
												value="Thêm vào giỏ hàng">
										</div>
								</div>
								</form>
							</li>
						<?php endforeach; ?>

					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="margin-top-50">
		<div class="row">
			<div class="col-sm-12 col-md-5">
				<div class="section-title text-center margin-top-40 margin-bottom-30">
					<h3>DANH MỤC SẢN PHẨM</h3>
				</div>
			</div>
			<div class="col-sm-12 col-md-7">
				<ul class="category-menu category-carousel pull-left owl-carousel nav-style7 nav-center-center"
					data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30"
					data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
					<?php foreach ($listdanhmuc as $danhmuc):
						extract($danhmuc);
						$timdm = "index.php?act=timkiemdm&iddm=" . $id;
						?>
						<li>
							<a href="<?= $timdm ?>">
								<?= $tendm ?>
							</a>
						</li>
					<?php endforeach ?>
					<?php ?>
				</ul>
			</div>
		</div>
	</div>


	<div class="margin-top-50">
		<div class="box-product-featured right">
			<div class="box-head banner-opacity">
				<img src="https://i.pinimg.com/736x/55/c2/d2/55c2d20824f2380703cff745e228dd00.jpg" alt="">
				<div class="inner">
					<h2 class="box-title">ĐẲNG CẤP VĨNH CỬU</h2>
					<a href="index.php?act=sanpham" class="box-link">MUA SẮM</a>
				</div>
			</div>
			<div class="box-content">
				<div class="box-content-inner">
					<ul class="box-product-list owl-carousel owl-carousel nav-style2 nav-center-outside" data-nav="true"
						data-dots="false" data-margin="30" data-loop="true"
						data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>

						<?php
						 foreach ($sanphamtop5 as $sanpham):
							extract($sanpham);
							$linksp = "index.php?act=chitietsp&id=" . $id;
							$hinh = "../upload_file/" . $img;
							?>
							<li class="product-item style2">
								<div class="product-inner">
									<form action="index.php?act=addgiohang" method="post">
										<div class="product-thumb has-back-image">
											<input type="hidden" name="id" value="<?= $id ?>">
											<input type="hidden" name="img" value="<?= $img ?>">
											<a href="<?= $linksp ?>"><img src="<?= $hinh ?>" alt=""></a>

										</div>
										<div class="product-info">
											<input type="hidden" name="tensp" value="<?= $tensp ?>">
											<h3 class="product-name"><a href="#">
													<?= $tensp ?>
												</a></h3>

											<input type="hidden" name="soluong" value="1">

											<input type="hidden" name="giasp" value="<?= $giasp ?>">
											<span class="price">
												<ins>
													<?= $giasp ?> ₫
												</ins>
											</span>
											<input type="submit" name="addtocart" onclick="return confirmAddgh()"
												value="Thêm vào giỏ hàng">
										</div>
								</div>
								</form>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="margin-top-50">
		<div class="row">

			<div class="col-sm-12 col-md-7">
				<ul class="category-menu category-carousel pull-left owl-carousel nav-style7 nav-center-center"
					data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30"
					data-responsive='{"0":{"items":1},"600":{"items":4},"1000":{"items":4}}'>
					<?php foreach ($listsptheochatlieu as $sptheochatlieu):
						extract($sptheochatlieu);
						$timsptheochatlieu = "index.php?act=sptheochatlieu&id_sptheochatlieu=" . $id_chatlieu;
						?>
						<li>
							<a href="<?= $timsptheochatlieu ?>">
								<?= $ten_chatlieu ?>
							</a>
						<?php endforeach; ?>
						<?php ?>
				</ul>
			</div>
			<div class="col-sm-12 col-md-5">
				<div class="section-title text-center margin-top-40 margin-bottom-30">
					<h3>Sản phẩm theo chất liệu</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="margin-top-60">
		<div class="box-product-featured">
			<div class="box-head banner-opacity">
				<img src="https://i.pinimg.com/736x/29/09/e2/2909e29fce1bebe78a56e51dae64a5c7.jpg" alt="">
				<div class="inner">
					<h2 class="box-title">KHẲNG ĐỊNH ĐẲNG CẤP</h2>
					<a href="index.php?act=sanpham" class="box-link">MUA SẮM</a>
				</div>
			</div>
			<div class="box-content">
				<div class="box-content-inner">
					<ul class="box-product-list owl-carousel nav-style2 nav-center-outside" data-nav="true"
						data-dots="false" data-margin="30" data-loop="true"
						data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
						<?php foreach ($listsanpham as $sanpham):
							extract($sanpham);
							$linksp = "index.php?act=chitietsp&id=" . $id;
							$hinh = "../upload_file/" . $img;
							?>
							<li class="product-item style2">
								<div class="product-inner">
									<form action="index.php?act=addgiohang" method="post">
										<div class="product-thumb has-back-image">
											<input type="hidden" name="id" value="<?= $id ?>">

											<input type="hidden" name="img" value="<?= $img ?>">
											<a href="<?= $linksp ?>"><img src="<?= $hinh ?>" alt=""></a>

										</div>
										<div class="product-info">
											<input type="hidden" name="tensp" value="<?= $tensp ?>">
											<h3 class="product-name"><a href="#">
													<?= $tensp ?>
												</a></h3>

											<input type="hidden" name="soluong" value="1">

											<input type="hidden" name="giasp" value="<?= $giasp ?> ">
											<span class="price">
												<ins>
													<?= $giasp ?> ₫
												</ins>
											</span>
											<input type="submit" name="addtocart" onclick="return confirmAddgh()"
												value="Thêm vào giỏ hàng">
										</div>
								</div>
								</form>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="main-container no-slidebar">
		<div class="container">
			<div class="row">
				<div class="main-content col-sm-12">


				</div>
			</div>
		</div>
	</div>
	<script>
		function confirmAddgh() {
			if (confirm("Bạn thêm sản phẩm này vào giỏ hàng?")) {
				document.location = "index.php?act=addgiohang";
			} else {
				return false;
			}
		}
	</script>
</div>