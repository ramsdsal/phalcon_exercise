{% extends "templates/base.volt" %}

{% block head %}
	{{ this.assets.outputCss('additional') }}
{% endblock %}

{% block content %}
	<form class="form-signin" method="post" action="{{ url('signin/doSignin') }}">
	<h2 class="form-signin-heading">Please sign in</h2>
	<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
	<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">	
	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
</form>
{% endblock %}