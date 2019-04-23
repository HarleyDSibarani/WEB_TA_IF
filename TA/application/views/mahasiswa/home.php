<!DOCTYPE html>
<html lang="en">
<head>
<title>Landing Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/home/styles/responsive.css">

</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						
						<nav class="main_nav">
							<ul>
								<li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
								<li><a href="<?php echo base_url('home/Mahasiswa') ?>">Persyaratan</a></li>
								<li><a href="news.php">News</a></li>
								<li><a href="<?php echo base_url('login') ?>">Login</a></li>

								
							</ul>
						</nav>
						
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>	
	
	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?php echo base_url() ?>assets/home/images/iterabackground2.jpg)"></div>
					<div class="slide_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="slide_content">
										<div class="home_title">Website Informasi Tugas Akhir</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<br><br>
			<div class="col-md-3 ml-auto border border-secondary">
				<br>
				<aside class="sidebar">
					<div class="card border-primary mb-4">
					<div class="card-body">
						<h4 class="card-title">About</h4>
						<p class="card-text">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam <a href="#">
							semper libero</a>, sit amet adipiscing sem neque sed ipsum.
						</p>
					</div>
					</div>
				</aside>

				<aside class="sidebar sidebar-sticky">
					<div class="card border-primary mb-4">
					<div class="card-body">
						<h4 class="card-title">Tags</h4>
						<a class="btn btn-light btn-sm mb-1" href="page-category.html">Journey</a>
						<a class="btn btn-light btn-sm mb-1" href="page-category.html">Work</a>
						<a class="btn btn-light btn-sm mb-1" href="page-category.html">Lifestype</a>
						<a class="btn btn-light btn-sm mb-1" href="page-category.html">Photography</a>
						<a class="btn btn-light btn-sm mb-1" href="page-category.html">Food & Drinks</a>
					</div>
					</div><!-- /.card -->
					<div class="card border-primary mb-4">
					<div class="card-body">
						<h4 class="card-title">Popular stories</h4>

						<a href="post-image.html" class="d-inline-block">
							<h4 class="h6">The blind man</h4>
							<img class="card-img" src="img/articles/2.jpg" alt="" />
						</a>

						<time class="timeago" datetime="2017-10-03 20:00">3 october 2017</time> in Lifestyle

						<a href="post-image.html" class="d-inline-block mt-3">
							<h4 class="h6">Crying on the news</h4>
							<img class="card-img" src="img/articles/3.jpg" alt="" />
						</a>

						<time class="timeago" datetime="2017-07-16 20:00">16 july 2017</time> in Work
					</div>
					</div>
				</aside>
			</div>	
		</div>
	</div>
		

	
<br>
<br>

<div class="container border border-secondary" style="left: -15%" >
<br>
	<div class="row">
	<?php  $i=1; foreach($dosen as $dosen) { ?>
		<div class="col-3">
		
			<div class="card border-primary mb-3" style="max-width: 18rem;">
				<img class="card-img" width="60%" src="<?php echo base_url('./assets/upload/dosen/image/thumbs/'.$dosen->foto) ?>" alt="Card image cap">
				<a class="card-header text-primary text-center" href="<?php echo base_url('bimbingan/read/'.$dosen->id_dosen) ?>" ><?php echo $dosen->nama_dosen ?></a>
				<div class="card-body text-primary">
					<h3 class="card-title text-underline"><u>Keterangan : </u></h3>
					<h6 class="card-text fa-md text-center text-primary"><?php echo $dosen->nip ?></h6>
					<h6 class="card-text fa-md text-center text-primary"><?php echo $dosen->email ?></h6>
					<p class="card-text font-weight-bold text-center text-primary">Jumlah Beban Bimbingan : <?php echo $dosen->beban ?></p>
					<p class="card-text fa-md text-center text-primary"><?php echo $dosen->keterangan ?></p>																
				</div>
			</div>
			
		</div>
	<?php $i++; } ?> 
	</div>
</div>



	<!-- Footer -->
<br>
	<footer class="footer">
		<div class="footer_main">
			<div class="container">
				<div class="row">
					<p class="warna">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cumque eum, voluptatem eius perferendis rerum ullam optio officia natus voluptas possimus incidunt placeat fugiat quisquam voluptatibus unde ex perspiciatis. Dolore?</p>
				</div>
				<div class="row">
					<div class="col-lg-3 footer_col">
						
					</div>
					
				</div>
			</div>
		</div>
		
	</footer>


<script src="<?php echo base_url() ?>assets/home/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url() ?>assets/home/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/easing/easing.js"></script>
<script src="<?php echo base_url() ?>assets/home/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url() ?>assets/home/js/custom.js"></script>
<script src="<?php echo base_url() ?>assets/home/js/index.js"></script>
</body>
</html>