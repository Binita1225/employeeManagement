<?php
require 'includes/database.php';
require 'includes/validate.php';

$conn=getDB();
if (isset($_GET['id'])) {
    $record=getRecord($conn, $_GET['id']);
    // it takes values from database
    if ($record) {
        $id=$record['id'];
        //database bata lerako vayara we need id here
       
        $name=$record['emp_name'];
        $contact=$record['contact'];
        $address=$record['emp_address'];
        $position=$record['position'];
        $salary=$record['salary'];

    }
    else{
        die("Record  not found");
        // die generate message and then terminate it
    }
}else{
    die("ID not supplied, Record not found");
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];

    $errors=validateRecord($name,$contact,$address, $position, $salary);
    if(empty($errors)){
        $conn=getDB();
        $sql="UPDATE records SET emp_name=?, contact=?, emp_address=?, position=?, salary=? WHERE id=? ";//?is a placeholder for record item
        $stmt=mysqli_prepare($conn,$sql);
        if($stmt===false){
            echo mysqli_error($conn);

        }else{
            mysqli_stmt_bind_param($stmt,"ssssii",$name,$contact,$address, $position, $salary, $id);
            // here ss is to pass string values and i is to pass integer values
            if(mysqli_stmt_execute($stmt)){
                $id=mysqli_insert_id($conn);
               
                // echo "Inserted record with id:$id";
            }    
            else{
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}

?>
<?php require 'includes/header.php'; ?>
<h2>Edit Record</h2>
<?php require 'includes/form.php';?>
<?php require 'includes/footer.php'; ?>