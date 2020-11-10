<div class="content-edit" id="content-edit">
    <h1 style="margin-left:5em; ">Edit Details</h1>
    <div class="col-sm-8">
        <?php 
        echo form_open('pages/alter_account');
        foreach($user_data as $data_item_users){
        ?>
         <div class="form-group">
         	<label>First Name:</label>
			<input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="First name" value="<?php echo $data_item_users->fname; ?>">
			<span id="errorname1" style="color:red;"></span>
		</div>
        <div class="form-group">
         	<label>Last Name:</label>
			<input type="text" name="lname" id="lname" tabindex="1" class="form-control" placeholder="Last name" value="<?php echo $data_item_users->lname; ?>" >
			<span id="errorname2" style="color:red;"></span>
		</div>
        <div class="form-group">
         	<label>Contact Number:</label>
			<input type="text" name="cnum" id="cnum" tabindex="1" class="form-control" placeholder="Contact number" value="<?php echo $data_item_users->contact; ?>" >
			<span id="errorname3" style="color:red;"></span>
		</div>
        <div class="form-group">
         	<label>Address:</label>
			<input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="Address" value="<?php echo $data_item_users->address; ?>" >
			<span id="errorname4" style="color:red;"></span>
		</div>
		<div class="form-group">
         	<label>Email address:</label>
			<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $data_item_users->email; ?>" >
			<span id="errorname5" style="color:red;"></span>
		</div>
		<div class="form-group">
         	<label>New Password:</label>
			<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $data_item_users->password; ?>">
			<span id="errorname6" style="color:red;"></span>
		</div>
        <input type="hidden" name="uid" id="uid" value="<?php echo $data_item_users->id; ?>">
        <input type="submit" style="float:left;" class="btn btn-warning" name="submit">
        <?php 
        }
        echo form_close();
        ?>
    </div>
</div>