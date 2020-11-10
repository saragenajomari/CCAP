<script>
    $(document).ready(function(){  

        $(".sell_div").hide();
        $(".looking_div").hide();

        $(".sell").click(function(event){
           $(".sell_div").toggle('slow');
           $( "#car-span" ).attr( "class", "glyphicon glyphicon-chevron-down" );
           event.preventDefault();
        })

        $(".looking").click(function(event){
           $(".looking_div").toggle('slow');
           $( "#part-span" ).attr( "class", "glyphicon glyphicon-chevron-down" );
           event.preventDefault();
        })  
           
    });

</script>
<?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success" style="margin-left: 20%">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
<div class="content-edit" id="content-edit"  style="padding-bottom: 35%">
    <h1 style="margin-left:5em; ">Edit Details</h1> 
    <div class="col-sm-8">
        <?php 
        echo form_open_multipart('dbProcess/alter_product');
        foreach($item_details as $data_item){
        ?>
        <div class="form-group col-sm-6">
          <label for="usr">Make:</label>
          <select class="form-control" id="mk" name="mk">
            <option value="Acura" <?php if($data_item->make == 'ACURA'){ echo 'selected'; }?>>Acura</option>
            <option value="Alfa Romero" <?php if($data_item->make == 'ALFA ROMERO'){ echo 'selected'; }?>>Alfa Romero</option>
            <option value="Aston Martin" <?php if($data_item->make == 'ASTON MARTIN'){ echo 'selected'; }?>>Aston Martin</option>
            <option value="Audi" <?php if($data_item->make == 'AUDI'){ echo 'selected'; }?>>Audi</option>
            <option value="Bentley" <?php if($data_item->make == 'BENTLEY'){ echo 'selected'; }?>>Bentley</option>
            <option value="BMW" <?php if($data_item->make == 'BMW'){ echo 'selected'; }?>>BMW</option>
            <option value="Buick" <?php if($data_item->make == 'BUICK'){ echo 'selected'; }?>>Buick</option>
            <option value="Cadillac" <?php if($data_item->make == 'CADILLAC'){ echo 'selected'; }?>>Cadillac</option>
            <option value="Chevrolet" <?php if($data_item->make == 'CHEVROLET'){ echo 'selected'; }?>>Chevrolet</option>
            <option value="Chrysler" <?php if($data_item->make == 'CHRYSLER'){ echo 'selected'; }?>>Chrysler</option>
            <option value="Daewoo" <?php if($data_item->make == 'DAEWOO'){ echo 'selected'; }?>>Daewoo</option>
            <option value="Dodge" <?php if($data_item->make == 'DODGE'){ echo 'selected'; }?>>Dodge</option>
            <option value="Ferarri" <?php if($data_item->make == 'FERARRI'){ echo 'selected'; }?>>Ferarri</option>
            <option value="FIAT" <?php if($data_item->make == 'FIAT'){ echo 'selected'; }?>>FIAT</option>
            <option value="Fisker" <?php if($data_item->make == 'FISKER'){ echo 'selected'; }?>>Fisker</option>
            <option value="Ford" <?php if($data_item->make == 'FORD'){ echo 'selected'; }?>>Ford</option>
            <option value="Freightliner" <?php if($data_item->make == 'FREIGHTLINER'){ echo 'selected'; }?>>Freightliner Light Duty</option>
            <option value="Genesis" <?php if($data_item->make == 'GENESIS'){ echo 'selected'; }?>>Genesis</option>
            <option value="GMC" <?php if($data_item->make == 'GMC'){ echo 'selected'; }?>>GMC</option>
            <option value="Honda" <?php if($data_item->make == 'HONDA'){ echo 'selected'; }?>>Honda</option>
            <option value="Hummer" <?php if($data_item->make == 'HUMMER'){ echo 'selected'; }?>>Hummer</option>
            <option value="Hyundai" <?php if($data_item->make == 'HYUNDAI'){ echo 'selected'; }?>>Hyundai</option>
            <option value="INFINITI" <?php if($data_item->make == 'INFINITI'){ echo 'selected'; }?>>INFINITI</option>
            <option value="Isuzu" <?php if($data_item->make == 'ISUZU'){ echo 'selected'; }?>>Isuzu</option>
            <option value="Jaguar" <?php if($data_item->make == 'JAGUAR'){ echo 'selected'; }?>>Jaguar</option>
            <option value="Jeep" <?php if($data_item->make == 'JEEP'){ echo 'selected'; }?>>Jeep</option>
            <option value="Karma Automotive" <?php if($data_item->make == 'KARMA AUTOMOTIVE'){ echo 'selected'; }?>>Karma Automotive</option>
            <option value="Kia" <?php if($data_item->make == 'KIA'){ echo 'selected'; }?>>Kia</option>
            <option value="Lamborghini" <?php if($data_item->make == 'LAMBORGHINI'){ echo 'selected'; }?>>Lamborghini</option>
            <option value="Land Rover" <?php if($data_item->make == 'LAND ROVER'){ echo 'selected'; }?>>Land Rover</option>
            <option value="Lexus" <?php if($data_item->make == 'LEXUS'){ echo 'selected'; }?>>Lexus</option>
            <option value="Lincoln" <?php if($data_item->make == 'LINCOLN'){ echo 'selected'; }?>>Lincoln</option>
            <option value="Lotus" <?php if($data_item->make == 'LOTUS'){ echo 'selected'; }?>>Lotus</option>
            <option value="Maserati" <?php if($data_item->make == 'MASERATI'){ echo 'selected'; }?>>Maserati</option>
            <option value="Maybach" <?php if($data_item->make == 'MAYBACH'){ echo 'selected'; }?>>Maybach</option>
            <option value="Mazda" <?php if($data_item->make == 'MAZDA'){ echo 'selected'; }?>>Mazda</option>
            <option value="McLaren" <?php if($data_item->make == 'MCLAREN'){ echo 'selected'; }?>>McLaren</option>
            <option value="Mercedes-Benz" <?php if($data_item->make == 'MERCEDES-BENZ'){ echo 'selected'; }?>>Mercedes-Benz</option>
            <option value="Mercury" <?php if($data_item->make == 'MERCURY'){ echo 'selected'; }?>>Mercury</option>
            <option value="MINI" <?php if($data_item->make == 'MINI'){ echo 'selected'; }?>>MINI</option>
            <option value="Mitsubishi" <?php if($data_item->make == 'MITSUBISHI'){ echo 'selected'; }?>>Mitsubishi</option>
            <option value="Nissan" <?php if($data_item->make == 'NISSAN'){ echo 'selected'; }?>>Nissan</option>
            <option value="Oldsmobile" <?php if($data_item->make == 'OLDSMOBILE'){ echo 'selected'; }?>>Oldsmobile</option>
            <option value="Panoz" <?php if($data_item->make == 'PANOZ'){ echo 'selected'; }?>>Panoz</option>
            <option value="Plymouth" <?php if($data_item->make == 'PLYMOUTH'){ echo 'selected'; }?>>Plymouth</option>
            <option value="Pontiac" <?php if($data_item->make == 'PONTIAC'){ echo 'selected'; }?>>Pontiac</option>
            <option value="Porsche" <?php if($data_item->make == 'PORSCHE'){ echo 'selected'; }?>>Porsche</option>
            <option value="Ram Truck" <?php if($data_item->make == 'RAM TRUCK'){ echo 'selected'; }?>>Ram Truck</option>
            <option value="Rolls-Royce" <?php if($data_item->make == 'ROLLS-ROYCE'){ echo 'selected'; }?>>Rolls-Royce</option>
            <option value="Saab" <?php if($data_item->make == 'SAAB'){ echo 'selected'; }?>>Saab</option>
            <option value="Saturn" <?php if($data_item->make == 'SATURN'){ echo 'selected'; }?>>Saturn</option>
            <option value="Scion" <?php if($data_item->make == 'SCION'){ echo 'selected'; }?>>Scion</option>
            <option value="Smart" <?php if($data_item->make == 'SMART'){ echo 'selected'; }?>>Smart</option>
            <option value="Subaru" <?php if($data_item->make == 'SUBARU'){ echo 'selected'; }?>>Subaru</option>
            <option value="Suzuki" <?php if($data_item->make == 'SUZUKI'){ echo 'selected'; }?>>Suzuki</option>
            <option value="Tesla Motors" <?php if($data_item->make == 'TESLA MOTORS'){ echo 'selected'; }?>>Tesla Motors</option>
            <option value="Toyota" <?php if($data_item->make == 'TOYOTA'){ echo 'selected'; }?>>Toyota</option>
            <option value="Volkswagen" <?php if($data_item->make == 'VOLKSWAGEN'){ echo 'selected'; }?>>Volkswagen</option>
            <option value="Volvo" <?php if($data_item->make == 'VOLVO'){ echo 'selected'; }?>>Volvo</option>
          </select>
        </div>
        <div class="form-group col-sm-6">
          <label for="usr">Model:</label>
          <input type="text" class="form-control" id="mod" name="mod" pattern="[A-Za-z0-9]+"  required value="<?php echo $data_item->model; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Price:</label>
          <input type="number" class="form-control" id="pr" name="pr" min="1" required value="<?php echo $data_item->price; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Year:</label>
          <input type="number" class="form-control" id="yr" name="yr" min="1990" max="2018" required step="1" value="<?php echo $data_item->year; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Transmission:</label>
          <select  class="form-control" id="tr" name="tr" value="<?php echo $data_item->transmission; ?>">
            <option value="AT" <?php if($data_item->transmission == 'AT'){ echo 'selected'; }?>>Automatic</option>
            <option value="MT" <?php if($data_item->transmission == 'MT'){ echo 'selected'; }?>>Manual </option>
            <option value="CVT" <?php if($data_item->transmission == 'CVT'){ echo 'selected'; }?>>CVT </option>
        </select>
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Seating Capacity:</label>
          <input type="number" class="form-control" id="seat" name="seat" min="1" max="20" required numeric value="<?php echo $data_item->seating_capacity; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Color:</label>
          <input type="text" class="form-control" id="clr" name="clr" pattern="[A-Za-z]+" required value="<?php echo $data_item->color; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Mileage:</label>
          <input type="number" class="form-control" id="miles" min="1" required name="miles" value="<?php echo $data_item->mileage; ?>" required>
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Body Style:</label>
          <input type="text" class="form-control" id="bodstyle" name="bodstyle" pattern="[A-Za-z]+" required value="<?php echo $data_item->bodystyle; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Cylinder Engine:</label>
          <input type="text" class="form-control" id="cengine" name="cengine" required value="<?php echo $data_item->cylinder_engine; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Door:</label>
          <input type="text" class="form-control" id="dr" name="dr" required value="<?php echo $data_item->door; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Drive Type:</label>
          <select  class="form-control" id="drive" name="drive">
            <option value="AWD" <?php if($data_item->drive_type == 'AWD'){ echo 'selected'; }?>>AWD</option>
            <option value="4WD" <?php if($data_item->drive_type == '4WD'){ echo 'selected'; }?>>4WD</option>
            <option value="FWD" <?php if($data_item->drive_type == 'FWD'){ echo 'selected'; }?>>FWD</option>
            <option value="RWD" <?php if($data_item->drive_type == 'RWD'){ echo 'selected'; }?>>RWD</option>
          </select>
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Fuel Type:</label>
          <select  class="form-control" id="fuel" name="fuel">
            <option value="Gasoline" <?php if($data_item->fuel_type == 'Gasoline'){ echo 'selected'; }?>>Gasoline</option>
            <option value="Diesel" <?php if($data_item->fuel_type == 'Diesel'){ echo 'selected'; }?>>Diesel</option>
            <option value="Petrol" <?php if($data_item->fuel_type == 'Petrol'){ echo 'selected'; }?>>Petrol</option>
            <option value="LPG" <?php if($data_item->fuel_type == 'LPG'){ echo 'selected'; }?>>LPG</option>
            <option value="Ethanol" <?php if($data_item->fuel_type == 'Ethanol'){ echo 'selected'; }?>>Ethanol</option>
            <option value="Bio-diesel" <?php if($data_item->fuel_type == 'Bio-diesel'){ echo 'selected'; }?>>Bio-diesel</option>
            <option value="Electric" <?php if($data_item->fuel_type == 'Electric'){ echo 'selected'; }?>>Electric</option>
          </select>
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Note:</label>
          <input type="text" class="form-control" id="nt" name="nt" value="<?php echo $data_item->note; ?>">
        </div> 
        <div class="form-group col-sm-6">
          <label for="pwd">Reason For Selling:</label>
          <input type="text" class="form-control" id="reason" name="reason" value="<?php echo $data_item->rfs; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="pwd">Update Car Details On:</label>
          <input type="date" class="form-control" id="dt" name="dt" value="<?php echo $data_item->update_car_on; ?>" required>
        </div>
        <div>
          <div class="row"> 
            <div class="col-sm-2" style="margin-left: 10%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img-edit1" src="<?php echo base_url()."uploads/cars/".$data_item->pictureOne; ?>">
              <input type="file" id="carpic1" name="pic1">
              <input type="hidden" name="old1" value="<?php echo base_url()."uploads/cars/".$data_item->pictureOne; ?>">
            </div>
            <div class="col-sm-2" style="margin-left: 10%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img-edit2" src="<?php echo base_url()."uploads/cars/".$data_item->pictureTwo; ?>">
              <input type="file" id="carpic2" name="pic2">
              <input type="hidden" name="old2" value="<?php echo base_url()."uploads/cars/".$data_item->pictureTwo; ?>">
            </div>
            <div class="col-sm-2" style="margin-left: 10%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img-edit3" src="<?php echo base_url()."uploads/cars/".$data_item->pictureThree; ?>">
              <input type="file" id="carpic3" name="pic3">
              <input type="hidden" name="old3" value="<?php echo base_url()."uploads/cars/".$data_item->pictureThree; ?>">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-2" style="margin-left: 20%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img-edit4" src="<?php echo base_url()."uploads/cars/".$data_item->pictureFour; ?>">
              <input type="file" id="carpic4" name="pic4">
              <input type="hidden" name="old4" value="<?php echo base_url()."uploads/cars/".$data_item->pictureFour; ?>">
            </div>
            <div class="col-sm-2" style="margin-left: 10%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img-edit5" src="<?php echo base_url()."uploads/cars/".$data_item->pictureFive; ?>">
              <input type="file" id="carpic5" name="pic5">
              <input type="hidden" name="old5" value="<?php echo base_url()."uploads/cars/".$data_item->pictureFive; ?>">
            </div>
          </div>
        </div>
        <br>
        <hr>
        <input type="hidden" name="carId" id="carId" value="<?php echo $data_item->sellcar_id; ?>">
        <input style="margin-left:1em;" onclick="up('success')" type="submit" class="btn btn-primary" name="upload" value="Update Car">
        <?php 
        }
        echo form_close();
        ?>
    </div>
</div>


