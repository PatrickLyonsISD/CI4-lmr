<?php
$site_url = base_url();
$local_style = $site_url . "/assets/";
$image_url = $site_url . "/assets/images/";
$script_url = $site_url . "/assets/scripts/";
?>

<div class="mgmt">
        <h2>Booking Management</h2>
        <p>Bookings for: <?php  echo $_SESSION['Name'] ?></p>
        <table>
            <th>Booking ID</th>
            <th>Room Number</th>
            <th>Date of Booking</th>
            <th>start time</th>
            <th>end time</th>
            <th>K-Number</th>
           
            <?php            foreach ($memberBookings as $booking) {?>
            <tr>
                <td><?php echo $booking['booking_id'];?></td>
                <td><?php echo $booking['room_id'];?></td>
                <td><?php echo $booking['date_of_booking'];?></td>
                <td><?php echo $booking['start_time_of_booking'];?></td>
                <td><?php echo $booking['end_time_of_booking'];?></td>
                <td><?php echo $booking['knumber'];?></td>
                <td>
                    <?php echo anchor('Home/updateBookingPage/'.$booking['booking_id'], 'Update booking', ['class'=>'btn']);?>
                </td>
                <td>
                    <?php echo anchor('Home/deleteBooking/'.$booking['booking_id'], 'delete booking', ['class'=>'btn']);?>
                </td>
              
            </tr>
<?php
            }?>
        </table>
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