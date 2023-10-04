<?php 

require_once ('loader.php') ;
$errorMessage ='' ;

if(isset ($_POST ['studentSubmitButton'])&& $_POST ['studentSubmitButton'] == 'Add Student ') {

    $studentBllObj =new studentBLO(); 
    $studentName = $_POST ['studentName'];
    $studentRoll = $_POST['studentRoll'] ;
    $studentEmail = $_POST ['studentEmail'] ;
    $studentDateOfBirth = $_POST ['studentDateOfBirth'] ;

    $newStudent = new Student (0,$studentName , $studentEmail ,$studentDateOfBirth) ;
    $addStudentResult = $studentBllObj ->AddStudent ($newStudent) ;

    if ($addStudentResult >0) {
       header ("Location :edit.php?id=" . $addStudentResult . '&action=add');
    }else {
         
        if($studentBllObj -> errorMessage !='') {
            $errorMessage = $studentBllObj ->errorMessage ;
        } else {

            $errorMessage = 'Record can\'t be added . Operation failed .' ;
        }
    }
}

$pageTitle = 'Add New Student ' ;
include_once ("Templates/header.php") ;

?>

<div class="page-header" >
    <h1> Add New Student  </h1> 

</div>

<?php  if($errorMessage !='') :    ?>

    <div class=