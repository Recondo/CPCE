<?php session_start() ?><!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display" />
	<meta charset="UTF-8">
</head>
<body>

	<?php include('Header.php');
		  require_once 'admin/bdd.php'; ?>

	<?php 

		$req = $db->query('SELECT * FROM video');

		$videos = $req->fetchAll();

		foreach ($videos as $video): ?>

	<?php	endforeach ?>

	<div id="videos">

		<a class="twitter-timeline" data-width="400" data-height="700" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div id="vid">
			<img src="img/nat.jpg" class="imageVid">
			<div class="overlay">
    			<div class="textVid"><a href='<?= $video['url_video']?>'><?= $video['description_video']?></a></div>
  			</div>
		</div>
		<div style="clear: both; "></div>
	</div>





<?php include("footer.php"); ?>
</body>

</html>