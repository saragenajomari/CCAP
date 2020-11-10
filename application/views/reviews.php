<script type="text/javascript">
  $(document).ready(function(){
  	load_data(1);
     function load_data(page){
        var id= $("#id").val();
        
        $.ajax({
          url:"<?php echo base_url(); ?>index.php/pages/pagination_rating/"+page,
          method:"GET",
          data:{id:id},
          dataType:"json",
          success:function(data){
              $('#content_area').html(data.content_area);
              $('#pagination_link').html(data.pagination_link);
          }
          });
       //event.preventDefault();
      }

      $(document).on("click", ".pagination li a", function(event){
          event.preventDefault();
          var page = $(this).data("ci-pagination-page");
          load_data(page);
      });
  });

  function delete_func(review_id){
     	
     	if (confirm("Are you sure to delete this review?")) {
    		load_delete(review_id);
  		}else{
    		return false;
  		}
  }

  function load_delete(review_id){
  		
  		$.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>index.php/dbProcess/delete_rating",
        data: {id:review_id},
        success: function(data){
          alert('Successfully Deleted Data');
          location.reload();
        }
    }); 
  }

</script>

<div class="rating-content" id="content_area"></div>
<div style="padding-left: 50%; padding-top: 20px" class="pagination" id="pagination_link"></div>
</div>