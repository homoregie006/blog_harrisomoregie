<?php
// Connect to DB
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
<table class="table table-bordered">
	<tr>
		<td><a href="./?p=list_posts&amp;order=post_title">Title</a></td>
		<td><a href="./?p=list_posts&amp;order=post_datepublished">Date Published</a></td>
		<td><a href="./?p=list_posts&amp;order=post_text">Text</a></td>
	</tr>
<?php while($post = $results->fetch_assoc()): ?>
	<?php 
	// Make a PHP timestamp
	$time = strtotime($post['post_datepublished']);
	
	$date = date('M j, Y',$time);
	?>
	<tr>
		<td><?php echo $post['post_title'] ?></td>
		<td><?php echo $date; ?></td>
		<td><?php echo $post['post_text'] ?></td>
		<td class="actions">
			<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=form_edit_post&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>
			<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>
		</td>
	</tr>
<?php endwhile; ?>
</table>