<html>
<head>
<title>Cebu Cars and Parts</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="<?php echo base_url(); ?>assets/css/footer.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/landing.css" rel="stylesheet">
</head>
<!------ Include the above in your HEAD tag ---------->

<body>
<?php $this->load->view('includes/nav'); ?>
<section class="bg-blue text-white  pt-5 pb-4">
    <div class="container py-5">
	<div class="row">
		<div class="col-md-6">
		    <div class="row">
        		<div class="col-md-12">
        		    <h1>Find your</h1>
        		    <h1>Perfect Match</h1>
        		    <p>Get the best offers on cars or parts available in Cebu Cars and Pars.<br> Check out the latest posts.</p>
        		</div>
        	</div>
        	<div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="nav-tabContent">
                            <a href="<?php echo site_url('pages/home'); ?>"><button class="btn btn-danger">SEARCH FOR CARS</button></a>
                            <a href="<?php echo site_url('pages/home_parts'); ?>"><button class="btn btn-danger">SEARCH FOR PARTS</button></a>
                        </div>
                    </div>
                    
                </div>
		    </div>
		<div class="col-md-6">
		    <div id="myCarousel" class="carousel slide" data-ride="carousel">  
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item item_det active">
                    <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'img-landing/landing.png' ?>" alt="">
                  </div>

                  <div class="item item_det">
                    <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'img-landing/wheel.png' ?>" alt="">
                  </div>
                
                  <div class="item item_det">
                    <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'img-landing/engine.png' ?>" alt="">
                  </div>

                  <div class="item item_det">
                    <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'img-landing/battery.png' ?>" alt="">
                  </div>
            	</div>
            </div>
        </div>
</div>
</section>