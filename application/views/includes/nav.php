<script>
$(document).ready(function() {
  $( "#modalTrigger" ).click(function() {
    $( "#partsForm" ).hide();
  });
  $( "#carBtn" ).click(function() {
    $( "#partsForm" ).hide();
    $( "#carForm" ).show();
  });
  $( "#partsBtn" ).click(function() {
    $( "#partsForm" ).show();
    $( "#carForm" ).hide();
  });
});
</script>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('pages/index'); ?>"><img style="margin-top:-53pt; padding:0; width:80%; " src="<?php echo base_url(); ?>assets/img/logo.png"></img></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <!-- -->
      <ul class="nav navbar-nav navbar-left">
        
      </ul>
      <ul class="nav navbar-nav navbar-right"> 
      <?php
      if(!isset($_SESSION['type'])){
            echo '<li><a href="'.site_url('pages/index').'"><i class="fa fa-home"></i>    Home</a></li>
                  <li><a href="'.site_url('pages/home').'"><i class="fa fa-car"></i>  Products</a></li>';
      }
      ?>
        <?php 
        if(isset($_SESSION['type'])){
          if($_SESSION['type']=='admin'){
            echo '<li><a href="'.site_url('pages/dashboard_admin').'"><i class="fa fa-cubes"></i>  My Dashboard</a></li>
                <li><a href="'.site_url('pages/seller_list').'" data-target="" data-toggle="modal" id="modalTrigger"><i class="fa fa-users"></i>  Sellers List</a></li>';
          }elseif($_SESSION['type']=='seller'){
            echo '<li><a href="'.site_url('pages/dashboard_seller').'"><i class="fa fa-cubes"></i>  My Dashboard</a></li>';
          }
        }    
        ?>
        <?php if(isset($_SESSION['type'])){
                if($_SESSION['type'] == 'seller'){
                  echo '<li><a href="#" data-target="#exampleModal" data-toggle="modal" id="modalTrigger"><i class="fa fa-usd"></i>  Sell My Products</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Outdated List <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li ><a href="'.site_url('pages/outdated_cars').'"><span class="glyphicon glyphicon-bed" aria-hidden="true"></span> Cars</a></li>
                            <li class="divider"></li>
                            <li><a href="'.site_url('pages/outdated_parts').'"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Car Parts/Accessories</a></li>
                          </ul>
                        </li>
                        ';
                }
              }
        ?>
        <?php if(isset($_SESSION['fname'])){
          echo '
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Welcome '.$_SESSION['fname'].' <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="'.site_url('pages/account_edit').'"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit Account</a></li>
            <li class="divider"></li>
            <li><a href="'.site_url('dbProcess/logout').'"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
        </li>
          ';
         }else{
           echo '<li><a href="'.site_url('pages/login').'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li>';
         } 
         ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
</div-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div style="padding:0pt;" class="modal-header">
        <nav style="margin-bottom:0pt;" class="navbar">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li style="border-right: 1px solid  #e6e6e6;" class="active" class="modal-title" id="carBtn"><a style="color: black; font-weight:bold;" href="#"><i class="fa fa-car"></i> CARS</a></li>
              <li style="border-right: 1px solid  #e6e6e6;" class="modal-title" id="partsBtn"><a style="color: black; font-weight:bold;" href="#"><i class="fa fa-cogs"></i> PARTS</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <!--second body-->
      <div class="modal-body" id="carForm">
      <?php echo form_open_multipart('dbProcess/add_product');?>
        <div class="form-group col-sm-4">
          <label for="usr">Make:</label>
          <select class="form-control" id="make" name="make">
            <option value="Acura">Acura</option>
            <option value="Alfa Romero">Alfa Romero</option>
            <option value="Aston Martin">Aston Martin</option>
            <option value="Audi">Audi</option>
            <option value="Bentley">Bentley</option>
            <option value="BMW">BMW</option>
            <option value="Buick">Buick</option>
            <option value="Cadillac">Cadillac</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Chrysler">Chrysler</option>
            <option value="Daewoo">Daewoo</option>
            <option value="Dodge">Dodge</option>
            <option value="Ferarri">Ferarri</option>
            <option value="FIAT">FIAT</option>
            <option value="Fisker">Fisker</option>
            <option value="Ford">Ford</option>
            <option value="Freightliner">Freightliner Light Duty</option>
            <option value="Genesis">Genesis</option>
            <option value="GMC">GMC</option>
            <option value="Honda">Honda</option>
            <option value="Hummer">Hummer</option>
            <option value="Hyundai">Hyundai</option>
            <option value="INFINITI">INFINITI</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Jaguar">Jaguar</option>
            <option value="Jeep">Jeep</option>
            <option value="Karma Automotive">Karma Automotive</option>
            <option value="Kia">Kia</option>
            <option value="Lamborghini">Lamborghini</option>
            <option value="Land Rover">Land Rover</option>
            <option value="Lexus">Lexus</option>
            <option value="Lincoln">Lincoln</option>
            <option value="Lotus">Lotus</option>
            <option value="Maserati">Maserati</option>
            <option value="Maybach">Maybach</option>
            <option value="Mazda">Mazda</option>
            <option value="McLaren">McLaren</option>
            <option value="Mercedes-Benz">Mercedes-Benz</option>
            <option value="Mercury">Mercury</option>
            <option value="MINI">MINI</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="Nissan">Nissan</option>
            <option value="Oldsmobile">Oldsmobile</option>
            <option value="Panoz">Panoz</option>
            <option value="Plymouth">Plymouth</option>
            <option value="Pontiac">Pontiac</option>
            <option value="Porsche">Porsche</option>
            <option value="Ram Truck">Ram Truck</option>
            <option value="Rolls-Royce">Rolls-Royce</option>
            <option value="Saab">Saab</option>
            <option value="Saturn">Saturn</option>
            <option value="Scion">Scion</option>
            <option value="Smart">Smart</option>
            <option value="Subaru">Subaru</option>
            <option value="Suzuki">Suzuki</option>
            <option value="Tesla Motors">Tesla Motors</option>
            <option value="Toyota">Toyota</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Volvo">Volvo</option>
          </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="usr">Model:</label>
          <input type="text" class="form-control" id="model" name="model" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Price (&#8369;):</label>
          <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Year:</label>
          <input type="number" class="form-control" id="year" name="year" min="1990" max="2018" step="1" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Transmission:</label>
          <select class="form-control" id="trans" name="trans">
            <option value="AT">Automatic</option>
            <option value="MT">Manual </option>
            <option value="CVT">CVT</option>
        </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Seating Capacity:</label>
          <input type="number" class="form-control" id="seatCap" name="seatCap" min="1" max="20" required numeric>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Color:</label>
          <input type="text" class="form-control" id="color" name="color" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Mileage:</label>
          <input type="number" class="form-control" id="mileage" name="mileage" required numeric>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Body Style:</label>
          <select class="form-control" id="bstyle" name="bstyle">
            <option value="SUV">SUV</option>
            <option value="Trucks">Trucks</option>
            <option value="Sedan">Sedan</option>
            <option value="Van">Van</option>
            <option value="Coupe">Coupe</option>
            <option value="Wagon">Wagon</option>
            <option value="Convertible">Convertible</option>
            <option value="Sports Car">Sports Car</option>
            <option value="Diesel">Diesel</option>
            <option value="Crossover">Crossover</option>
            <option value="Luxury Car">Luxury Car</option>
            <option value="Hybrid/Electic Car">Hybrid/Electic Car</option>
          </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Cylinder Engine:</label>
          <input type="text" class="form-control" id="cEngine" name="cEngine" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Number of Doors:</label> 
          <input type="number" class="form-control" id="door" name="door" min="1" max="5" required numeric>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Drive Type:</label>
          <select class="form-control" id="dType" name="dType">
            <option value="FWD">FWD</option>
            <option value="AWD">AWD</option>
            <option value="RWD">RWD</option>
            <option value="4WD">4WD</option>
          </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Fuel Type:</label>
          <select class="form-control" id="fuelType" name="fuelType"> 
            <option value="Gasoline">Gasoline</option>
            <option value="Diesel">Diesel</option>
            <option value="Petrol">Petrol</option>
            <option value="LPG">LPG</option>
            <option value="Ethanol">Ethanol</option>
            <option value="Bio-diesel">Bio-diesel</option>
            <option value="Electric">Electric</option>
          </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Update Car Details On:</label> 
          <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Note:</label>
          <input type="text" class="form-control" id="note" name="note" required>
        </div>
        <div class="form-group col-sm-12">
          <label for="pwd">Reason For Selling:</label>
          <input type="text" class="form-control" id="rfs" name="rfs" required>
        </div>
        <div class="form-group">
          <label for="pwd">Pictures:</label>
          <input type="file" class="form-control" id="userfile1" name="file1" required> 
          <input type="file" class="form-control" id="userfile2" name="file2" required>
          <input type="file" class="form-control" id="userfile3" name="file3" required>
          <input type="file" class="form-control" id="userfile4" name="file4" required>
          <input type="file" class="form-control" id="userfile5" name="file5" required>
        </div>
        <input type="submit" class="btn btn-primary" name="upload" value="Submit">
        <?php echo form_close(); ?>
      </div>
         <!--second body-->
      <div class=" modal-body" id="partsForm">
      <?php echo form_open_multipart('dbProcess/add_parts');?>
        <div class="form-group col-sm-4">
          <label for="usr">Brand:</label>
          <input type="text" class="form-control" id="brand" name="brand" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="usr">Color:</label>
          <input type="text" class="form-control" id="color" name="color" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Model Name:</label>
          <input type="text" class="form-control" id="model_name" name="model name" required>
        </div>
        <div class="form-group col-sm-3">
          <label for="pwd">Price:</label>
          <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group col-sm-5">
          <label for="pwd">Category:</label>
          <select  class="form-control" id="prodClass" name="prodCat">
            <option value="INTERNAL ACCESSORIES">Internal Accessories</option>
            <option value="EXTERNAL ACCESSORIES">External Accesories</option>
            <option value="PERFORMING PARTS">Performing Parts</option>
            <option value="AUTOMOTIVE LIGHTING">Automotive Lighting</option>
            <option value="WHEELS">Wheels</option>
            <option value="TIRES">Tires</option>
            <option value="AUDIO">Audio</option>
            <option value="ELECTRONICS">Electronics</option>
            <option value="REPAIR PARTS">Repair Parts</option>
            <option value="BODY PARTS">Body Parts</option>
            <option value="TOOL">Tools</option>
            <option value="GARAGE">Garage</option>
            <option value="CAMPER">Camper</option>
            <option value="OUTDOOR">Outdoor Recreation</option>
        </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Reason For Selling:</label>
          <input type="text" class="form-control" id="rfs" name="rfs" required>
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Note:</label>
          <input type="text" class="form-control" id="note" name="note" required>
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Update Part Details On:</label> 
          <input type="date" class="form-control" id="date1" name="date1" required>
        </div>
        <div class="form-group col-sm-12">
          <label for="comment">Description:</label>
          <textarea class="form-control" rows="5" id="desc"  name="desc" required></textarea>
        </div>
        <div class="form-group">
          <label for="pwd">Pictures:</label>
          <input type="file" class="form-control" id="userfile1" name="pfiles1" required>
          <input type="file" class="form-control" id="userfile2" name="pfiles2" required>
          <input type="file" class="form-control" id="userfile3" name="pfiles3" required>
        </div>
        <input type="submit" class="btn btn-primary " name="upload" value="Submit">
        <?php echo form_close(); ?>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
       </div>
    </div>
  </div>
</div>
</body>
</html>