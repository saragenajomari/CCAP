<div style="padding-left: 10%;"> 
  <div class="row">
      <div class="col-lg-12">
          <h2 class="page-header" style="color: #ff9e1f; text-align: center; padding-right: 10%"><b><?=$title?></b></h2>
      </div>
  </div>
  <?php if(!empty($items)){ ?>
  <?php foreach($items as $row){
  ?>
  <div class="col-md-2 column productbox">
      <img class="img" src="<?= base_url().'uploads/cars/'.$row->pictureOne;?>" class="img-responsive">
      <div class="producttitle"><?=$row->year;?> <?=$row->make;?> <?=$row->model;?>
      </div>
      <div class="productprice">
        <div class="pricetext"><span style="font-size:15px;">&#8369;</span> <?= number_format($row->price,2);?>
        </div> 
        <div class="pull-right"><a href="#" class="btn btn-danger btn-sm delcar" id="<?=$row->sellcar_id?>" role="button"><i class="fa fa-trash"></i> Delete</a>
        </div>
        <div style="padding-right: 10px" class="pull-right"><a href="<?=site_url('pages/edit_car/'.$row->sellcar_id);?>" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil"></i> Update</a>
        </div>
      </div>
  </div>
  <?php }?>
  <?php }else{ ?>
      <div class="alert alert-success" style="margin-left: -125px">
        <strong>Congratulations!!!</strong> All the cars you sell are up-to-date.
      </div>
  <?php } ?>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.delcar').click(function(){
      var id = $(this).attr("id");
      if(confirm('Do you want to delete this car data?')){
        window.location = "<?php echo base_url(); ?>pages/delete_car/"+id;
      }else{
        return false;
      }
    });
  });
</script>