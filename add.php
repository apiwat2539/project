<?php
include "config.php";
?>

<?php
$tId = 1;
if(isset($_POST['submit'])){
    $cNumber = mysqli_real_escape_string($conn,$_POST['cNumber']);
    $cName = mysqli_real_escape_string($conn,$_POST['cName']);
    $cYear = mysqli_real_escape_string($conn,$_POST['cYear']);
    $cTerm = mysqli_real_escape_string($conn,$_POST['cTerm']);
    $cSection = mysqli_real_escape_string($conn,$_POST['cSection']);
    $cPassword = mysqli_real_escape_string($conn,$_POST['cPassword']);
    $cStatus = mysqli_real_escape_string($conn,$_POST['cStatus']);

    $insertSubject = "INSERT INTO subject VALUES (NULL,'$cNumber','$cName','$cYear','$cTerm','$cSection','$cPassword','$cStatus')";
    $retval = mysqli_query($conn,$insertSubject);
		if($retval){

      $lastid = $conn->insert_id;
      $insertSubject = "INSERT INTO subject_has_teacher(`subject_cId`,`teacher_tId`) VALUES ('$lastid','$tId')";
      $result = mysqli_query($conn,$insertSubject);
      if($result){
        echo "<script>alert('บันทึกเรียบร้อย!'); location.href='index.php';</script>";
      }else{
        die('Could not enter data: ' . mysqli_error($conn));
      }
		}else{
		die('Could not enter data: ' . mysqli_error($conn));
		}
	}
?>
