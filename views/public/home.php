<?php
// Connect to the database
$conn = new mysqli ('localhost','blog_user','se5UTn2ptD6ydpUd','blog');

// Get order if any is present in QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_id';
}

// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY $order DESC";

// Execute the query
$results = $conn->query($sql);

?>
<?php post($post = $results->fetch_assoc()) ?>
<h2><a href="./?p=public/post&id=<?php echo $post['post_id']?>"><?php echo $post['post_title'] ?></a></h2>
<?php echo $date; ?>
	<br/>
	<?php echo $post['post_text'] ?>

<?php while($post = $results->fetch_assoc()): ?>
	<?php 
	// Make a PHP timestamp
	$time = strtotime($post['post_datepublished']);
	
	// Format the timestamp for display
	$date = date('M j, Y',$time);
	?>
<div id="post">
	<h2><a href="./?p=public/post&id=<?php echo $post['post_id']?>"><?php echo $post['post_title'] ?></a></h2>
	<?php echo $date; ?>
	<br/>
	<?php echo $post['post_text'] ?>
</div>
<?php endwhile ?>