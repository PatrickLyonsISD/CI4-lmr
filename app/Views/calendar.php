<!DOCTYPE html>
<html>
    <?php
    $site_url = base_url();
    $local_style = $site_url . "/assets/";
    $image_url = $site_url . "/assets/images/";
    $script_url = $site_url . "/assets/scripts/";
    ?>
    <head>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" 
                  integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    </head>

    <body>
    
        <div class="container">
         
            <div class="row" style="width:90%">
                <div class="col-md-12">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            var events = <?php echo json_encode($data) ?>;

            var date = new Date()
            var d = date.getDate(),
                    m = date.getMonth(),
                    y = date.getFullYear()

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                events: events
            })
        </script>
        <style>
            .container{
                padding: 20px;
            }
            .h1{
                padding: 20px;
            }
        </style>
    </body>
</html>