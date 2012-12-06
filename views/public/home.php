<?php
// Connect to the database
$conn = new mysqli ('localhost','blog_user','se5UTn2ptD6ydpUd','blog');

// Get order if any is present in QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_title';
}

// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY $order";

// Execute the query
$results = $conn->query($sql);

?>
<?php while($post = $results->fetch_assoc()): ?>
<div id="post">
	<h2><a href="./?p=public/post&id=<?php echo $;?>"><?php echo $post['post_title'] ?></a></h2>
	<?php echo $post['post_datepublished'] ?>
	<br/>
	<?php echo $post['post_text'] ?>
</div>
<?php endwhile ?>