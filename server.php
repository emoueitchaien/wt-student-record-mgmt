<?php 
	session_start();
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
		header('location: index.php');
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
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM students WHERE id=$id");
		$_SESSION['message'] = "Record deleted!"; 
		header('location: index.php');
	}