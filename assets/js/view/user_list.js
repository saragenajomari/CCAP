    
    window.onload = hideErrorMessages();

    function hideErrorMessages(){
        $("#error_email").hide();
        $("#error_email2").hide();
        $("#error_email3").hide();
        $("#error_name").hide();
        $("#error_name2").hide();
        $("#error_role").hide();
        $("#edit-error_email").hide();
        $("#edit-error_email2").hide();
        $("#edit-error_email3").hide();
        $("#edit-error_name").hide();
        $("#edit-error_name2").hide();
        $("#edit-error_role").hide();
        hide_loading();
    }

    $(document).ready( function () { 

        //$('#dataTables-user-log').DataTable();
        $('#dataTables-user-list').DataTable({
            "bFilter": true,
            "paging":   false,
            //"iDisplayLength": 20,
            "order": [[ 0, "asc" ]]
            //"bDestroy": true,
        });
     } );

    function view_seller_popup(email,id,name,type,address,contact){
        $( "#view-email" ).val(email);
        $( "#view-id" ).val(id);
        $( "#view-name" ).val(name);
        $( "#view-address" ).val( address);
        $( "#view-type" ).val(type);
        $( "#view-contact" ).val(contact);
    }

    function deactivate_seller(id){
        if(confirm("Are you sure you want to delete seller?")){
            window.location = $("#base-url").val()+"dbProcess/delete_seller/"+id;
        }else{

        }
    }

    function deactivate_confirmation(id){
        $('#deactivateYesButton').attr("onclick","deactivate_submit("+id+")");
    }

    function deactivate_submit(id){
        $.ajax({
            url: $("#base-url").val()+"/delete_seller/"+id,
            cache: false,
            success: function (data) {
                location.reload();
            },
        });
    }

    function reset_submit(email,id){
        show_loading();
            $.ajax({
            url: $("#base-url").val()+"admin/reset_user_password/"+email+"/"+id,
            cache: false,
            success: function (result) {
                var result = $.parseJSON(result);
                if(result.status=='success'){
                    location.reload();
                }
                else{
                    alert("Oops there is something wrong!");
                }
            },
            error: ajax_error_handling
        });
    }

    function update_user_details(id){
        hideErrorMessages();
        show_loading();
        var i=0;
        var name = $('#edit-name').val().trim();
        var email = $('#edit-email').val().trim();
        var role = $('#edit-role').val();


        if(name == ""){
            $("#edit-error_name").show();
            i++;
        }
        else if (!name.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_name2").show();
            i++;
        }

        if(email == ""){
            $("#edit-error_email").show();
            i++;
        }
        else if (!email.match(/^[\w -._]+@[\-0-9a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/)) {
            $("#edit-error_email3").show();
            i++;
        }

        if(role == 0){
            $("#edit-error_role").show();
            i++;
        }

        if(i == 0){
            $.ajax({
                url: $("#base-url").val()+"admin/update_user_details/",
                traditional: true,
                type: "post",
                dataType: "text",
                data: {email: email, id:id, name:name, role:role},
                success: function (result) {
                    var result = $.parseJSON(result);
                    if(result.status=='success'){
                        location.reload();
                    }
                    else if(result.status=='exist'){
                        $("#edit-error_email2").show();
                        hide_loading();
                    }
                    else{
                        alert("Oops there is something wrong!");
                    }
                },
                error: ajax_error_handling
            });
        }
    }






    $( "#newUserSubmit" ).click(function() {
        hideErrorMessages();
        show_loading();
        var i=0;
        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var role = $('#role').val();

        if(name == ""){
            $("#error_name").show();
            i++;
        }
        else if (!name.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_name2").show();
            i++;
        }

        if(email == ""){
            $("#error_email").show();
            i++;
        }
        else if (!email.match(/^[\w -._]+@[\-0-9a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/)) {
            $("#error_email3").show();
            i++;
        }

        if(role == 0){
            $("#error_role").show();
            i++;
        }

        if(i == 0){
            $.ajax({
                url: $("#base-url").val() + "admin/add_user",
                traditional: true,
                type: "post",
                dataType: "text",
                data: {email:email, role:role, name:name},
                success: function (result) {
                    var result = $.parseJSON(result);
                    if(result.status=='success'){
                        location.reload();
                    }
                    else if(result.status=='exist'){
                        $("#error_email2").show();
                        hide_loading();
                    }
                    else{
                        alert("Oops there is something wrong!");
                    }
                  
                },
                error: ajax_error_handling
            });
        }else{
            hide_loading();
        }
            
    });


