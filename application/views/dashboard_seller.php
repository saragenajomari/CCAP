<script>
    var base_url = '<?php echo base_url(); ?>'; 

    function changeImage(element) {
        document.getElementById('imageReplace').src = base_url+'uploads/cars/'+element;
        event.preventDefault();
    }

    function changeImageSecond(element) {
        document.getElementById('imageReplaceTwo').src = base_url+'uploads/cars/'+element;
        event.preventDefault();
    }

        function carSold(id) {
            $.ajax({
                url:"<?php echo base_url(); ?>"+ "index.php/dbProcess/sold_car/",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success: function(data){
                  alert('Status Changed Successfully');
                  location.reload();
                }
            });
        }

        function carDecline(id) {
            $.ajax({
                url:"<?php echo base_url(); ?>"+ "index.php/dbProcess/decline_car/",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success: function(data){
                  alert('Removed Successfully');
                  location.reload();
                }
            });
        }

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

        function load_data(page){
        
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/pages/pagination_seller/"+page,
            method:"GET",
            dataType:"json",
            success:function(data){
                $('#content_area').html(data.content_area);
                $('#pagination_link').html(data.pagination_link);
            }
        });
        //event.preventDefault();
        }
        load_data(1);
        $(document).on("click", ".pagination li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_data(page);
        });          
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
<div class="home-content" id="content_area"></div>
<div style="padding-left: 50%; padding-top: 10%;" class="pagination" id="pagination_link"></div>

