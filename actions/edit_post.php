<?php

// Connect to the database
$conn = new mysqli ('localhost','blog_user','se5UTn2ptD6ydpUd','blog');


// Construct query with POSTed data
extract($_POST);
$sql = "UPDATE posts SET post_title='$post_title', post_text='$post_text', WHERE post_id='$post_id'";

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	// Redirect
	header('Location:../?p=list_posts');
}

// Close DB connection
$conn->close();