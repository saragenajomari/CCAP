<script>
    $(document).ready(function(){   

        $( "#part-span" ).attr( "class", "glyphicon glyphicon-chevron-down" ); 
        $( "#car-span" ).attr( "class", "glyphicon glyphicon-chevron-right" );

       

        $("#partSearch").click(function(event){ 
            var search = $("#partsearch").val();
            $("#partsearch").val(search);
            load_data_parts(1);
        })

        $(".test").click(function(event){ 
            $("#partsearch").val(this.id);
            load_data_parts1(1);
        })
        $("#ct").click(function(event){
            load_data_parts2(1);
           // event.preventDefault();
        })
        $("#br").click(function(event){
            load_data_parts3(1);
           // event.preventDefault();
        })
        $("#co").click(function(event){
            load_data_parts4(1);
           // event.preventDefault();
        })
        $("#mod").click(function(event){ 
            load_data_parts5(1);
           // event.preventDefault();
        })
        $("#inter").click(function(event){ 
            load_cat(1);
        })
        $("#exter").click(function(event){ 
            load_cat1(1);
        })
        $("#per").click(function(event){ 
            load_cat2(1);
        })
        $("#auto").click(function(event){ 
            load_cat3(1);
        })
        $("#wheel").click(function(event){ 
            load_cat4(1);
        })
        $("#tires").click(function(event){ 
            load_cat5(1);
        })
        $("#audio").click(function(event){ 
            load_cat6(1);
        })
        $("#elect").click(function(event){ 
            load_cat7(1);
        })
        $("#repair").click(function(event){ 
            load_cat8(1);
        })
        $("#body").click(function(event){ 
            load_cat9(1);
        })
        $("#tools").click(function(event){ 
            load_cat10(1);
        })
        $("#garage").click(function(event){ 
            load_cat11(1);
        })
        $("#camper").click(function(event){ 
            load_cat12(1);
        })
        $("#out").click(function(event){ 
            load_cat13(1);
        })

        function load_data_parts(page){

            var search = $("#partsearch").val();
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }

        function load_data_parts2(page){

            var search = $("#cat").val();
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }

        function load_data_parts3(page){

            var search = $("#brand").val();
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }

        function load_data_parts4(page){

            var search = $("#color").val();
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }

        function load_data_parts5(page){

            var search = $("#modname").val();
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }

        function load_cat(page){

            var search = "INTERNAL ACCESSORIES";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }

        function load_cat1(page){
            var search = "EXTERNAL ACCESSORIES";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat2(page){
            var search = "PERFORMANCE PARTS";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat3(page){
            var search = "AUTOMOTIVE LIGHTING";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat4(page){
            var search = "WHEELS";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat5(page){
            var search = "TIRES";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat6(page){
            var search = "AUDIO";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat7(page){
            var search = "ELECTRONICS";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat8(page){
            var search = "REPAIR PARTS";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat9(page){
            var search = "BODY PARTS";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat10(page){
            var search = "TOOLS";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat11(page){
            var search = "GARAGE";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat12(page){
            var search = "CAMPERS";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }
        
        function load_cat13(page){
            var search = "OUTDOOR RECREATION";
            $.ajax({
                url:"<?php echo base_url(); ?>index.php/pages/pagination_parts/"+page,
                method:"GET",
                data:{search:search},
                dataType:"json",
                success:function(data){
                    $('#content_area').html(data.content_area);
                    $('#pagination_link').html(data.pagination_link);
                }
            });
            event.preventDefault();
        }

        load_data_parts(1);

        $(document).on("click", ".pagination li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_data_parts(page);
        });
    });
</script>

<div class="part-content" id="content_area"></div>
<div style="padding-left: 50%; padding-top: 20px" class="pagination" id="pagination_link"></div> 

