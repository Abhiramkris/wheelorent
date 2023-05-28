<?php

$currentDirectory = getcwd();
$uploadDirectory = "/uploads/";

$errors = []; // Store errors here

$fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed 

$fileName = $_FILES['the_file']['name'];
$fileSize = $_FILES['the_file']['size'];
$fileTmpName = $_FILES['the_file']['tmp_name'];
$fileType = $_FILES['the_file']['type'];
$fileExtension = strtolower(end(explode('.', $fileName)));

$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

if (isset($_POST['submit'])) {

    if (!in_array($fileExtension, $fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }

    //   try {

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            include("connection.php");
            include("functions.php");
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                //something was posted
                $car_name = $_POST['car_name'];
                $resigration = $_POST['resigration'];
                $model_year = $_POST['model_year'];
                $km = $_POST['km'];
                $rent = $_POST['rent'];
                $mileage = $_POST['mileage'];

                $select = mysqli_query($con, "SELECT * FROM cardetail WHERE pic_name = '$fileName' limit 1 ");

                if ($fileName && mysqli_num_rows($select) < 0) {

                    echo "rename THE PIC NAME";
                    echo " OOPS The file " . basename($fileName) . " has NOT been uploaded";
                    die;

                } else {

                 /////////////////
                 if (!empty($car_name) && is_numeric($model_year) && is_numeric($km) && is_numeric($rent)) {

                    //save to database
                    //add phone number ip adress
                    $car_id = random_num(20);
                    $query = "insert into cardetail (car_id,pic_name,car_name,resigration,model_year,km,rent,mileage) values ('$car_id','upload/$fileName','$car_name','$resigration','$model_year','$km','$rent',$mileage)";

                    mysqli_query($con, $query);
                    echo "The file " . basename($fileName) . " has been uploaded";
                    //	header("Location: login.php");
                    // 	die;

                    die;
                } else {
                    echo "Please enter some valid information!";
                }

                }


            }


        }
    } else {
        echo "An error occurred. Please contact the administrator.";
    }

}
// catch (mysqli_sql_exception $e) {
// echo $e->getMessage();
//   echo "the car name already exists try changing the name of the car";
//}

//}




?>