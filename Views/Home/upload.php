<?=\Zest\Component\View\View::view(__COM_INSTALLER__."Header");?>
<title><?=printl("upload:title:com:installer");?></title>
<div class="container">
	<div class="card">
  <div class="card-header"><?=printl('installer:com:installer')?></div>
</div>
		<form action="<?=site_base_url().'/com/installer/upload/process'?>" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="pwd"><?=printl("file:com:installer");?>:</label>
		    <input type="file" name='file' class="form-control" id="pwd">
		  </div>
		  <div class="form-group">
		   <input type="submit" name="submit" class="btn btn-primary" value="<?=printl("upload:btn:com:installer");?>">
		  </div>
		</form>
					<div class="form-group">
				<span class="alert alert-info"><?=printl('upload:msg:com:installer')?></span>
			</div>
	</div>
</body>
</html>
