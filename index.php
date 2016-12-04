<?php
$pages = array(
	array( // Introduction
		'page' => 'intro',
		'title' => 'Introduction',
	), array( // Puyo Puyo
		'page' => 'puyopuyo',
		'title' => 'Puyo Puyo',
	), array( // Puyo Puyo Tsuu
		'page' => 'tsuu',
		'title' => 'Puyo Puyo Tsuu',
	), array( // Puyo Puyo Sun
		'page' => 'sun',
		'title' => 'Puyo Puyo Sun',
	), array( // Puyo Puyo~n
		'page' => 'yon',
		'title' => 'Puyo Puyo~n',
	), array( // Puyo Puyo Fever
		'page' => 'fever',
		'title' => 'Puyo Puyo Fever',
	), array( // Puyo Puyo Fever 2
		'page' => 'fever2',
		'title' => 'Puyo Puyo Fever 2',
	), array( // Puyo Puyo! 15th Anniversary
		'page' => '15th',
		'title' => 'Puyo Puyo! 15th Anniversary',
	), array( // Puyo Puyo 7
		'page' => 'puyo7',
		'title' => 'Puyo Puyo 7',
	), array( // Puyo Puyo!! 20th Anniversary
		'page' => '20th',
		'title' => 'Puyo Puyo!! 20th Anniversary',
	), array( // Madou Monogatari
		'page' => 'madou',
		'title' => 'Madou Monogatari',
	), array( // Other Games
		'page' => 'other',
		'title' => 'Other Games',
	), array( // Fangames
		'page' => 'fangames',
		'title' => 'Fangames',
	),
);

function get_page_index($page) // Returns the index of the page (or -1 if it doesn't exist)
{
	global $pages;

	for ($i = 0; $i < count($pages); $i++)
	{
		if ($pages[$i]['page'] === $page)
			return $i;
	}
	
	return -1;
}

function get_prev_page_index($index) // Returns the index of the previous item (or -1 if there is none)
{
	if ($index === 0)
		return -1;
	
	return $index - 1;
}

function get_next_page_index($index) // Returns the index of the next item (or -1 if this is the last item)
{
	global $pages;

	if ($index === count($pages) - 1)
		return -1;
	
	return $index + 1;
}

// Get the page index
$page_name = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : $pages[0]['page'];
$page_index = get_page_index($page_name);
if ($page_index === -1) die; // Don't bother putting out an error, just stop the execution.

// Get the prev/next pages
$prev_page_index = get_prev_page_index($page_index);
$next_page_index = get_next_page_index($page_index);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Puyo Nexus &bull; Introduction to Puyo Puyo</title>
	
	<link rel="stylesheet" href="/resources/css/normalize.css">
	<link rel="stylesheet" href="/resources/css/bootstrap.css">
	<link rel="stylesheet" href="/resources/css/header.css">
	<link rel="stylesheet" href="fancybox/jquery.fancybox.css" media="screen">
	<link rel="stylesheet" href="style.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="/resources/js/bootstrap.min.js"></script>
	<script src="fancybox/jquery.fancybox.pack.js"></script>
	<script src="script.js"></script>
	<script>
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-8256078-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<body>
	<div id="wrap">
		<div id="header-wrap">
			<div id="pn-header">
				<div id="pn-logo"></div>
			</div>
			<div id="pn-nav-wrap">
				<ul id="pn-nav">
					<li><a href="/">Home</a></li>
					<li class="current"><a href="/intro/">Introduction</a></li>
					<li><a href="/wiki/">Wiki</a></li>
					<li><a href="/forum/">Forum</a></li>
					<li><a href="/chainsim/">Chain Simulator</a></li>
					<li><a href="/chat/">Chat</a></li>
				</ul>
				<br clear="both" />
			</div>
		</div>
		<div id="content">
			<div class="dropdown" id="page-head">
				<div class="dropdown-toggle" data-toggle="dropdown" href="#"><h1><?php echo $pages[$page_index]['title']; ?><span class="caret"></span></h1></div>
				<ul class="dropdown-menu" role="menu">
					<?php foreach ($pages as $page) : ?>
					<?php if ($page['page'] === $page_name) : ?>
						<li><a href="<?php echo $page['page']; ?>.html"><strong><?php echo $page['title']; ?></strong></a></li>
					<?php else : ?>
						<li><a href="<?php echo $page['page']; ?>.html"><?php echo $page['title']; ?></a></li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php include('pages/' . $pages[$page_index]['page'] . '.html'); ?>
			<ul id="pagination">
				<li>
					<?php if ($prev_page_index == -1) : echo $pages[$page_index]['title']; else : ?>
						<a href="<?php echo $pages[$prev_page_index]['page']; ?>.html" title="<?php echo $pages[$prev_page_index]['title']; ?>">&laquo; <?php echo $pages[$prev_page_index]['title']; ?></a>
					<?php endif; ?>
				</li>
				<li>
					<?php if ($next_page_index == -1) : echo $pages[$page_index]['title']; else : ?>
						<a href="<?php echo $pages[$next_page_index]['page']; ?>.html" title="<?php echo $pages[$next_page_index]['title']; ?>"><?php echo $pages[$next_page_index]['title']; ?> &raquo;</a>
					<?php endif; ?>
				</li>
			</ul>
		</div>
	</div>
	<div id="footer-wrap">
		<div id="footer">
			&copy; 2007-2015 Puyo Nexus
		</div>
	</div>
</body>
</html>
