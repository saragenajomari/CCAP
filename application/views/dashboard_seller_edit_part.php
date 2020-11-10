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
<div class="content-edit" id="content-edit">
<?php echo form_open_multipart('dbProcess/alter_parts');
foreach($item_details as $data_item){
?>
<div class="col-sm-8">
        <div class="form-group col-sm-4">
          <label for="usr">Brand:</label>
          <input type="text" class="form-control" id="brand" name="brand" pattern="[A-Za-z]+" value="<?php echo $data_item->brand; ?>" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Model Name:</label>
          <input type="text" class="form-control" id="model_name" name="model name" pattern="[A-Za-z0-9]+" value="<?php echo $data_item->model_name; ?>" required>
        </div>
        <div class="form-group col-sm-2">
          <label for="usr">Color:</label>
          <input type="text" class="form-control" id="color" name="color" pattern="[A-Za-z]+" value="<?php echo $data_item->color; ?>" required>
        </div>
        <div class="form-group col-sm-2">
          <label for="pwd">Price:</label>
          <input type="number" class="form-control" id="price" name="price" min="1" value="<?php echo $data_item->price_range; ?>" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Category:</label>
          <select  class="form-control" id="prodClass" name="prodCat">
            <option value="INTERNAL ACCESSORIES" <?php if($data_item->parts_category == 'INTERNAL ACCESSORIES'){ echo 'selected';} ?>>Internal Accessories</option>
            <option value="EXTERNAL ACCESSORIES" <?php if($data_item->parts_category == 'EXTERNAL ACCESSORIES'){ echo 'selected';} ?>>External Accesories</option>
            <option value="PERFORMING PARTS" <?php if($data_item->parts_category == 'PERFORMING PARTS'){ echo 'selected';} ?>>Performing Parts</option>
            <option value="AUTOMOTIVE LIGHTING" <?php if($data_item->parts_category == 'AUTOMOTIVE LIGHTING'){ echo 'selected';} ?>>Automotive Lighting</option>
            <option value="WHEELS" <?php if($data_item->parts_category == 'WHEELS'){ echo 'selected';} ?>>Wheels</option>
            <option value="TIRES" <?php if($data_item->parts_category == 'TIRES'){ echo 'selected';} ?>>Tires</option>
            <option value="AUDIO" <?php if($data_item->parts_category == 'AUDIO'){ echo 'selected';} ?>>Audio</option>
            <option value="ELECTRONICS" <?php if($data_item->parts_category == 'ELECTRONICS'){ echo 'selected';} ?>>Electronics</option>
            <option value="REPAIR PARTS" <?php if($data_item->parts_category == 'REPAIR PARTS'){ echo 'selected';} ?>>Repair Parts</option>
            <option value="BODY PARTS" <?php if($data_item->parts_category == 'BODY PARTS'){ echo 'selected';} ?>>Body Parts</option>
            <option value="TOOL" <?php if($data_item->parts_category == 'TOOL'){ echo 'selected';} ?>>Tools</option>
            <option value="GARAGE" <?php if($data_item->parts_category == 'GARAGE'){ echo 'selected';} ?>>Garage</option>
            <option value="CAMPER" <?php if($data_item->parts_category == 'CAMPER'){ echo 'selected';} ?>>Camper</option>
            <option value="OUTDOOR" <?php if($data_item->parts_category == 'OUTDOOR'){ echo 'selected';} ?>>Outdoor Recreation</option>
        </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Reason For Selling:</label>
          <input type="text" class="form-control" id="rfs" name="rfs" value="<?php echo $data_item->rfs; ?>" required>
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Update Car Details On:</label>
          <input type="date" class="form-control" id="dtp" name="dtp" value="<?php echo $data_item->update_part_on; ?>" required>
        </div>
        <div class="form-group col-sm-12">
          <label for="pwd">Note:</label>
          <input type="text" class="form-control" id="note" name="note" value="<?php echo $data_item->note; ?>" required>
        </div>
        <div class="form-group col-sm-12">
          <label for="comment">Description:</label>
          <textarea class="form-control" rows="5" id="desc"  name="desc" value="" required><?php echo $data_item->desc; ?></textarea>
        </div>
        <input type="hidden" name="partId" id="partId" value="<?php echo $data_item->sellparts_id; ?>">
        <div class="row">
          <div class="form-group">
              <div class="col-sm-2" style="margin-left: 10%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img1" src="<?php echo base_url()."uploads/parts/".$data_item->picture; ?>">
              <input type="file" id="partpic1" name="ppic1">
              <input type="hidden" name="old1" value="<?php echo base_url()."uploads/parts/".$data_item->picture; ?>">
            </div>
            <div class="col-sm-2" style="margin-left: 10%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img2" src="<?php echo base_url()."uploads/parts/".$data_item->pictureTwo; ?>">
              <input type="file" id="partpic2" name="ppic2">
              <input type="hidden" name="old2" value="<?php echo base_url()."uploads/parts/".$data_item->pictureTwo; ?>">
            </div>
            <div class="col-sm-2" style="margin-left: 10%">
              <img class="img-edit" style="width: 100pt; height: 100pt; float:left; margin-left:10pt;" id="img3" src="<?php echo base_url()."uploads/parts/".$data_item->pictureThree; ?>">
              <input type="file" id="partpic3" name="ppic3">
              <input type="hidden" name="old3" value="<?php echo base_url()."uploads/parts/".$data_item->pictureThree; ?>">
            </div>
          </div>
        </div>
        <br><br>
        <div class="row">
          <input style="margin-left:1em;" type="submit" class="btn btn-primary " name="upload" value="Submit">
        </div>
</div>
        <?php 
          }
        echo form_close(); ?>
</div>