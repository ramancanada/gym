<?php
    session_start();

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "Gym";

    $group    = array();
    $personal = array();
    $yoga     = array();
    $aerobics = array();

    try {
        $link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // set the PDO error mode to exception
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $link->prepare("SELECT program_id, category_id, program_name, program_days, program_begin_time, program_end_time FROM program WHERE is_opened='Y'");
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            if ($result->category_id == '0001') {        // group training
                array_push($group, $result);
            } else if ($result->category_id == '0002') { // personal training
                array_push($personal, $result);
            } else if ($result->category_id == '0003') { // yoga
                array_push($yoga, $result);
            } else if ($result->category_id == '0004') { // aerobics
                array_push($aerobics, $result);
            }
        }
        
        $link = null;

    } catch(PDOException $e) {
        echo "<script type='text/javascript'>alert('Error: " . $e->getMessage() . "');</script>";
        echo $e->getMessage();
        //header("Location:503.html");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Planet Fitness - Application</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">Planet Fitness</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="service.html">Service</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="login.html">Log In</a>
                    </li>
                    <li>
                        <a href="signup.html">Sign Up</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <div class="no-padding" style="background-image: url('img/fitness-3.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading" style="margin-top: 50px; height: 100px;">
                        <h1><font color="white">Application</font></h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <section class="no-padding" id="group_training">
        <div class="container-fluid">
            <h3>Group Training</h3>
            <p>This is a group training classes.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
            <?php
                // Group Training Program List
                foreach ($group as $program) {
            ?>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass" value="<?php echo $program->program_id ?>"></div></td>
                    <td><?php echo $program->program_name ?></td>
                    <td>
                    <?php
                        $days = explode(",", $program->program_days);
                        foreach ($days as $day) {
                            switch ($day) {
                                case "1":
                                    echo "<span class='label label-primary'>Mon</span>";
                                    break;
                                case "2":
                                    echo "<span class='label label-success'>Tue</span>";
                                    break;
                                case "3":
                                    echo "<span class='label label-info'>Wed</span>";
                                    break;
                                case "4":
                                    echo "<span class='label label-warning'>Thu</span>";
                                    break;
                                case "5":
                                    echo "<span class='label label-danger'>Fri</span>";
                                    break;
                                case "6":
                                    echo "<span class='label label-default'>Sat</span>";
                                    break;
                                case "7":
                                    echo "<span class='label label-default'>Sun</span>";
                                    break;
                            }
                        }                      
                    ?>
                    </td>
                    <td><?php echo $program->program_begin_time ?> ~ <?php echo $program->program_end_time ?></td>
                </tr>
            <?php
                }
            ?>             
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>

    <section class="no-padding" id="personal_training">
        <div class="container-fluid">
            <h3>Personal Training</h3>
            <p>This is a personal training schedule.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
            <?php
                // Personal Training Program List
                foreach ($personal as $program) {
            ?>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass" value="<?php echo $program->program_id ?>"></div></td>
                    <td><?php echo $program->program_name ?></td>
                    <td>
                    <?php
                        $days = explode(",", $program->program_days);
                        foreach ($days as $day) {
                            switch ($day) {
                                case "1":
                                    echo "<span class='label label-primary'>Mon</span>";
                                    break;
                                case "2":
                                    echo "<span class='label label-success'>Tue</span>";
                                    break;
                                case "3":
                                    echo "<span class='label label-info'>Wed</span>";
                                    break;
                                case "4":
                                    echo "<span class='label label-warning'>Thu</span>";
                                    break;
                                case "5":
                                    echo "<span class='label label-danger'>Fri</span>";
                                    break;
                                case "6":
                                    echo "<span class='label label-default'>Sat</span>";
                                    break;
                                case "7":
                                    echo "<span class='label label-default'>Sun</span>";
                                    break;
                            }
                        }                      
                    ?>
                    </td>
                    <td><?php echo $program->program_begin_time ?> ~ <?php echo $program->program_end_time ?></td>
                </tr>
            <?php
                }
            ?>            
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>

    <section class="no-padding" id="yoga">
        <div class="container-fluid">
            <h3>Yoga</h3>
            <p>This is a Yoga schedule.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
            <?php
                // Yoga Training Program List
                foreach ($yoga as $program) {
            ?>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass" value="<?php echo $program->program_id ?>"></div></td>
                    <td><?php echo $program->program_name ?></td>
                    <td>
                    <?php
                        $days = explode(",", $program->program_days);
                        foreach ($days as $day) {
                            switch ($day) {
                                case "1":
                                    echo "<span class='label label-primary'>Mon</span>";
                                    break;
                                case "2":
                                    echo "<span class='label label-success'>Tue</span>";
                                    break;
                                case "3":
                                    echo "<span class='label label-info'>Wed</span>";
                                    break;
                                case "4":
                                    echo "<span class='label label-warning'>Thu</span>";
                                    break;
                                case "5":
                                    echo "<span class='label label-danger'>Fri</span>";
                                    break;
                                case "6":
                                    echo "<span class='label label-default'>Sat</span>";
                                    break;
                                case "7":
                                    echo "<span class='label label-default'>Sun</span>";
                                    break;
                            }
                        }                      
                    ?>
                    </td>
                    <td><?php echo $program->program_begin_time ?> ~ <?php echo $program->program_end_time ?></td>
                </tr>
            <?php
                }
            ?>            
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>

    <section class="no-padding" id="aerobics">
        <div class="container-fluid">
            <h3>Aerobics</h3>
            <p>This is a Aerobics schedule.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
            <?php
                // Aerobics Training Program List
                foreach ($aerobics as $program) {
            ?>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass" value="<?php echo $program->program_id ?>"></div></td>
                    <td><?php echo $program->program_name ?></td>
                    <td>
                    <?php
                        $days = explode(",", $program->program_days);
                        foreach ($days as $day) {
                            switch ($day) {
                                case "1":
                                    echo "<span class='label label-primary'>Mon</span>";
                                    break;
                                case "2":
                                    echo "<span class='label label-success'>Tue</span>";
                                    break;
                                case "3":
                                    echo "<span class='label label-info'>Wed</span>";
                                    break;
                                case "4":
                                    echo "<span class='label label-warning'>Thu</span>";
                                    break;
                                case "5":
                                    echo "<span class='label label-danger'>Fri</span>";
                                    break;
                                case "6":
                                    echo "<span class='label label-default'>Sat</span>";
                                    break;
                                case "7":
                                    echo "<span class='label label-default'>Sun</span>";
                                    break;
                            }
                        }                      
                    ?>
                    </td>
                    <td><?php echo $program->program_begin_time ?> ~ <?php echo $program->program_end_time ?></td>
                </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>

    <!--
    <section class="no-padding" id="group_training">
        <div class="container-fluid">
            <h3>Group Training</h3>
            <p>This is a group training classes.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass"></div></td>
                    <td>Belly Dancing</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>18:00 ~ 20:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass"></div></td>
                    <td>Body Blast</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>18:00 ~ 20:00</td>
                </tr>      
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass"></div></td>
                    <td>Group Cycling</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>20:00 ~ 22:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass"></div></td>
                    <td>Hip Hop B-Boying</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>20:00 ~ 22:00</td>
                </tr>      
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass"></div></td>
                    <td>Physioball</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>22:00 ~ 23:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="gtclass"></div></td>
                    <td>Sculpting with Weights</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>22:00 ~ 23:00</td>
                </tr>                
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>

    <section class="no-padding" id="personal_training">
        <div class="container-fluid">
            <h3>Personal Training</h3>
            <p>This is a personal training schedule.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="ptclass"></div></td>
                    <td>Training #1</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>18:00 ~ 20:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="ptclass"></div></td>
                    <td>Training #2</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>18:00 ~ 20:00</td>
                </tr>      
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="ptclass"></div></td>
                    <td>Training #3</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>20:00 ~ 22:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="ptclass"></div></td>
                    <td>Training #4</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>20:00 ~ 22:00</td>
                </tr>      
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="ptclass"></div></td>
                    <td>Training #5</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>22:00 ~ 23:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="ptclass"></div></td>
                    <td>Training #6</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>22:00 ~ 23:00</td>
                </tr>                
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>

    <section class="no-padding" id="yoga">
        <div class="container-fluid">
            <h3>Yoga</h3>
            <p>This is a Yoga schedule.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="yoga"></div></td>
                    <td>Yoga #1</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>18:00 ~ 20:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="yoga"></div></td>
                    <td>Yoga #2</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>18:00 ~ 20:00</td>
                </tr>      
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="yoga"></div></td>
                    <td>Yoga #3</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>20:00 ~ 22:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="yoga"></div></td>
                    <td>Yoga #4</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>20:00 ~ 22:00</td>
                </tr>      
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="yoga"></div></td>
                    <td>Yoga #5</td>
                    <td><span class="label label-primary">Mon</span><span class="label label-info">Wed</span><span class="label label-danger">Fri</span></td>
                    <td>22:00 ~ 23:00</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="yoga"></div></td>
                    <td>Yoga #6</td>
                    <td><span class="label label-success">Tue</span><span class="label label-warning">Thu</span></td>
                    <td>22:00 ~ 23:00</td>
                </tr>                
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>

    <section class="no-padding" id="aerobics">
        <div class="container-fluid">
            <h3>Aerobics</h3>
            <p>This is a Aerobics schedule.</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Select</th>
                    <th>Training Name</th>
                    <th>Training Days</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="aerobics"></div></td>
                    <td>Yoga #1</td>
                    <td><span class="label label-primary">Mon</span>
                        <span class="label label-success">Tue</span>
                        <span class="label label-info">Wed</span>
                        <span class="label label-warning">Thu</span>
                        <span class="label label-danger">Fri</span></td>
                    <td>08:00 ~ 09:30</td>
                </tr>      
                <tr class="">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="aerobics"></div></td>
                    <td>Yoga #1</td>
                    <td><span class="label label-primary">Mon</span>
                        <span class="label label-success">Tue</span>
                        <span class="label label-info">Wed</span>
                        <span class="label label-warning">Thu</span>
                        <span class="label label-danger">Fri</span></td>
                    <td>10:00 ~ 11:30</td>
                </tr>      
                <tr class="active">
                    <td align="center"><div class="checkbox"><input type="checkbox" name="aerobics"></div></td>
                    <td>Yoga #1</td>
                    <td><span class="label label-primary">Mon</span>
                        <span class="label label-success">Tue</span>
                        <span class="label label-info">Wed</span>
                        <span class="label label-warning">Thu</span>
                        <span class="label label-danger">Fri</span></td>
                    <td>14:00 ~ 15:30</td>
                </tr>    
                </tbody>
            </table>
            <a href="#" class="btn btn-success" role="button">Apply</a>
        </div>        
    </section>

    <hr>
    -->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">                    
                    <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
