<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Add</h3>
	</div>
	<div class="panel-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label>Tittle</label>
				<input type="text" name="name" class="form-control" />
			</div>
			<div class="form-group">
				<label>Content</label>
				<textarea name="content" class="form-control"></textarea>
			</div>			
			<input type="submit" name="add" class="btn btn-primary" value="Submit">
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>">Cancel</a>
		</form>
	</div>
</div>