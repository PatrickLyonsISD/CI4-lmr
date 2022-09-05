<?php
$site_url = base_url();
$local_style = $site_url . "/assets/";
$image_url = $site_url . "/assets/images/";
$script_url = $site_url . "/assets/scripts/";
?>
<div class= "portal">
<div class="loggedInfo">
    <h3> admin logged in: <?php echo $_SESSION['Name'];?></h3>
</div>
<div class="adminOptions">
<div class="optionCard">
<?php echo anchor('Home/Portal','Booking Management',['class'=>'btn']);?>
</div>
</div>

<div class="mgmt">
        <h2>room Management</h2>
       
        <table>
            <th>room ID</th>
            <th>room Name</th>
            <th>Capacity</th>
            <th>Computer access y(yes)/n(no)</th>
            <th>available y(yes)/n(no)</th>
            <th>reason for not being available</th>
           <?php foreach($Rooms as $room){?>
            <tr>
                <td><?php echo $room['room_id'];?></td>
                <td><?php echo $room['room_name'];?></td>
                <td><?php echo $room['capacity'];?></td>
                <td><?php echo $room['computer_access'];?></td>
                <td><?php echo $room['available'];?></td>
                <td><?php echo $room['non_availability_reason'];?></td>

                <td>
                <?php echo anchor('Home/updateRoomPage/'.$room['room_id'], 'Update room', ['class'=>'btn']);?>&nbsp;
                                <a class="btn btn-danger" onclick="return confirm('are you sure you want to delete this booking?.');" <?php echo anchor('Home/deleteBooking/' . $room['room_id'], 'Hide room', ['class'=>'btn']);?>
                            
    </td>
            </tr>
           <?php } ?>
        </table>
    </div>


</div>
<style>
        .mgmt{
    width:80%;
    margin: auto;
    padding-bottom: 2em;
}
.mgmt h2, .mgmt p{
    text-align: center;
}

table {
  max-width: 960px;
  margin: 10px auto;
}

caption {
  font-size: 1.6em;
  font-weight: 400;
  padding: 10px 0;
}

thead th {
  font-weight: 400;
  background: #8a97a0;
  color: #FFF;
}

tr {
  background: #f4f7f8;
  border-bottom: 1px solid #FFF;
  margin-bottom: 5px;
}

tr:nth-child(even) {
  background: #e8eeef;
}

th, td {
  text-align: left;
  padding: 20px;
  font-weight: 300;
}

tfoot tr {
  background: none;
}

tfoot td {
  padding: 10px 2px;
  font-size: 0.8em;
  font-style: italic;
  color: #8a97a0;
}


    </style>