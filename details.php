<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){
		$id_to_delete = mysqli_real_escape_string($connect, $_POST['id_to_delete']);

		$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

		if(mysqli_query($connect, $sql)) {
			// success
			header('Location: index.php');
		} {
			// failure
			echo 'query error: ' . mysqli_error($connect);
		}
	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($connect, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM pizzas WHERE id = $id";

		// get the query result
		$result = mysqli_query($connect, $sql);

		// fetch result in array format
		$pizza = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($connect);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<div class="container center">
		<?php if($pizza): ?>
			<h4><?php echo $pizza['title']; ?></h4>
			<p>Created by <?php echo $pizza['email']; ?></p>
			<p><?php echo date($pizza['created_at']); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo $pizza['ingredients']; ?></p>

			<!-- DELETE FORM -->
			 <form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
				<input type="submit" name="delete" value="DELETE" class="btn brand z-depth-0">
			 </form>
		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>