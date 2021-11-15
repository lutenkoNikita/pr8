<?php
require 'db.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $users[] = [
           'name' => $row['name'],
           'email' => $row['email'],
           'gender' => $row['gender'],
           'path'=>$row['path_to_img']
       ];
   }
}
for($i = 0; $i < count($users); $i++)
	echo $users[$i]['name']." ".$users[$i]['email']." ".$users[$i]['gender']." ".$users[$i]['path']."<br>";
?>