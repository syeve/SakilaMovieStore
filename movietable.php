<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    require_once("navbar.php");

    require_once("../../../include.php"); // login info to mysql
    $stmt = $conn->prepare("SELECT film_id, title, release_year, length FROM sakila_film ORDER BY title");
    $stmt->execute();
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Sakila Movie Store</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

	<body>
		<table class='table' id="table">
			<thead>
				<tr>
					<th scope='col'>ID</th>
					<th scope='col'>Title</th>
					<th scope='col'>Year</th>
					<th scope='col'>Length</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
					<tr id = "<?= $row['film_id']; ?>">
						<td><p id="id" href=""><?php echo htmlspecialchars($row['film_id']); ?></p></td>
						<td class="clickable"><a href=""><?php echo htmlspecialchars($row['title']); ?></a></td>
						<td><p href=""><?php echo htmlspecialchars($row['release_year']); ?></p></td>
						<td><p href=""><?php echo htmlspecialchars(gmdate("i:s", $row['length'])); ?></p></td>
						<td class="deleteclick"><a class='btn btn-danger' href="delete">Delete</a></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>

		<script
			src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			crossorigin="anonymous"></script>

		<script>
			// depending on which movie is clicked in the table,
			// the info page receives the unique id of that clicked movie
			// and displays the info for that particular movie
			$(document).ready(function() {
				$('.clickable').click(function() {
					var id = $(this).closest('tr').attr('id');
					window.location = 'movieinfo.php?id=' + id;
					return false;
				});
			});

			// depending on which movie is clicked in the table,
			// the delete page receives the unique id of that clicked movie
			// to be potentially deleted
			$(document).ready(function() {
				$('.deleteclick').click(function() {
					var id = $(this).closest('tr').attr('id');
					window.location = 'deletemovie.php?id=' + id;
					return false;
				});
			});
		</script>
	</body>
</html>
