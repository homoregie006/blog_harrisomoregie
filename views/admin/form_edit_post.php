<?php

// Connect to the database
$conn = new mysqli ('localhost','blog_user','se5UTn2ptD6ydpUd','blog');

// Construct query
$sql = "SELECT * FROM posts WHERE post_id={$_GET['id']} LIMIT 1";

// Execute query
$results = $conn->query($sql);

// Get results
$posts = $results->fetch_assoc();

// Close the connection
$conn->close();

?>

<h2>Edit post</h2>
<form action="actions/edit_post.php" method="post" class="form-horizontal">
<input type="hidden" name="band_id" value="<?php echo $post['post_id'] ?>" />
<div class="control-group">
<label class="control-label" for="band_name">Post Title</label>
<div class="controls">
<input class="span4" type="text" name="band_name" placeholder="required" value="<?php echo $post['post_title'] ?>"/>
</div>
</div>
<div class="control-group">
<label class="control-label" for="band_genre">Post Text</label>
<div class="controls">
<input class="span4" type="text" name="band_genre" placeholder="required" value="<?php echo $post['post_text'] ?>"/>
</div>
</div>
<div class="form-actions">
<button type="submit" class="btn btn-primary">Edit</button>
<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
</div>
</form>