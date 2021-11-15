<?php
	session_start();
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       body{
           padding-top: 3rem;
       }
       .container {
           width: 400px;
       }
   </style>
</head>
<body>
<div class="container">
   <h3>Login</h3>
   <?php if(!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)):?>
	   <form method="POST" action="auth.php" enctype="multipart/form-data">
		   <div class="row">
			   <div class="field">
				   <label>email: <input type="text" name="email"></label>
			   </div>
		   </div>
		   <div class="row">
			   <div class="field">
				   <label>password: <input type="password" name="password"><br></label>
			   </div>
		   </div>
		   <input type="submit" class="btn" value="Add">
	   </form>
   <?php else: echo "jopa\n";header('Location: logout.php');?>
   <?php endif;?>
</div>
</body>
</html>
