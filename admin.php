
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=.8">
  <title>Password Protected Website</title>
</head>

<body>
  <h1>Admin welcome</h1>
  <p>image car_name registration model_year km rent mileage</p>

  <form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
    
<br>

    <label for="car_name">car_name</label>
    <input type="text" id="car_name" name="car_name">
    <br>

    <label for="registration">registration</label>
    <input type="text" id="resigration" name="resigration">
    <br>

    <label for="model_year">model_year</label>
    <input type="model_year" id="model_year" name="model_year">
    <br>
    <label for="km">km</label>
    <input type="km" id="km" name="km">
    <br>
    <label for="rent">rent</label>
    <input type="rent" id="rent" name="rent">
    <br>

    <label for="mileage">mileage</label>
    <input type="mileage" id="mileage" name="mileage">
    <br>
        Upload a File:
        <input type="file" name="the_file" id="fileToUpload"> <br>
        <input type="submit" name="submit" value="Start Upload">
    </form>
  </body>

</html>






