<?php 
	if(!is_dir('database'))
		mkdir('database');
	if(!file_exists('upload.php'))
		file_put_contents('upload.php', '<?php ?>');
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
       .container {
           width: 400px;
       }
   </style>
</head>
<body style="padding-top: 3rem;">
 
<div class="container">
	<?php
		require "db.php";
		require "upload.php";

		$counter = 0;
		if(!empty($_POST))
		{
			foreach($_POST as $key=>$value) 
			{
				if(strlen($value)==0 || !isset($_POST['gender'])) 
				{
					echo "<h3 style='color: red'>Invalid data</h3>";
					break;
				}
				$counter++;
			}
			
			
			if($counter == 3)
			{
				$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				if($filePath == '')
					$filePath = 'public/images/путин.PNG';
				echo "User name ".$name."</br>";
				echo "Email ".$email."</br>";
				echo "Gender ".$gender."</br>";
				echo "filePath ".$filePath."</br>";
				
				$sql = "INSERT INTO users (email, name, gender, password, path_to_img)
							VALUES ('$email', '$name','$gender', '11111', '$filePath')";
				echo $sql;
				$res = mysqli_query($conn, $sql);
				if ($res) {
				   $valid = true;
				}

				
				/*if(file_exists('table.php'))
				{
					$user;
					$users;
					$arr = explode("\n", file_get_contents('database/users.csv'));
					for($i = 0; $i < count($arr)-1; $i++)
					{
						$user = explode(",", $arr[$i]);
						if($user[3] ==' ')
							$user[3] = "public/images/путин.PNG";
						$users[] = 
						[
							'name' => $user[0],
							'email' => $user[1],
							'gender' => $user[2],
							'image' => $user[3]
						];
					}
					$str = "<?php ";
					for($i = 0; $i < count($users); $i++)	
						$str = $str."echo \"".$users[$i]['name']." ".$users[$i]['email']." ".$users[$i]['gender'].""."<img src='".$users[$i]['image']."'width='200' height='200'><br><hr>\";";
					$str = $str."?>";
					file_put_contents('table.php', $str);
					echo "\n\n";
				}*/
			}
		}else
			echo "jopa";
		

    ?>
	
   <hr>
   <a class="btn" href="adduser.php">return back</a>
   <a class="btn" href="table.php">view list</a>
</div>
</body>
</html>