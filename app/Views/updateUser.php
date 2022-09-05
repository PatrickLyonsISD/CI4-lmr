<div class="updateE">
    <h2>Update your details</h2>
    <?php echo form_open('Home/updateUser/'.$userInfo['kNumber']);?>
   
    <div>
    <label for="fName">first Name</label>
    <input type="fName" name="fName" id="fName" value="<?php echo $userInfo['fName'];?>">
    </div>
    <div>
    <label for="lName">last Name: </label>
    <input type="text" name="lName" id="lName" value="<?php echo $userInfo['lName'];?>">
    </div>
    <div>
    <label for="emailAddress">email: </label>
    <input type="email" name="emailAddress" id="emailAddress" value="<?php echo $userInfo['emailAddress'];?>">
    </div>

    <div>
    <label for="telephoneNo">Number: </label>
    <input type="text" name="telephoneNo" id="telephoneNo" value="<?php echo $userInfo['telephoneNo'];?>">
    </div>
 
    <div>
    <label for="password">password: </label>
    <input type="password" name="password" id="password" value="<?php echo $userInfo['password'];?>">
    </div>
   
    <div>
        <input type="submit" name="button" class="btn" value="Update details">
    </div>
</div>