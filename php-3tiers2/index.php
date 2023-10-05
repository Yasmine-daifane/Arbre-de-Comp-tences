<?php 
 require_once ('loader.php') ;

 $studentBlo = new StudentBLO();
 $all_students_html = '';
 $all_students = $studentBlo->GetAllStudents();


 $studentBllObj = new StudentBLO();
 $deleteSuccess = false ;
 $errorMessage ='' ;

 if (isset($_REQUEST['delete']) && $_REQUEST ['delete'] =='yes') {

    $studentId =(int)$_REQUEST['id'] ;
    $deleteResult =$studentBllObj -> DeleteStudent($studentId) ;

     if ($deleteResult>0) {
        $deleteSuccess =true ;
     }else{
        if ($studentBllObj->errorMessage !='') {
            $errorMessage =$studentBllObj -> errorMessage ;

        }else {
            $errorMessage='Record can\'t be deleted .operation failed .';
        }
     }
 }
  

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="This is a simple implementation of OOP in PHP. This application is created for educational purpose." />
    <meta name="author" content="Arif Uddin" />

    <!-- Bootstrap -->
    <link href="Assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet" />

    <!-- css -->
    <link href="Assets/Styles/Styles.css" rel="stylesheet" />
    <title>List of Students</title>
</head>