<?php 
// Check for blog posts in session data
$post_title = '';
$post_datepublished = '';
$post_text = '';
extract($_SESSION);

//Remove blog posts from session data
unset($_SESSION['']);
?>

<h2>Add a post</h2>
<form action="actions/add_post.php" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="post_title">Post Title</label>
		<div class="controls">
			<input class="span6" type="text" name="post_title" placeholder="Enter in a title" value="<?php echo $post_title ?>" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="post_name"></label>
		<div class="controls">
			<textarea name="post_text" rows="12" class="span6">
				<?php 
				echo $post_text;
				?>
			</textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-warning">Publish</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
</form>
