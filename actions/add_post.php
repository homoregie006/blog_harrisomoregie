<?php
// Initialize session
session_start();

$conn = new mysqli ('localhost','blog_user','se5UTn2ptD6ydpUd','blog');

// Extract POST data
extract($_POST);

// Check to see if all info is provided
if($post_title == '' || $post_text == '') {
	// Message
	$_SESSION['flash'] = array(
			'message'	=> 'Please provide all information.',
			'type'		=> 'danger'
	);

	// Store the form data into session data
	$_SESSION['post_title'] = $post_title;
	$_SESSION['post_text'] = $post_text;

	// Redirect back to form
	header('Location:../?p=admin/form_add_post');

	// Stop executing the current request
	// and return whatever is in output buffer
	// to the browser
	die();
}

// Load DB constants
require('../config/db.php');

$post_title = addslashes($post_title);
$post_text = addslashes($post_text);

//Construct
$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";

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
	// Display message
	$_SESSION['flash'] = array(
			'message' => '<strong>$post_title</strong> was added successful',
			'type' => 'success'
	);
	// Redirect
	header('Location:../?p=public/home');
}

// Close connection
$conn->close();