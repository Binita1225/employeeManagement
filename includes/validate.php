<?php

function getRecord($conn,$id){
    $sql="SELECT * FROM records WHERE id=?";
    $stmt= mysqli_prepare($conn,$sql);
    if($stmt===false){
        echo mysqli_error($conn);

    }else{
        mysqli_stmt_bind_param($stmt,"i",$id);
        // i means integer value
        if(mysqli_stmt_execute($stmt)){
            $result =mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
    }
}
 function validateRecord($name,$contact,$address, $position, $salary){
    $errors=[];
    if($name==''){
        $errors[]='Name is required';
    }
        if($contact==''){
            $errors[]='Contact is required';
        }
        if($address==''){
            $errors[]='Address is required';
        }
        if($position==''){
            $errors[]='Position is required';
        }
        if($salary==''){
            $errors[]='Salary is required';
        }
        
            
            return $errors;
}
?>