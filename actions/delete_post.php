<?php
// Initialize the session
session_start();

// Connect to the database
$conn = new mysqli ('localhost','blog_user','se5UTn2ptD6ydpUd','blog');

// Construct select query (to get the band name)
$sql = "SELECT post_title FROM posts WHERE post_id={$_GET['id']}";

// Execute select query
$result = $conn->query($sql);
$band = $result->fetch_assoc();
extract($band);

// Construct query
$sql = 'DELETE FROM posts WHERE post_id='.$_GET['id'];

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
} else {
	// Message
	$_SESSION['flash'] = array(
			'message' => "<strong>$post_title</strong> was deleted",
			'type' => 'warning'
			);
	
	// Redirect
	header('Location:../?p=admin/list_posts');
}

// Close DB connection
$conn->close();