<?php
include_once 'model/db.php';
login_page_session_check();
?>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Aretha Infotech</title>
            <!-- Google Fonts -->
            <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
            <!-- <link rel="stylesheet" href="css/animate1.css"> -->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
            <!-- Custom Stylesheet -->
            <link rel="stylesheet" href="css/style.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        </head>
        <body>
            <div class="container">
                <div class="top">
                    <h1 id="title" class="hidden"><span id="logo">Aretha Infotech</span></h1>
                </div>
                <?php
            		if (isset($_GET['status'])) {
            			   if ($_GET['status'] == "nouser") {
            			    echo "<div class='error fadeOut animated' ><strong>Username/Password</strong> Incorrect.</div>";
            			}elseif ($_GET['status'] == "forget") {
            			    echo "<div class='error fadeOut animated' ><strong>Mail id Incorrect</strong> Something went wrong.</div>";
            			}elseif ($_GET['status'] == "forget_success") {
            			    echo "<div class='error fadeOut animated' ><strong>Reset password</strong> has been sended.</div>";
            			}
            		}
	            ?>
                    <div class="login-box animated fadeInUp">
                        <form id="login_form" action="controller/login_controller.php">
                            <div class="box-header">
                                <h2>Log In</h2>
                            </div>
                            <!-- <div class="error"></div> -->
                            <label for="username">Username</label>
                            <br/>
                            <input type="text" id="username" name="uname">
                            <br/>
                            <label for="password">Password</label>
                            <br/>
                            <input type="password" id="password" name="upassword">
                            <br/>
                            <button type="submit">Log In</button>
                            <br/>
                            <a id="forgot">
                                <p class="small">Forgot password?</p>
                            </a>
                        </form>
                        <form id="forgot_password" action="controller/forget_password.php">
                            <div class="box-header">
                                <h2>Forget Password</h2>
                            </div>
                            <label for="emailid">Email id</label>
                            <br/>
                            <input type="email" id="email" name="mailid">
                            <br/>
                            <button type="submit">Get the password</button>
                            <br/>
                            <a id="back_to">
                                <p class="small">Back to Login</p>
                            </a>
                        </form>
                    </div>
            </div>
        </body>
        <script>
        $(document).ready(function() {
            $('#forgot_password').hide();
            $('#logo').addClass('animated fadeInDown');
            $("input:text:visible:first").focus();
            $('#forgot').click(function() {
                $('#login_form').hide();
                $('#forgot_password').show();
            });
            $('#back_to').click(function() {
                $('#login_form').show();
                $('#forgot_password').hide();
            });
        });
        $('#username').focus(function() {
            $('label[for="username"]').addClass('selected');
        });
        $('#username').blur(function() {
            $('label[for="username"]').removeClass('selected');
        });
        $('#password').focus(function() {
            $('label[for="password"]').addClass('selected');
        });
        $('#password').blur(function() {
            $('label[for="password"]').removeClass('selected');
        });
        </script>

        </html>