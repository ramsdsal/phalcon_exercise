a:5:{i:0;s:256:"<!doctype html>
<html lang="en">
<head>
	<?= $this->tag->getTitle() ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= $this->assets->outputCss('style') ?>
	<?= $this->assets->outputJs('js') ?>
	";s:4:"head";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:6:"

  ";s:4:"file";s:32:"../app/views/templates/base.volt";s:4:"line";i:11;}}i:1;s:1027:"
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= $this->url->get('signin/') ?>">Signin</a></li>            
          </ul>
        </div>
	</div>
</div>
<?= $this->flash->output() ?>
";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:4:"

";s:4:"file";s:32:"../app/views/templates/base.volt";s:4:"line";i:40;}}i:2;s:20:"

</body>
</html>";}