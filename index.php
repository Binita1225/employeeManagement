
<?php
    require 'includes/database.php';
    require 'includes/validate.php';
   
    $conn=getDB();// database connection 

    
    $name='';
    $contact='';
    $address='';
    $position='';
    $salary='';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['name'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $position=$_POST['position'];
        $salary=$_POST['salary'];
        
       
        $error=validateRecord($name,$contact,$address, $position, $salary);
        if(empty($error)){
            $conn=getDB();
            $sql="INSERT INTO records(emp_name, contact, emp_address, position, salary) VALUES(?,?,?,?,?)";//?is a placeholder for record item
            $stmt=mysqli_prepare($conn,$sql);
            if($stmt===false){
                echo mysqli_error($conn);

            }else{
                mysqli_stmt_bind_param($stmt,"ssssi",$name,$contact,$address, $position, $salary);
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
<h2>New Record</h2>
<?php require 'includes/form.php';?>
<a href="display.php">Generate Details</a>
<a href="editRecord.php">Edit</a>
<a href="deleteRecord.php">Delete</a>
<?php require 'includes/footer.php'; ?>