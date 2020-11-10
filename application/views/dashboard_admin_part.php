<script>
    var base_url = '<?php echo base_url(); ?>';
    function changeImage(element) {
        document.getElementById('imageReplace').src = base_url+'uploads/parts/'+element;
        event.preventDefault();
    }

    function changeImageSecond(element) {
        document.getElementById('imageReplaceTwo').src = base_url+'uploads/parts/'+element;
        event.preventDefault();
    }

        function partApprove(id) {
            $.ajax({
                url:"<?php echo base_url(); ?>"+ "index.php/dbProcess/approve_part/",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success: function(data){
                    alert('Approved Successfully');
                    location.reload();
                }
            });
        }

        function partDecline(id) {
            $.ajax({
                url:"<?php echo base_url(); ?>"+ "index.php/dbProcess/decline_part/",
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

         /*$(".approve_car").click(function(event){
            load_data(1);
            event.preventDefault();
        })

         $(".approve_part").click(function(event){
            load_data(1);
            event.preventDefault();
        })*/

        function load_data(page){
        
        $.ajax({
            url:"<?php echo base_url(); ?>index.php/pages/pagination_admin_part/"+page,
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
<div style="float:right;" class="pagination" id="pagination_link"></div>

