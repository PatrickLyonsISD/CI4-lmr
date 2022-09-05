<div class="userProfile">

    <h2> welcome to your profile <?php  echo $_SESSION['Name'] ?></h2>
    <?php foreach($Users as $user)?>
    
    <div class="userInfo">
    
    <!-- the profile pictue was meant to be got by going into the uploads file and database and concatonate them togehter to get the correct image -->
   <p> <img src="<?="writable/uploads/".$user['image_path'];?>" height="100px" width="100px" alt="profile picture"></p>
    <p>k-Number:<?php echo $user['kNumber'];?></p>
        <p>First Name:<?php echo $user['fName'];?></p>
        <p>Last Name:<?php echo $user['lName'];?></p>
        <p>Email:<?php echo $user['emailAddress'];?></p>
        <p>telephone:<?php echo $user['telephoneNo'];?></p>

    </div>
      <?php echo anchor('Home/img/'.$user['kNumber'],'Upload profile picture', ['class'=>'btn']);?>
     <?php echo anchor('Home/updateUserPage/'.$user['kNumber'], 'Update your details', ['class'=>'btn']);?>
    
     
</div>
 