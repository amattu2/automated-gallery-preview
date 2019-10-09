<html>
	<head>
		<title>Gallery Inclusion - https://github.com/amattu2</title>
		<link rel='stylesheet' type='text/css' href='css/index.css'>
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
	</head>

	<body>
		<!-- Intro -->
		<div class='main theme-1'>
			<h1>Automated Gallery</h1>
			<p>This page includes all folders & images in a specified folder.</p>
		</div>

		<!-- Directory -->
		<div class='gallery theme-4'>
			<?php
			$directory = scandir("folders/",0);
			foreach ($directory as $filename) {
				if ($filename != '..' && $filename != '.') {
					echo"
					<div class='object theme-fff' onclick=\"location.href='view.php?action=folders/$filename';\">
						<img src='https://www.w3schools.com/howto/img_avatar2.png' alt='Person' width='96' height='96'>
						<b>$filename</b>
					</div>";
				}
			}
			?>
		</div>

		<!-- if sfw is not set -->
		<?php
		if (!isset($_GET['sfw'])) {
		?>
		<!-- Previews -->
		<div class='preview theme-2'>
			<h1>Previews <span style='cursor: pointer' onclick="location='index.php?sfw'">[Hide]</span></h1>
			<?php
			$directory = scandir("folders/",0);
			foreach ($directory as $filename) {
				if ($filename != '..' && $filename != '.') {
					$image = scandir('folders/'. $filename)['4'];

					// Not Empty, Not Video
					if ($image != '..' && $image != '.' && pathinfo($image, PATHINFO_EXTENSION) != 'mp4') {
						echo"
						<div class='object theme-2' onclick=\"location.href='view.php?action=folders/$filename';\">
							<img src='folders/$filename/$image' alt='$image' width='96' height='96'>
							<h3>$filename</h3>
						</div>";
					}
				}
			}
			?>
		</div>
		<?php } ?>
	</body>
</html>
