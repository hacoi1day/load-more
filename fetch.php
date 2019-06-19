<?php

if(isset($_POST['limit'], $_POST['start'])) {
	$limit = $_POST['limit'];
	$start = $_POST['start'];
	$connect = mysqli_connect('localhost', 'root', '', 'load_more');
	mysqli_set_charset($connect, 'utf8');
	$query = "SELECT * FROM `posts`
			ORDER BY `post_id` DESC
			LIMIT $start,$limit";
	
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_array($result)) {
		echo '
		<h3>'.$row['post_title'].'</h3>
		<p>'.$row['post_description'].'</p>
		<p class="text-muted" align="right">By - '.$row['post_author'].'</p>
		';
	}
}