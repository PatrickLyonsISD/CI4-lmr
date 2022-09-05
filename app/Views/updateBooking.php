<div class="update">
    <h2>Update Booking details:</h2>
    <?php echo form_open('Home/updateBooking/'.$bookingInfo['booking_id']);?>
    <div>
    <label for="room_id">Room number</label>
    <input type="number" name="room_id" id="room_id" value="<?php echo $bookingInfo['room_id'];?>">
    </div>
    <div>
    <label for="date_of_booking">Booking Date</label>
    <input type="date" name="date_of_booking" id="date_of_booking" value="<?php echo $bookingInfo['date_of_booking'];?>">
    </div>
    <div>
    <label for="start_time_of_booking">Start time </label>
    <input type="time" name="start_time_of_booking" id="start_time_of_booking" value="<?php echo $bookingInfo['start_time_of_booking'];?>">
    </div>
    <div>
    <label for="end_time_of_booking">end time </label>
    <input type="time" name="end_time_of_booking" id="end_time_of_booking" value="<?php echo $bookingInfo['end_time_of_booking'];?>">
    </div>
 
   
    <div>
        <input type="submit" name="button" class="btn" value="Update Booking">
    </div>
</div>