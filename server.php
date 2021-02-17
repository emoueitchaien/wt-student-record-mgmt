<?php 
	session_start();
	// $message = "";
	$db = mysqli_connect('localhost', 'root', '', 'wt_crud');

	// initialize variables
	$id = 0;
	$name = "";
	$roll_no = 0;
	$faculty = "";
	$batch = 0;
	$dob = "";
	$address = "";
	$email = "";
	$phone = 0;
	$update = false;

	if(isset($_POST['submit'])) {
		$user = mysqli_real_escape_string($db, $_POST['username']);
		$pass = mysqli_real_escape_string($db, $_POST['password1']);

		if($user == "" || $pass == "") {
			echo "Either username or password field is empty.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		} 
		else {
			$result = mysqli_query($db, "SELECT * FROM register WHERE username = '$user' AND password1 = '$pass' ")
						or die("Could not execute the select query.");
			
			$row = mysqli_fetch_assoc($result);
			
			if(is_array($row) && !empty($row)) {
				$_SESSION["id"] = $row['id'];
				$_SESSION["username"] = $row['username'];
			} else {
				echo "Invalid username or password.";
				echo "<br/>";
				echo "<a href='login.php'>Go back</a>";
			}

			if(isset($_SESSION["id"])) {
				header("Location: student.php");			
			}
		}
	}

	if (isset($_POST['save'])) {

		$name = $_POST['name'];
		$roll_no = $_POST['roll_no'];
		$faculty = $_POST['faculty'];
		$batch = $_POST['batch'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		mysqli_query($db, 
			"INSERT INTO students (name, roll_no, faculty, batch, dob, address, email, phone) 
			VALUES ('$name', '$roll_no', '$faculty', '$batch', '$dob', '$address', '$email', '$phone')"
		); 

		$_SESSION['message'] = "Record saved"; 
		header('location: student.php');
	}

	if (isset($_POST['update'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$roll_no = $_POST['roll_no'];
		$faculty = $_POST['faculty'];
		$batch = $_POST['batch'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		mysqli_query($db, "UPDATE students SET name='$name', roll_no='$roll_no', faculty='$faculty', batch='$batch',
			dob='$dob', address='$address', email='$email', phone='$phone' WHERE id=$id"
		);

		$_SESSION['message'] = "Record updated!"; 
		header('location: student.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM students WHERE id=$id");
		$_SESSION['message'] = "Record deleted!"; 
		header('location: student.php');
	}
?>