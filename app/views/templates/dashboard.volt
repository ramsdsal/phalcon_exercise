<!doctype html>
<html lang="en">
<head>
	{{ get_title() }}
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{ this.assets.outputCss('style') }}
	{{ this.assets.outputJs('js') }}	
</head>
<body>
<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Fireball</a>
    </div>
		<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('index/') }}">Dashboard</a></li>
            <li><a href="{{ url('project/') }}">Projects</a></li>
            <li><a href="{{ url('account/') }}">Account</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('index/signout/') }}">Signout</a></li>            
          </ul>
        </div>
	</div>
</div>
{{ flash.output() }}
{% block content %}

{% endblock %}

</body>
</html>