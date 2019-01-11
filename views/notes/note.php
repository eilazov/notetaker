<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edit</h3>
	</div>
	<div class="panel-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="name" class="form-control" value="<?php echo $viewmodel['name']; ?>" />
			</div>
			<div class="form-group">
				<label>Content</label>
				<textarea name="content" class="form-control"><?php echo $viewmodel['content']; ?></textarea>
			</div>			
			<input type="submit" name="update" class="btn btn-primary" value="Update">
			<input type="submit" name="delete" class="btn btn-danger" value="Delete">
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>">Cancel</a>
		</form>
	</div>
</div>