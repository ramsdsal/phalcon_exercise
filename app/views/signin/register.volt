{% extends "templates/base.volt" %}

{% block head %}
	{{ this.assets.outputCss('additional') }}
{% endblock %}

{% block content %}
	<form class="form-signin" method="post" action="{{ url('signin/doRegister') }}">
	<h2 class="form-signin-heading">Register</h2>
	<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email">
	<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">	
	<label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
		<input type="password" id="confirminputPassword" class="form-control" placeholder="Confirm Password" name="confirm_password">	
	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in">
	<input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}">
</form>
{% endblock %}