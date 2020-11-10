    
        <div id="wrapper" style="padding-bottom: 25%"> 
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: #ff9e1f; text-align: center;"><?=$title?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-12">      
                    <table class="table table-striped table-bordered table-hover" id="dataTables-user-list">
                        <thead style="background-color: #ff9e1f">
                            <tr>
                                <th>Seller Name</th>
                                <th>Email Address</th>
                                <th>Contact No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users  as $row): ?>
                            <tr>
                                <td><?php echo $row->fname; ?> <?php echo $row->lname; ?></td> 
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->contact ?></td> 
                                
                                <td>
                                    <a class="btn btn-primary" id="seller-view"  onclick="view_seller_popup('<?=$row->email?>','<?=$row->id?>','<?=$row->fname?> <?=$row->lname?>', '<?=$row->type?>', '<?=$row->address?>', '<?=$row->contact?>');" data-toggle="modal" data-target="#viewSeller"><i class="fa fa-eye"> VIEW SELLER</i></a>
                                    <a href="#" class="btn btn-danger del" id="<?php echo $row->id ?>"><i class="fa fa-trash"> DELETE SELLER</i></a>                                   
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deactivateSeller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 style="text-align: center;" class="modal-title" id="myModalLabel">DELETE SELLER DETAILS</h4>
                    </div>
                    <div class="modal-body">
                        <label>You are going to delete this seller's account <label id="seller-email" style="color:blue;"></label>.</label><br/>
                        <label>Click <b>Yes</b> to continue.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a id="deactivateYesButton" class="btn btn-danger" >Yes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="viewSeller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #f5aa1e">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 style="text-align: center;" class="modal-title" id="myModalLabel">VIEW SELLER DETAILS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Seller ID</label>&nbsp;&nbsp;
                                    <input class="form-control" id="view-id" value="" placeholder="Type" name="view-id" type="text" autofocus disabled>
                                </div>
                            </div>
                        </div>          
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Full Name</label> &nbsp;&nbsp;
                                    <input class="form-control" id="view-name" placeholder="Name" name="view-name" type="text" autofocus disabled>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label> &nbsp;&nbsp;
                                    <input class="form-control" id="view-email" placeholder="E-mail" name="view-email" type="email" autofocus disabled>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Contact No.</label>&nbsp;&nbsp;
                                    <input class="form-control" id="view-contact" placeholder="Type" name="view-contact" type="text" autofocus disabled>
                                </div>
                            </div>
                        </div>          
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address</label>&nbsp;&nbsp;
                                    <input class="form-control" id="view-address" placeholder="Address" name="view-address" type="text" autofocus disabled>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Type</label>&nbsp;&nbsp;
                                    <input class="form-control" id="view-type" placeholder="Type" name="view-type" type="text" autofocus disabled>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
       
        <!-- /#page-wrapper --> 
        <script type="text/javascript">
        $(document).ready(function(){
            $('.del').click(function(){
                var id = $(this).attr("id");
                if(confirm('Do you want to delete this data?')){
                    window.location = "<?php echo base_url(); ?>pages/delete_seller/"+id;
                }else{
                    return false;
                }
            });
        });
        </script>
