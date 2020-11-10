<script>
    $(document).ready(function(){

        $( "#part-span" ).attr( "class", "glyphicon glyphicon-chevron-right" );
        $( "#car-span" ).attr( "class", "glyphicon glyphicon-chevron-down" );

        $("#carSearch").click(function(event){
            load_data(1);
        })

        $("#mkr").click(function(event){
            load_data1(1);
           // event.preventDefault();
        })
        $("#yr").click(function(event){
            load_data2(1);
           // event.preventDefault();
        })
        $("#sc").click(function(event){
            load_data3(1);
           // event.preventDefault();
        })
        $("#tran").click(function(event){
            load_data4(1);
           // event.preventDefault();
        })
        $("#bs").click(function(event){
            load_data5(1);
           // event.preventDefault();
        })
        $("#dt").click(function(event){
            load_data6(1);
           // event.preventDefault();
        })
        $("#ft").click(function(event){
            load_data7(1);
           // event.preventDefault();
        })


        function load_data(page){
        var search = $("#carsearch").val();
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_cars/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            //event.preventDefault();
        }
        function load_data1(page){

            var search = $("#maker").val();

                $.ajax({
                    url:"<?php echo base_url(); ?>"+ "index.php/pages/pagination_cars/"+page,
                    method:"GET",
                    data:{search:search},
                    dataType:"json",
                    success: function(data){
                        $('#content_area').html(data.content_area);
                        $('#pagination_link').html(data.pagination_link);
                    }
                });
                event.preventDefault();
        }
        function load_data2(page){

            var search = $("#modyear").val();

                $.ajax({
                    url:"<?php echo base_url(); ?>"+ "index.php/pages/pagination_cars/"+page,
                    method:"GET",
                    data:{search:search},
                    dataType:"json",
                    success: function(data){
                        $('#content_area').html(data.content_area);
                        $('#pagination_link').html(data.pagination_link);
                    }
                });
                event.preventDefault();
        }
        function load_data3(page){

            var search = $("#seatcap").val();

                $.ajax({
                    url:"<?php echo base_url(); ?>"+ "index.php/pages/pagination_cars/"+page,
                    method:"GET",
                    data:{search:search},
                    dataType:"json",
                    success: function(data){
                        $('#content_area').html(data.content_area);
                        $('#pagination_link').html(data.pagination_link);
                    }
                });
                event.preventDefault();
        }
        function load_data4(page){

            var search = $("#transmission").val();

                $.ajax({
                    url:"<?php echo base_url(); ?>"+ "index.php/pages/pagination_cars/"+page,
                    method:"GET",
                    data:{search:search},
                    dataType:"json",
                    success: function(data){
                        $('#content_area').html(data.content_area);
                        $('#pagination_link').html(data.pagination_link);
                    }
                });
                event.preventDefault();
        }
        function load_data5(page){

            var search = $("#bodstyle").val();

                $.ajax({
                    url:"<?php echo base_url(); ?>"+ "index.php/pages/pagination_cars/"+page,
                    method:"GET",
                    data:{search:search},
                    dataType:"json",
                    success: function(data){
                        $('#content_area').html(data.content_area);
                        $('#pagination_link').html(data.pagination_link);
                    }
                });
                event.preventDefault();
        }
        function load_data6(page){

            var search = $("#driveType").val();

                $.ajax({
                    url:"<?php echo base_url(); ?>"+ "index.php/pages/pagination_cars/"+page,
                    method:"GET",
                    data:{search:search},
                    dataType:"json",
                    success: function(data){
                        $('#content_area').html(data.content_area);
                        $('#pagination_link').html(data.pagination_link);
                    }
                });
                event.preventDefault();
        }
        function load_data7(page){

            var search = $("#fType").val();

                $.ajax({
                    url:"<?php echo base_url(); ?>"+ "index.php/pages/pagination_cars/"+page,
                    method:"GET",
                    data:{search:search},
                    dataType:"json",
                    success: function(data){
                        $('#content_area').html(data.content_area); 
                        $('#pagination_link').html(data.pagination_link);
                    }
                });
                event.preventDefault();
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
<div style="padding-left: 50%; padding-top: 20px" class="pagination" id="pagination_link"></div>

