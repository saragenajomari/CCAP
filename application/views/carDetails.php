

<li><a style="color: #ff5500; font-weight:bold;" href="javascript:history.go(-1)"><i class="fa fa-arrow-circle-left"></i>  BACK TO LAST PAGE </a></li>
<?php foreach($item_details as $data_item_details){ ?>
<div class="frame_one col-xs-5 col-lg-5" id="frame_one"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item item_det active">
        <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'uploads/cars/'.$data_item_details->pictureOne; ?>" alt="">
      </div>

      <div class="item item_det">
        <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'uploads/cars/'.$data_item_details->pictureTwo; ?>" alt="">
      </div>
    
      <div class="item item_det">
        <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'uploads/cars/'.$data_item_details->pictureThree; ?>" alt="">
      </div>

      <div class="item item_det">
        <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'uploads/cars/'.$data_item_details->pictureFour; ?>" alt="">
      </div>

      <div class="item item_det">
        <img style="width:40em; height:25em;" class="item_img" id="item_img" src="<?php echo base_url().'uploads/cars/'.$data_item_details->pictureFive; ?>" alt="" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="frame_two" id="frame_two">
<h3><?php echo $data_item_details->year.' '.$data_item_details->make.' '.$data_item_details->model; ?></h3>
    <p class="date_post">Date Posted: <?php echo $data_item_details->post_date; ?></p>
    <div>
    <h2 class="item_price" id="item_price"><span style="font-size:42px;">&#8369;</span> <?php echo number_format($data_item_details->price, 2); ?></h2>
    <div class="star-ratings">
 
</div>
    <div class="seller_det">
    <h4><strong>Seller Details</strong></h4>  
    <?php foreach($seller_details as $data_item_seller_details){ 
      echo '<img class="user_img" id="user_img" src="'.base_url().'assets/img/user.png"></img>';
      echo '<div class="seller_name">';
      echo '<h4 class="seller">'.$data_item_seller_details->fname.' '.$data_item_seller_details->lname.'</h4>';
      echo '<p class="seller">'.$data_item_seller_details->address.'</p>';
      echo '</div>';
      echo '<div class="seller_contact">';
      echo '<strong>Contact Seller: <br><br></strong>';
      echo '<p class="contact"><span class="glyphicon glyphicon-phone glyphy"></span> '.$data_item_seller_details->contact.'</p> ';
      echo '<p class="contact_two"><span class="glyphicon glyphicon-envelope glyphy"></span> '.$data_item_seller_details->email.'</p> ';
      echo '</div>';
    } ?>
    </div>
  </div>
</div>

<div class="container frame_three" id="frame_three">
<div class="table-users">        
<div class="header-table">Item Specifications for <?php echo $data_item_details->make.' '.$data_item_details->model; ?></div>
  <table cellspacing="0">
    <tbody>
      <tr>
        <td><img src="<?php echo base_url()."icons/price-tag.png" ?>"> &nbsp;Price</td>
        <td><?php echo '<span style="font-size:17px;">&#8369;</span> '.number_format($data_item_details->price, 2) ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/wand.png" ?>"> &nbsp;Model</td>
        <td><?php echo $data_item_details->model; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/head.png" ?>"> &nbsp;Make</td>
        <td><?php echo $data_item_details->make; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/appointment.png" ?>"> &nbsp;Year</td>
        <td><?php echo $data_item_details->year; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/gearbox.png" ?>"> &nbsp;Transmission</td>
        <td><?php if($data_item_details->transmission=='AT'){ echo 'Automatic'; }else{ echo 'Manual'; } ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/gasoline-pump.png" ?>"> &nbsp;Fuel Type</td>
        <td><?php echo $data_item_details->fuel_type; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/hatchback.png" ?>"> &nbsp;Body Style</td>
        <td><?php echo $data_item_details->bodystyle; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/seat-belt.png" ?>"> &nbsp;Seating Capacity</td>
        <td><?php echo $data_item_details->seating_capacity; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/crayon.png" ?>"> &nbsp;Color</td>
        <td><?php echo $data_item_details->color; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/engine.png" ?>"> &nbsp;Cylinder Engine</td>
        <td><?php echo $data_item_details->cylinder_engine; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/car.png" ?>"> &nbsp;Door</td>
        <td><?php echo $data_item_details->door; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/chassis.png" ?>"> &nbsp;Drive Type</td>
        <td><?php echo $data_item_details->drive_type; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/dashboard.png" ?>"> &nbsp;Mileage</td>
        <td><?php echo $data_item_details->mileage; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/recommendation.png" ?>"> &nbsp;Remarks</td>
        <td><?php echo $data_item_details->note; ?></td>
      </tr>
      <tr>
        <td><img src="<?php echo base_url()."icons/notepad.png" ?>"> &nbsp;Reason for Selling</td>
        <td><?php echo $data_item_details->rfs; ?></td>
    </tbody>
  </table>
</div>
</div>
</div>


<div class='container container_rating'>
  <h4>Rate This Product: <h4>
  <form method="post">  
  <input type="hidden" name="id" id="id" value="<?php echo $data_item_details->sellcar_id; ?>">
  <input type="hidden" name="user" id="user" value="<?php if(isset($_SESSION['uid'])){echo $_SESSION['fname'].''.$_SESSION['lname'];}else{echo 'Anonymous';} ?>">
  <div class="ratings">
    <input type="radio" name="star" id="rating" value="1" /> 
    <input type="radio" name="star" id="rating" value="2"/> 
    <input type="radio" name="star" id="rating" value="3"/> 
    <input type="radio" name="star" id="rating" value="4"/> 
    <input type="radio" name="star" id="rating" value="5"/>  
  </div></br>
  <span class="info"></span>
  <div class="form-group">
  <h4>Comment:</h4>
  <textarea class="form-control" style="width:79em;" rows="5" id="comment" name="comment"></textarea>
</div>
<input class="submit btn btn-success" id="submit" type="submit" name="Submit Rating">
</form>
<?php 
}
if(!empty($rate_ave)&&!empty($rate_count)){
?>
 <div style="margin-left:-4em;" class="container">
        <div class="review-rating">
            <div class="left-review">
            <div class="review-title"><?php foreach ($rate_ave as $data_rate_ave){ echo round($data_rate_ave->rating,1); ?></div>
                <div class="review-star">
                    <span class="<?php if($data_rate_ave->rating >= 1.0){echo 'fa fa-star';} ?>"></span>
                    <span class="<?php if($data_rate_ave->rating >= 2.0){echo 'fa fa-star';}elseif($data_rate_ave->rating < 2.0 && $data_rate_ave->rating > 1.0){echo 'fa fa-star-half-o';}elseif($data_rate_ave->rating <= 1.0){echo 'fa fa-star-o';} ?>"></span>
                    <span class="<?php if($data_rate_ave->rating >= 3.0){echo 'fa fa-star';}elseif($data_rate_ave->rating < 3.0 && $data_rate_ave->rating > 2.0){echo 'fa fa-star-half-o';}elseif($data_rate_ave->rating <= 2.0){echo 'fa fa-star-o';} ?>"></span>
                    <span class="<?php if($data_rate_ave->rating >= 4.0){echo 'fa fa-star';}elseif($data_rate_ave->rating < 4.0 && $data_rate_ave->rating > 3.0){echo 'fa fa-star-half-o';}elseif($data_rate_ave->rating <= 3.0){echo 'fa fa-star-o';} ?>"></span>
                    <span class="<?php if($data_rate_ave->rating >= 5.0){echo 'fa fa-star';}elseif($data_rate_ave->rating < 5.0 && $data_rate_ave->rating > 4.0){echo 'fa fa-star-half-o';}elseif($data_rate_ave->rating <= 4.0){echo 'fa fa-star-o';} ?>"></span>
                </div>
              <?php } ?>
                <div class="review-people"><i class="fa fa-user"></i> <?php echo $rate_count; ?></div>
            </div>
            <div class="right-review">
                <div class="row-bar">
                    <div class="left-bar">5</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-5" style="<?php echo 'width:'.$rate_count_five.'%;'; ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">4</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-4" style="<?php echo 'width:'.$rate_count_four.'%;'; ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">3</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-3" style="<?php echo 'width:'.$rate_count_three.'%;'; ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">2</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-2" style="<?php echo 'width:'.$rate_count_two.'%;'; ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row-bar">
                    <div class="left-bar">1</div>
                    <div class="right-bar">
                        <div class="bar-container">
                            <div class="bar-1" style="<?php echo 'width:'.$rate_count_one.'%;';?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

<script type="text/javascript">
var rate=0;
  
  $('.ratings').rating(function(vote,event){
     rate = vote;
  })

  $('#submit').click(function(e) {
    e.preventDefault();
    if (rate != 0) {
      var info = $('#comment').val();
      var id = $('#id').val();
      var user = $('#user').val();

      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/dbProcess/add_rating",
        data: {comment:info,vote:rate,id:id,user:user},
        success: function(data){
          alert('Review Succesfully Added');
          location.reload();
        }
      }); 
    }
  });

</script>


