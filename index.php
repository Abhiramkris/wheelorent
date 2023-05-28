<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// collect value of input field
	$name = $_POST['date_end'];
	if (empty($name)) {
	  echo "Name is empty";
	} else {
		$timestamp=$_POST['date_end'];
		$date_end_cal = date('d', strtotime($timestamp));
		$timestamp=$_POST['date_start'];
		$date_start_cal = date('d', strtotime($timestamp));
		if ($date_end_cal>$date_start_cal)
		{
		$hours=$date_end_cal-$date_start_cal;
		echo $hours;
		}
		else 
		echo "sorry be right with your dates";
	}
  }

// logout car casarol admin payment true?
// action make s run php onativation
?>

<!DOCTYPE html>
<html>

<head>
	<title>My website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
	*{
		margin: 0;
		padding: 0;
	}
	body
	{
	
	}
	.btn {
		margin-left: 70vw;
		height: 40px;
		background-image: linear-gradient(to right, #EB3349 0%, #F45C43 51%, #EB3349 100%);
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		border-radius: 10px;
		display: block;
		color: white;
		padding: 10px 20px;
		border-radius: 35px;
		border: none;
		margin-top: 10px;
		cursor: pointer;
	}

	.btn:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
	}

	.profile {
		width: 45px;
		height: 45px;
		margin-left: 4vw;
		margin-top: 8px;

	}
	.nav
	{
		display: flex;
		flex-direction: row;
		border: black 7px;
		position: fixed;
		background-color: rgba(179, 54, 9, 0.39);
    backdrop-filter: blur(4px);
	height: 60px;
	width: 100%;
	}
</style>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
	<div class="nav">
		<input type="submit" value="logout" onclick="window.location='logout.php';" class="btn"><br><br>
		<img class="profile"
			src="data:image/png;base64,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">
		</div>
 		<br><br><br><br>
		Hello,
		<?php echo $user_data['user_name']; ?>
		
<form method="POST">
  <label for="date">Start:</label>
  <script>var today = new Date().toISOString().split('T')[0]; document.getElementsByName("setTodaysDate")[0].setAttribute('min', date_start);</script>
  <input type="date" id="date_start" name="date_start">
  <label for="date">End:</label>
  <input type="date" id="date_end" name="date_end">
  <input type="submit">
</form>


</body>
<script type="text/javascript">
	$(document).ready(function () {
		history.pushState({ page: 1 }, "title 1", "#nbb");
		window.onhashchange = function (event) {
			window.location.hash = "nbb";
		};
	});
</script>

</html>