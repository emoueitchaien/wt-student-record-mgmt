<?php  include('server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];

		// echo $id . gettype($id);

		$update = true;

		$record = mysqli_query($db, "SELECT * FROM students WHERE id=$id");

		// echo gettype($record);

		// if (!$record){
		// 	printf("Error: %s\n", mysqli_error($db));
		// 	exit();
		// }

		// printf(count(mysqli_fetch_array($record)));

		// if (count(mysqli_fetch_array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$roll_no = $n['roll_no'];
			$faculty = $n['faculty'];
			$batch = $n['batch'];
			$dob = $n['dob'];
			$address = $n['address'];
			$email = $n['email'];
			$phone = $n['phone'];
		// }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>


	<?php $results = mysqli_query($db, "SELECT * FROM students"); ?>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Roll No.</th>
				<th>Faculty</th>
				<th>Batch</th>
				<th>D.O.B.</th>
				<th>Address</th>
				<th>Email</th>
				<th>Phone</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['roll_no']; ?></td>
				<td><?php echo $row['faculty']; ?></td>
				<td><?php echo $row['batch']; ?></td>
				<td><?php echo $row['dob']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
				</td>
				<td>
					<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Roll No.</label>
			<input type="text" name="roll_no" value="<?php $roll_no==0 ? printf("") : printf($roll_no); ?>">
		</div>
		<div class="input-group">
			<label>Faculty</label>
			<input type="text" name="faculty" value="<?php echo $faculty; ?>">
		</div>
		<div class="input-group">
			<label>Batch</label>
			<input type="text" name="batch" value="<?php $batch==0 ? printf("") : printf($batch); ?>">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="dob" value="<?php echo $date; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Phone</label>
			<input type="text" name="phone" value="<?php $phone==0 ? printf("") : printf($phone); ?>">
		</div>
		<div class="input-group">
			<!-- <button class="btn" type="submit" name="save" >Save</button> -->
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>