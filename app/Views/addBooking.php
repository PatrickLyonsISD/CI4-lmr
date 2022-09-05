<!DOCTYPE html>
<html>
    <head>
        <?php
        $site_url = base_url();
        $local_style = $site_url . "/assets/";
        $image_url = $site_url . "/assets/images/";
        $script_url = $site_url . "/assets/scripts/";
        ?>
    <html>
        <head>
            <title>Add Booking</title>
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" 
                  integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        </head>
        <body>
            <h1>Fill in new booking details</h1>

           <form method="post" action="<?php echo base_url("/Home/addBooking")?>">

                  <p><strong>room number:</strong>
                <input type="text" name="room_id" size="30" maxlength="25" value="<?php echo set_value('room_id'); ?>"/>
                <?php
                if (isset($validation)) {
                    echo $validation->getError('room');
                }
                ?><br/>

                <p><strong>date of booking:</strong>
                    <input type="text" name="date_of_booking" size="30" maxlength="25"value="<?php echo set_value('date_of_booking'); ?>">
                    <?php
                 /*    if (isset($validation)) {
                        echo $validation->getError('date');
                    } */
                    ?><br/>

                <p><strong>start time of booking:</strong><br/>
                    <input type="time" name="start_time_of_booking" size="75" value="<?php echo set_value('start_time_of_booking'); ?>" size="50" />
                    <?php
                    if (isset($validation)) {
                        echo $validation->getError('start_time');
                    }
                    ?><br/>


                <p><strong>end time of booking:</strong><br/>
                    <input type="time" name="end_time_of_booking" size="30" maxlength="25" value="<?php echo set_value('end_time_of_booking'); ?>"/>
                    <?php
                    if (isset($validation)) {
                        echo $validation->getError('end_time');
                    }
                    ?><br/>




                <p><strong>K-Number:</strong><br/>
                    <input type="text" name="knumber" size="30" maxlength="150" value="<?php echo set_value('knumber'); ?>"/>

                    <?php
                    if (isset($validation)) {
                        echo $validation->getError('knumber');
                    }
                    ?><br/>

                <p><input type="submit" name="submit" value="Add Booking"></p>
            </form>

            <p><?php echo anchor('Home/calendar/', 'Back to calendar'); ?></p>
        </body>
    </html>

