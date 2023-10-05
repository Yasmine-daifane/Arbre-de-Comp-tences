<?php

// ========= Here we have all the business logic code. It acts as an intermediary between the Presentation and Data Access Layer =========

class StudentBLO {

private $studentDao ;
public $errorMessage ;

public function __construct() {
    $this->studentDao = new StudentDAo();
}

public function GetAllStudents (){

    return $this-> studentDao-> GetAllStudents();

}
public function GetStudent($studentId) {
    return $this ->studentDao->GetStudent($studentId) ;

}
public function AddStudent($student) {
    $insertedId =0 ;
    if ($this ->IsValidStudent($student)) {
        $insertedId = (int) $this->studentDao->AddStudent($student) ;
    }
    return $insertedId ; 
}



public function UpdateStudent($student) {

    $affectedRows = 0;

    if($student->GetName() == '' || $student->GetEmail() == '') {
        $this->errorMessage = 'Student Name, Roll and Email is required.';
        return $affectedRows;
    }

    if( $this->IsValidStudent($student) ) {
        $affectedRows = (int)$this->studentDao->UpdateStudent($student);
    }

    return $affectedRows;
}

public function DeleteStudent($studentId) {
    $affectedRows = 0;
    if ($studentId > 0){
           if($this -> IsIdExists($studentId) ) {
            $affectedRows = (int)$this -> studentDao -> DeleteStudent($studentId) ;

           }else {
            $this -> errorMessge ='Record not found .' ;

           }

    }else {
        $this ->errorMessage = 'Invalid Id .' ;
    }
    return $affectedRows ;
}

public function IsValidStudent($student) {

    if ($this -> IsEmailExists($student -> GetEmail(),$student-> GetId())) {
        $this ->errorMessage = 'Email' . $student ->GetEmail() . 'already exists . try an other one .' ;
        return false ;
    }else {
        return true ; 
    }
}

public function IsIdExists($studentId) {
    return $this -> studentDao -> IsIdExists($id) ;
}

public function IsRollExists($roll , $id ){

    return $this ->studentDao -> IsRollExists($roll,$id) ;
}

 public function  IsEmailExists($email, $id )
 {
    return  $this -> studentDao -> IsEmailExists($email, $id ) ;
 }

}
