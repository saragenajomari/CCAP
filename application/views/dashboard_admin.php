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


    function carApprove(id) {
            $.ajax({
                url:"<?php echo base_url(); ?>"+ "index.php/dbProcess/approve_car/",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success: function(data){
                  alert('Approved Successfully');
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
                  alert('Declined Successfully');
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
            url:"<?php echo base_url(); ?>index.php/pages/pagination_admin/"+page,
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
<div class="home-content" id="content_area"></div>
<div style="padding-left: 50%; padding-top: 4%;" class="pagination" id="pagination_link"></div>

