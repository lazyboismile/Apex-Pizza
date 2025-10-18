<?php

    // connect to db
    $connect = mysqli_connect('localhost', 'tonny', 'apexpizza', 'apex_pizza');

    if(!$connect) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // write query for all pizzas
	$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($connect, $sql);

	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($connect);

	print_r($pizzas);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <?php include('templates/footer.php'); ?>
    
</body>
</html>