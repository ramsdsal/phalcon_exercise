<form action="/user/login" method="post">
	<input type="text" name="username">
	<input type="text" name="password">
	<button type="submit">Login</button>

</form>
<h1>User</h1>
<h3>Single record</h3>
{% if single %}
ID: {{ single.id }}&nbsp;
EMAIL: {{ single.email }}
{% endif %}
<h3>Projects</h3>
<hr>
{% if single.id %}
	{% for project in single.project %}		
		ID: {{ project.id }}
		TITLE: {{ project.title }}<br>	
	{% endfor %}
{% endif %}
<hr>
<h1>All users</h1>
<hr>
<?php foreach($all as $user): ?>
	<?=$user->id; ?>
	<?=$user->email; ?>
<?php endforeach; ?>
<h1>First and last Project from the first user</h1>
<hr>
{% set first = single.project.getFirst().toArray() %}
{% set last = single.project.getLast().toArray() %}
First-project: {{ first['title'] }}<br>
Last-project: {{ last['title'] }}<br>