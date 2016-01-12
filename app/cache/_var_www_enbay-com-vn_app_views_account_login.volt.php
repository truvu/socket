<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title> Login Page </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/asset/css/account.css"/>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container"></div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6" style="float:none;margin-left: auto; margin-right: auto;">
                    
<form action="/account/login" method="POST" name="account_login" role="form">
	<div class="form-group">
		<input type="text" name="email" class="form-control" placeholder="Email or username" value="<?php echo $email; ?>"/>
		<div class="error" for="email"><?php echo $error['email']; ?></div>
	</div>
    <div class="form-group">
    	<input type="password" name="pass" class="form-control" placeholder="Your password" />
		<div class="error" for="pass"><?php echo $error['pass']; ?></div>
    </div>
    <div class="clearfix">
    	<div class="pull-left">
    		<label for="remember">
    			<input type="checkbox" value="1" name="remember">
    		 	<span>Remember me</span>
    		</label>
    	</div>
    	<div class="pull-right">
    		<input type="submit" name="login" class="btn btn-primary" value="Login"/>
    	</div>
    </div>
</form>

                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/asset/js/account.js"></script>
    </body>
</html>