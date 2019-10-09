<html>
	<head>
		<title><?php echo $_GET['action']; ?> - https://github.com/amattu2</title>
		<link rel='stylesheet' type='text/css' href='css/index.css'>
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
	</head>

	<body>
		<div class='bb' onclick="location.href='index.php'">
			<h2>&larr;</h2>
		</div>

		<?php
		// Action is set
		if (isset($_GET['action']) && !empty($_GET['action'])) {
			// Get Requested Directory
			$action = $_GET['action'];

			// Scan Requested Directory
			$directory = scandir($action,0);
			foreach ($directory as $image) {
				// Not Empty, Not Video
				if ($image != '..' && $image != '.' && pathinfo($image, PATHINFO_EXTENSION) != 'mp4') {
				echo"
					<div class='gallery-image'>
						<img src='$action/$image' alt='$image' />
					</div>";
				// Not Empty, Video
				} else if (pathinfo($image, PATHINFO_EXTENSION) == 'mp4') {
				echo"
					<div class='gallery-image'>
						<video width='320' height='240' controls>
						  <source src='$action/$image' type='video/mp4'>
						Your browser does not support the video tag.
						</video>
					</div>";
				}
			}
		// No Request, return back.
		} else { echo "<script>location.href = 'index.php';</script>"; }
		?>
	</body>
</html>
