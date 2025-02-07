<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109620211-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-109620211-1');
</script>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">

        <title>E Library GA - Log-in</title>
        <script src="<?php echo URL ?>public/jquery2.1.3.min.js"></script>
        <script src='<?php echo URL ?>public/jqueryUI/jquery-ui.js'></script>
        <link rel='stylesheet' href="<?php echo URL ?>public/jqueryUI/jquery-ui.css" />
        <link rel='stylesheet' href="<?php echo URL ?>public/bootstrap/css/bootstrap.css" />

        <link rel="stylesheet" href="<?php echo URL ?>views/index/css/style.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL ?>public/font-awesome/css/font-awesome.css" media="screen" type="text/css" />

    </head>

    <body>

        <div class="login-card">
            <h1 ><img class="image"src="<?php echo URL ?>public/images/eLibrary.jpg"> <br/> Login</h1><br>
            <form>
                <input type="text" name="user" placeholder="Username" title="Matric No">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="login" class="login login-submit btn-primary" value="login">
                <i style="margin: auto"></i>
                <!--<input type="button" name="signup" class="login register-submit btn-warning" value="sign up">-->
                <span class="alert-danger in-pass shownot">Invalid Login details</span>
                <span class="alert-warning up-pass shownot">User id not allow, choose a new one</span>
                <span class="alert-success login-success shownot">Login Successfully</span>
            </form>

            <div class="login-help">
                <div class="fresher" style="text-align: center">
                    Don't have an account?<a href="<?php echo URL ?>index/signup" class="btn btn-link Sign Up">Register!</a>
                </div>
                <!--<a href="#">Register</a> • <a href="#">Forgot Password</a>-->
            </div>
        </div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->



    </body>

    <script>
        $(function () {
            $("form").submit(function (e) {
                e.preventDefault();
            });
            $("form").click(function (e) {
                e.preventDefault();
            });
            $("[name=login], [name=signup]").click(function (e) {
                var whr = "login";
                if ($(this).attr("name") === "login") {
                    whr = "login";
                } else {
                    whr = "signup";
                }
                $.post("http://localhost/ElibraryGA/index/login",
                {
                    usr: $("[name=user]").val(),
                    pwd: $("[name=pass]").val(),
                    whr: whr
                },
                function (data) {
                    if (data === "0") {
                        $(".in-pass").slideDown();
                    } else if (data === "1") {
                        $(".login-success").slideDown();
                        $(location).attr("href","<?php echo URL; ?>dashboard");
                    } else if (data === "2") {
                        $(".up-pass").slideDown();
                    }else{
                        // alert("your lock code is: "+data+" \nmake sure you secure it, this is your real access to your file");
                        $(".login-success").slideDown();
                        $(location).attr("href","<?php echo URL; ?>dashboard");
                    }
                })
                e.preventDefault();
            });

            $(".up-pass, .login-success, .in-pass").mousemove(function () {
                $(this).fadeOut();
            })
        })
    </script>
</html>