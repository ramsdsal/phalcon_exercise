<form action="/user/login" method="post">
	<input type="text" name="username">
	<input type="text" name="password">
	<button type="submit">Login</button>

</form>
<h1>User</h1>
<h1>Single record</h1>
<?php if(property_exists($single, 'id')):?>
	<?=$single->id; ?>
	<?=$single->email; ?>
	<?php print_r($single->getProject('id!=2')->toArray()); ?>
	<h3>Projects from <?= $single->email ?></h3>
	<?php foreach($single->project as $p): ?>
		<?=$p->id; ?>
		<?=$p->title; ?>
	<?php endforeach; ?>

<?php endif; ?>
<h1>All users</h1>
<hr>
<?php foreach($all as $user): ?>
	<?=$user->id; ?>
	<?=$user->email; ?>
<?php endforeach; ?>
<h1>First and last Project from the first user</h1>
<hr>

<?php

	$first = $single->project->getFirst()->toArray();
	print_r($first);
	$first = $single->project->getLast()->toArray();
	print_r($first);
	//phpinfo();		
?>
<h1>Meta-data test</h1>
<hr>
<?php 
	$test = new User();
	$metaData = $test->getModelsMetaData();
	$attributes = $metaData->getAttributes($test);
	print_r($attributes);

	$dataTypes = $metaData->getDataTypes($test);
	print_r($dataTypes);
?>
