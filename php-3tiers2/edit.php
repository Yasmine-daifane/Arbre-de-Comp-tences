<?php 

require_once ('loader.php')

$addSuccess = false;
$updateSuccess = false ;
$errorMessage ='' ; 

if(isset($_POST['studentSubmitButton']) && $_POST ['studentSubmitButton'] == 'Update Student ') {
   
    $studentBllObj = new StudentBLO() ;
    $studentId = $_POST['studentId'] ;
    $studentName = $_POST['studentName'] ;
    $studentEmail = $_POST['studentDteOfBirth'] ;
    $aStudent = new Student ($studentId , $studentName ,$studentEmail ,$studentBllObj) ;
    $updateResult = $studentBllObj -> UpdateStudent ($aStudent) ;

    if ($updateResult >0){
        $updateSuccess =true ;

    }else {
        if ($studentBllObj -> errorMessage !='') {
            $errorMessage =$studentBllObj -> errorMessage ;
        } else {
            $errorMessage ='Record can\'t be Updated .operation failed  . ';
        }
    }


}elseif (isset($_GET['id'])&&(int)$_GET['id']>0) {
    $studentId =(int)$_GET['id'] ;
    $action ='' ;
    if(isset($_GET['action'])){
        $action =$_GET ['action'] ;

    }
    $studentBllObj= new StudentBLO() ;
    $aStudent = $studentBllObj ->GetStudent($studentId) ;

    if($action == 'add') {
        $addSuccess =true ;
    }
}else {
    header ("Location :index.php") ;

}

$pageTitle = "Edit Student" ;
include_once("Templates/header.php") ;

?>

<div class="page-header" >
    <h1>Edit Student </h1>
</div>


<?php if($addSuccess === true ): ?>
    <div class ="alert alert-success