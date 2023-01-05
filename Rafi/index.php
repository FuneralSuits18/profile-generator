<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
<?php 
    include_once '../auth.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    // session_start();
    // $id=$_SESSION['id'];
    $id=$_GET["user_id"];
    $sql = "SELECT `admin`.`id`, `name`, `specialty`, `email`, `address`, `ssc`, `hsc`, `bs`, `school`, `college`, `university`, `info`, `skill1`, `skill1_per`, `skill2`, `skill2_per`, `skill3`, `skill3_per`, `interest_name` FROM `admin` JOIN `contact` ON (`admin`.`id`=`contact`.`id` AND `admin`.`id`=$id) JOIN `education` ON (`admin`.`id`=`education`.`id`) JOIN `experience` ON (`admin`.`id`=`experience`.`id`) JOIN `interests` ON (`admin`.`id`=`interests`.`id`)";
    $result=mysqli_query($conn, $sql);
    $result=$result->fetch_assoc();
?>
    <div class="intro">
        <div class="title">
            <h1>Hi<br>I'm <?php echo $result["name"];?></h1>
            <p><?php echo $result["specialty"];?></p>
        </div>
        <img src="pro-pic.jpg" alt="">
    </div>

    <div class="resume">
        <h3>My Education</h3>
        <ul>
            <li>
                <span></span>
                <h4>Secondary School Certificate(SSC) GPA: <?php echo $result["ssc"];?></h4>
                <p><?php echo $result["school"];?></p>
            </li>
            <li>
                <span></span>
                <h4>Higher Secondary School Certificate (HSC) GPA: <?php echo $result["hsc"];?></h4>
                <p><?php echo $result["college"];?></p>
            </li>
            <li>
                <span></span>
                <h4>BS in Computer Science and Engineering CGPA: <?php echo $result["bs"];?></h4>
                <p><?php echo $result["university"];?></p>
            </li>
        </ul>
    </div>

    <div class="skill-section">
        <h3>Skills</h3>

        <div class="what"><p><?php echo $result["skill1"];?></p></div>
        <div class="skill-container">
            <div class="skill s1 load"><span><p><?php echo $result["skill1_per"];?></p>%</span></div>
        </div>
        <div class="what"><p><?php echo $result["skill2"];?></p></div>
        <div class="skill-container">
            <div class="skill s2 load"><span><?php echo $result["skill2_per"];?>%</span></div>
        </div>
        <div class="what"><p><?php echo $result["skill3"];?></p></div>
        <div class="skill-container">
            <div class="skill s3 load"><span><?php echo $result["skill3_per"];?>%</span></div>
        </div>
    </div>

    <!-- <div class="resume">
        <h3>Accomplishments</h3>
        <ul>
            <li>
                <span></span>
                <h4>Junior Board Scholarship – Class 8</h4>
                <p>Oct 2010</p>
                <p>Mymensingh Zilla School, Mymensingh, Bangladesh</p>
            </li>
            <li>
                <span></span>
                <h4>Secondary Board Scholarship – Class 10</h4>
                <p>February 2013</p>
                <p>Mymensingh Zilla School, Mymensingh, Bangladesh</p>
            </li>
        </ul>
    </div> -->

    <div class="resume">
        <h3>Experiences</h3>
        <ul>
            <li>
                <span></span>
                <p><?php echo $result["info"];?></p>
            </li>
            
        </ul>
    </div>

    <div class="contactus" id=contactus>
        <h3>Contact Me</h3>
        <br></br>

        <ul>
            
            <span></span>
                <h4><?php echo $result["email"];?></h4>
            <br></br>
            
            <span></span>
                <h4><?php echo $result["address"];?></h4>
            
            
        </ul>

    </div>

    <!-- <div class="resume">
        <h3>Download CV</h3>
        <ul>
            <li>
            <?php include '../file-upload-download/filesLogic.php';?>
            <?php echo $file['downloads']; ?>
            <a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download</a>
            </li>
            
        </ul>
    </div> -->

    
</body>

</html>



<!-- $sql = "SELECT `admin`.`id`, `name`, `specialty`, `email`, `address`, `ssc`, `hsc`, `bs`, `school`, `college`, `university`, `info`, `skill1`, `skill1_per`, `skill2`, `skill2_per`, `skill3`, `skill3_per`, `files`.`name`, `size`, `interest_name` FROM `admin` JOIN `contact` ON (`admin`.`id`=`contact`.`id` AND `admin`.`id`=$id) JOIN `education` ON (`admin`.`id`=`education`.`id`) JOIN `experience` ON (`admin`.`id`=`experience`.`id`) JOIN `interests` ON (`admin`.`id`=`interests`.`id`) JOIN `files` ON (`admin`.`id`=`files`.`id`)"; -->

