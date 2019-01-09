<div>
	<div class="note">
		<a href="<?php echo ROOT_URL; ?>notes/add">Add</a>
	</div>
	<?php foreach ($viewmodel as $item) { ?>
		<div class="note">
			<h5><a class="" href="<?php echo ROOT_URL .'notes/note/'. $item['id']; ?>"><?php echo $item['name']; ?></a></h5>
			<small class="text-muted"><?php echo $item['date']; ?></small>
			<?php if (strlen($item['content']) > 100){ ?>
				<p class="text-md-left"><?php echo substr($item['content'], 0, 110).' '; ?><a href="<?php echo ROOT_URL .'notes/note/'. $item['id']; ?>">Read More</a></p>
 			<?php } else { ?>
				<p class="text-md-left"><?php echo $item['content']; ?></p>
			<?php } ?>
		</div>
	<?php } ?>
</div>

