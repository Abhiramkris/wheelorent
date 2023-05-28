<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=.8">
  <style>
	body {
    background-color: #777f8d;
    background-image: 
        radial-gradient(at 47% 33%, hsl(162.00, 77%, 40%) 0, transparent 59%);
		overflow: hidden;
}
    .container {
      display: flex;
      flex-wrap: wrap;
	  width: 500px;
margin-left:auto;
margin-right:auto;
margin-top: 27vh;
    }

    .left-container {
      flex: 1;
      background-image: url('https://lh3.googleusercontent.com/drive-viewer/AFGJ81rxJOXrLhHBzu4oNNGpriOtBZit5d0S_FnKV8s_6dm69OsDziMgVs09-MItdF802osN_36r6-8As1FMhF5CbUt1Zz53DQ=s1600');
      object-fit: contain;
	  max-width: 15 0px;
	  
    }

    .right-container {
      flex: 1;
      padding: 20px;
	  width: 30vw;
	  backdrop-filter: blur(10px) saturate(100%);
    -webkit-backdrop-filter: blur(6px) saturate(100%);
    background-color: rgba(17, 25, 40, 0.49);
    border: 5px solid rgba(255, 255, 255, 0.125);
	}
    form {
      display: flex;
      flex-direction: column;
	  color: white;
    }

    input[type="text"], input[type="password"] {
		font-weight: 900;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 5px;
      border: none;
	  color: #001030;
	
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
	  margin-top: 20px;
      cursor: pointer;
    }
	.hello
	{
		font-size: 50px;
	}
	.link
	{
		text-decoration: none;
		color: whitesmoke;
font-size: 13px;
margin-top: 7px;
	}
	h3{
		font-weight: 40;
		font-size: 18px;
		color: white;
	}
  </style>
</head>
<body>
  <div class="container">
    <div class="left-container"></div>
    <div class="right-container">
		<h3><span class="hello">Hello</span><br>login to continue elite riding with wheelorent</h3><br><br>
      <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="user_name">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Submit">
		<a class="link" href="signup.php">sign up</a>
      </form>
    </div>
  </div>
</body>
</html>
