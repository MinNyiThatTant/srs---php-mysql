<?php

// Initialize the session
session_start();

// database connection
include('config.php');

$added = false;
$error = '';

// Add new student registered code

if (isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $stu_address = $_POST['stu_address'];
    $registration_date = $_POST['registration_date'];
    $stu_status = $_POST['stu_status'];


    $insert_data = "INSERT INTO students(f_name, l_name, email,
  dob, gender, phone_number, stu_address, registration_date, stu_status) 
  VALUES ('$f_name', '$l_name', '$email', '$dob', '$gneder',
  '$phone_number', '$stu_address', '$registration_date', '$stu_status')";
    $result = mysqli_query($con, $insert_data);

    if ($result) {
        // after successful insert, redirect to the same page
        header("Location: " . $_SERVER['PHP_SELF'] . "?added=1");
        exit();
    } else {
        $error = "Error inserting data: " . mysqli_error($con);
    }
}
// check if redirected after adding data
if (isset($_GET['added']) && $_GET['added'] == 1) {
    $added = true;
}
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Home page</title>

    <!-- for top arrow -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />


    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/toparrow.css" />
    <!--fav-icon-->
    <link rel="shortcut icon" href="images/favicon.png" />

</head>

<body>

    <!-- adding alert notification  -->
    <?php
    if ($added) {
        echo "
			<div class='btn-success' style='padding: 15px; text-align:center;'>
				Student Reg Data has been Successfully Added.
			</div><br>
		";
    }

    ?>



    <section class="main" style="background-image: url(images/hero-bg.png);">

        <nav>
            <a href="#" class="logo">
                <img src="images/logo.png" width="320px" />
            </a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn">
                <span class="nav-icon"></span>
            </label>
            <ul class="menu" style="border-radius: 5px;">
                <li><a href="readme.html">အသုံးပြုနည်း</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Departments</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">University-Info</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="contact.php">Contact</a></li>



                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                    <!-- Admin user is logged in -->
                    <li style="width:auto; border-radius: 5px; cursor: pointer;"></li>

                    <?php if ($_SESSION["role"] === 'global_admin'): ?>
                        <li><a href="global_admin.php">Global Admin Dashboard</a></li>
                    <?php elseif ($_SESSION["role"] === 'hod_admin'): ?>
                        <li><a href="hod_admin.php">HOD Admin Dashboard</a></li>
                    <?php elseif ($_SESSION["role"] === 'haa_admin'): ?>
                        <li><a href="haa_admin.php">HAA Admin Dashboard</a></li>
                    <?php elseif ($_SESSION["role"] === 'hsa_admin'): ?>
                        <li><a href="hsa_admin.php">HSA Admin Dashboard</a></li>
                    <?php elseif ($_SESSION["role"] === 'teacher_admin'): ?>
                        <li><a href="teacher_admin.php">Teacher Admin Dashboard</a></li>
                    <?php elseif ($_SESSION["role"] === 'fa_admin'): ?>
                        <li><a href="fa_admin.php">FA Admin Dashboard</a></li>
                    <?php endif; ?>

                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- Admin user is not logged in -->
                    <li><a class="active" href="login.php" onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius: 5px; cursor: pointer;">Login</a></li>
                <?php endif; ?>
                </li>
            </ul>
        </nav>


        <!--main-content-->
        <div class="home-content">

            <!--text-->
            <div class="home-text">
                <div class="contain"></div>
                <!-- <h3 style="color: white; letter-spacing: 3px;">Welcome to WYTU</h3> -->
                <h1 style="color: white;"> Student Registration</h1>
                <p style="color: white;">The purpose of WYTU is to prepare students with promise
                    to enhance their intellectual, innovation, physical, social, emotional, spiritual,
                    and technological growth so that they may realize their power for good engineering
                    as citizens</p>
                <a href="new_registration_form.html" class="main-login1" style="border-radius: 5px;">For New Students - Apply
                    Now</a><br>
                <a href="old_registration_form.html" class="main-login2" style="border-radius: 5px;">For Old Students - Apply
                    Now</a>
            </div>
            <!--img-->
            <div class="home-img" style="width: 500px;">
                <img src="images/hero1.png" width="500px" style="text-shadow: 20px 22px;" />
                <marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                    <a href="#" style="color: white; font-size: large;">Addmission open of <em
                            style="color: #160402;"><strong>November</strong></em> in every year.</a>
                </marquee>
            </div>
        </div>

        <!-- arrow -->
        <div class="arrow"></div>
        <span class="scroll">Scroll-me</span>

    </section>


    <!--services----------------------->
    <section class="services">
        <!--heading----------->
        <div class="services-heading">
            <h2>OUR AVAILABLE SPECIALIZED COURSES</h2>
            <p>In WYTU, there are 11 specialized courses in Departments, in there, following are available...</p>
        </div>
        <!--box-container----------------->
        <div class="box-container">
            <!--box-civil-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Civil Engineering</font>
                <p>Civil Engineering Civil Engineering Civil Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box-archi-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Architectural Engineering</font>
                <p>Architectural Engineering Architectural Engineering Architectural Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box-electronics-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Electronics Engineering</font>
                <p>Electronics Engineering Electronics Engineering Electronics Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box-chemical-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Chemical Engineering</font>
                <p>Chemical Engineering Chemical Engineering Chemical Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box- ep-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Electrical Power Engineering</font>
                <p>Electrical Power Engineering Electrical Power Engineering Electrical Power Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
        </div>

        <div class="box-container">
            <!--box-mechanical-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Mechanical Engineering</font>
                <p>Mechanical Engineering Mechanical Engineering Mechanical Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box-agri-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Agricultural Engineering</font>
                <p>Agricultural Engineering Agricultural Engineering Agricultural Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box-ceit-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Computer Science and Information Technology Engineering</font>
                <p>Computer Science and Information Technology Engineering Computer Science and Information Technology
                    Engineering Computer Science and Information Technology Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box-mc-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Mechatronics Engineering</font>
                <p>Mechatronics Engineering Mechatronics Engineering Mechatronics Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
            <!--box-textile-------->
            <div class="box">
                <img src="images/icon5.png">
                <font>Textile Engineering</font>
                <p>Textile Engineering Textile Engineering Textile Engineering
                </p>
                <!--btn--------->
                <a href="#">Details</a>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="box-container col-3">
                <!--box-metrology-------->
                <div class="box">
                    <img src="images/icon5.png">
                    <font>Metrology Engineering</font>
                    <p>Metrology Engineering Metrology Engineering Metrology Engineering
                    </p>
                    <!--btn--------->
                    <a href="#">Details</a>
                </div>
            </div>
        </div>

    </section>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">

                        <!-- New Card Activation Form -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="f_name">First Name</label>
                                <input type="text" class="form-control" id="f_name" name="f_name"
                                    placeholder="Mg Phyu" required>
                            </div>
                            <div class="form-group">
                                <label for="l_name">Last Name</label>
                                <input type="text" class="form-control" id="l_name" name="l_name"
                                    placeholder="Min Lwin" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" placeholder="yyyy-mm-dd" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option selected disabled>Choose...</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">ဖုန်းနံပါတ်</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="09586458758" maxlength="11" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address_state_division">State/Division</label>
                                    <input type="text" class="form-control" id="address_state_division" name="address[state_division]" placeholder="State/Division" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address_district">District</label>
                                    <input type="text" class="form-control" id="address_district" name="address[district]" placeholder="District" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address_township">Township</label>
                                    <input type="text" class="form-control" id="address_township" name="address[township]" placeholder="Township" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address_quarter_village">Quarter/Village</label>
                                    <input type="text" class="form-control" id="address_quarter_village" name="address[quarter_village]" placeholder="Quarter/Village" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_street">Street</label>
                                <input type="text" class="form-control" id="address_street" name="address[street]" placeholder="Street" required>
                            </div>

                        </div>
                </div>

                <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top" aria-label="Back to top" title="Back to top">
        <span class="material-icons" aria-hidden="true">arrow_upward</span>
    </a>


    </div>



    <!--footer------------->
    <footer>
        <p>Copyright (C) - <span id="year"></span> | Developed By <a href="#">e-Service (Group-1) </a> </p>
    </footer>


    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        /* for copyright footer - date */
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>


    <script src="js/toparrow.js"></script>

    <script src="js/text.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>