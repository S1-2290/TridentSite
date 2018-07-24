<!DOCTYPE html>
<html lang="en">
<?php
global $itr_value_start_default;
global $x_access;
global $os;

/* Function to log site info */
function log_site_info($itr_value) {
    $x_access = $_GET['x'];
    // Check secret X
    if ($x_access == "" || strpos($x_access, "51l3nt_4cc355") != true) {
        // Empty
    }
    else if ($x_access == "51l3nt_4cc355") {
        header("Location:http://127.0.0.1/.main/s1/s1_main.php");
    }

    // Get os details
    $os = php_uname('a');

    // Get ITR details
    if ($itr_value != 0 && $itr_value < 20000 && $itr_value != 0) {
        $itr = $itr_value;
    }
    else {
        $itr_value_start_default = 10;
        $itr = $itr_value_start_default;
    }

    // Log the details
    $file = fopen('site_data.txt', 'a+') or die("<h1>Unable to open file: $file</h1>");
    fwrite($file, "DATA: $os - $itr\n");
    fclose($file);
}

log_site_info($_GET['itr']);
?>
<head>
    <title>Trident Project</title>
    <!-- Set the sites main .css file -->
    <link rel="stylesheet" href="site/web_global/css/main.css"/>
    <link rel="icon" href="content/icons/trident.png"/>
    <script src=".x.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>             <!-- Main HTML header tag -- Defines -->
<!-- HTML main body tag -- Navbar, Modal -->
<body background="content/backgrounds/trident-background-main.jpg" bg-properties="fixed">
<nav class="navbar navbar-inverse">
    <style>
        .navbar {
            position: fixed;
            top: 0px;
            width: 100%;
            font-family: SansationLight;
        }
    </style>
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Trident</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Site <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://127.0.0.1/site/about.php">About</a></li>
                    <li><a href="http://127.0.0.1/site/download.php">Download</a></li>
                    <li><a href="http://127.0.0.1/site/docs.php">Docs</a></li>
                </ul>
            </li>
            <li><a href="#">Extra</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registerModal"><span class="glyphicon glyphicon-user"></span> Sign Up</button>
            <style>
                .btn-lg {
                    font-family: SansationLight;
                    background: black;
                }
            </style>
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</button>
        </ul>
    </div>
</nav>      <!-- Main nav bar -->
<div class="container">
    <style>
        .container {
            border-radius: 15px;
        }
    </style>
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="registerModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <style>
                            .close {
                                color: white;
                            }
                        </style>
                        &times;
                    </button>
                    <h4 class="modal-title">Sign Up</h4>

                </div>
                <div class="modal-body">
                    <div class="div_main">
                        <form action="site/register.php" method="post">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="firstname" placeholder="Your first name...">
                            <label for="user_name">Username:</label>
                            <input type="text" id="user_name" name="user" placeholder="Enter a(n) username...">
                            <label for="email_input">Email:</label>
                            <input type="text" id="email_input" name="emailinput" placeholder="Enter your email...">
                            <label for="password_input">  Password:</label>
                            <input type="password" id="password_input" name="passwordInput" placeholder="Enter your password...">
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <style>
                            .btn-default {
                                border-radius: 20px;
                                background: #4c4c4c;
                                color: lightgray;
                                box-shadow: 0 0 0 0 rgba(232, 76, 61, 0.7);
                            }

                            @-webkit-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
                            @-moz-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
                            @-ms-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
                            @keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}

                            .btn-default:hover {
                                background: gray;
                                -webkit-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                                -moz-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                                -ms-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                                animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                            }

                        </style>
                        Close
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>                  <!-- Main modal -- for registrations -->
<div class="container">
    <style>
        .container {
            border-radius: 15px;
        }
    </style>
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <style>
                            .close {
                                color: white;
                            }
                        </style>
                        &times;
                    </button>
                    <h4 class="modal-title">Sign Up</h4>

                </div>
                <div class="modal-body">
                    <div class="div_main">
                        <form action="site/login.php">
                            <label for="user_name">Username:</label>
                            <input type="text" id="user_name" name="username" placeholder="Enter your username...">
                            <label for="password_input">Password:</label>
                            <input type="password" id="password_input" name="password" placeholder="Enter your password..."/>
                            <input type="submit" value="Login" />
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <style>
                            .btn-default {
                                border-radius: 20px;
                                background: #4c4c4c;
                                color: lightgray;
                                box-shadow: 0 0 0 0 rgba(232, 76, 61, 0.7);
                            }

                            @-webkit-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
                            @-moz-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
                            @-ms-keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}
                            @keyframes pulse {to {box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);}}

                            .btn-default:hover {
                                background: gray;
                                -webkit-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                                -moz-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                                -ms-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                                animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
                            }

                        </style>
                        Close
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>                  <!-- Main modal -- for logins -->


</body>    <!-- Main body tag 01 -->
</html>