<?php 
// Connect to the database
$conn = new mysqli ('localhost','blog_user','se5UTn2ptD6ydpUd','blog');
extract($_GET);

// Construct the query (SQL)
$sql = "SELECT * FROM posts WHERE post_id=$id";
// Execute the query
$results = $conn->query($sql);
?>

<?php $post = $results->fetch_assoc() ?>
<div id=title>
	<h2><?php echo $post['post_title'] ?></h2>
</div>
<br/>
<div id=date>
	<?php 
	// Make a PHP timestamp
	$time = strtotime($post['post_datepublished']);
	
	// Format the timestamp for display
	$date = date('M j, Y',$time);
	?>
	Posted on: <?php echo $date; ?>
</div>
<br/>
<br/>
<div id=post_text>
	<?php echo $post['post_text']?>
</div>
