<?php

include_once '../auth.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$full_name=$_POST["full_name"];
$specialty=$_POST["specialty"];
$email=$_POST["email"];
$address=$_POST["address"];
$ssc=$_POST["ssc"];
$hsc=$_POST["hsc"];
$bs=$_POST["bs"];
$school=$_POST["school"];
$college=$_POST["college"];
$university=$_POST["university"];
$experience=$_POST["experience"];
$skill1=$_POST["skill1"];
$skill1_per=$_POST["skill1_per"];
$skill2=$_POST["skill2"];
$skill2_per=$_POST["skill2_per"];
$skill3=$_POST["skill3"];
$skill3_per=$_POST["skill3_per"];
$interests=$_POST["interests"];
$password=md5($_POST["password"]);
//$myfile=$_POST["myfile"];

$sql = "INSERT INTO `admin` (`name`, `pass`, `specialty`)
VALUES ('$full_name', '$password', '$specialty')";
/*INSERT INTO `contact` (`email`, `address`)
VALUES ('$email', '$address');
INSERT INTO `education` (`ssc`, `hsc`, `bs`)
VALUES ($ssc, $hsc, $bs);
INSERT INTO `experience` (`info`)
VALUES ('$experience');
INSERT INTO `interests` (`interest_name`)
VALUES ('$interests')";
*/
if ($conn->query($sql) === TRUE) {
  $id = $conn->insert_id;
  $sql = "INSERT INTO `contact` (`id`, `email`, `address`)
  VALUES ($id ,'$email', '$address')";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO `education` (`id`, `ssc`, `hsc`, `bs`, `school`, `college`, `university`)
  VALUES ($id, $ssc, $hsc, $bs, '$school', '$college', '$university')";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO `experience` (`id`, `info`, `skill1`, `skill1_per`, `skill2`, `skill2_per`, `skill3`, `skill3_per`)
  VALUES ($id, '$experience', '$skill1', $skill1_per, '$skill2', $skill2_per, '$skill3', $skill3_per )";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO `interests` (`id`, `interest_name`)
  VALUES ($id, '$interests')";
  mysqli_query($conn, $sql);
  
  // $filename = $_FILES['myfile']['name'];
  // // destination of the file on the server
  // $destination = 'uploads/' . $filename;
  // // get the file extension
  // $extension = pathinfo($filename, PATHINFO_EXTENSION);
  // // the physical file on a temporary uploads directory on the server
  // $file = $_FILES['myfile']['tmp_name'];
  // $size = $_FILES['myfile']['size'];
  // if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
  //     echo "You file extension must be .zip, .pdf or .docx";
  // } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
  //     echo "File too large!";
  // } else {
  //     // move the uploaded (temporary) file to the specified destination
  //     if (move_uploaded_file($file, $destination)) {
  //         $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
  //         if (mysqli_query($conn, $sql)) {
  //             echo "File uploaded successfully";
  //         }
  //     } else {
  //         echo "Failed to upload file.";
  //     }
  //   }
  
  
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 