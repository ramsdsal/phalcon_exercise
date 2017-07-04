a:3:{i:0;s:1382:"<!doctype html>
<html lang="en">
<head>
	<?= $this->tag->getTitle() ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= $this->assets->outputCss('style') ?>
	<?= $this->assets->outputJs('js') ?>	
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
            <li class="active"><a href="<?= $this->url->get('index/') ?>">Dashboard</a></li>
            <li><a href="<?= $this->url->get('project/') ?>">Projects</a></li>
            <li><a href="<?= $this->url->get('account/') ?>">Account</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= $this->url->get('index/signout/') ?>">Signout</a></li>            
          </ul>
        </div>
	</div>
</div>
<?= $this->flash->output() ?>
";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:4:"

";s:4:"file";s:37:"../app/views/templates/dashboard.volt";s:4:"line";i:37;}}i:1;s:20:"

</body>
</html>";}