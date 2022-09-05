<div class="updateE">
    <h2>Update Room</h2>
    <?php echo form_open('Home/updateRoom/'.$roomInfo['room_id']);?>
   
    <div>
    <label for="capacity">Capacity</label>
    <input type="number" name="capacity" id="capacity" value="<?php echo $roomInfo['capacity'];?>">
    </div>
    <div>
    <label for="computer_access">computer access (y/n): </label>
    <input type="text" name="computer_access" id="computer_access" value="<?php echo $roomInfo['computer_access'];?>">
    </div>
    <div>
    <label for="available">availabile? </label>
    <input type="text" name="available" id="available" value="<?php echo $roomInfo['available'];?>">
    </div>

    <div>
    <label for="non_availability_reason">reason for closure: </label>
    <input type="text" name="non_availability_reason" id="non_availability_reason" value="<?php echo $roomInfo['non_availability_reason'];?>">
    </div>
 
   
    <div>
        <input type="submit" name="button" class="btn" value="Update room">
    </div>
</div>