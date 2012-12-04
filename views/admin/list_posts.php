<?php
// Connect to DB
$conn = new mysqli ('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Get order if any is present in QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_title';
}

// Construct the query (SQL)
$sql = "SELECT * FROM blog ORDER BY $order";

// Execute the query
$results = $conn->query($sql);

?>

<a href="./?p=list_posts&amp;order=post_datepublished">Date Published</a>
<a href="./?p=list_posts&amp;order=post_title">Title</a>
<a href="./?p=list_posts&amp;order=post_text">Text</a>
