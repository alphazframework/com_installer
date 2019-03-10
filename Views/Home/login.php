<?=\Zest\Component\View\View::view(__COM_INSTALLER__."Header");?>
<title><?=printl("login:title:com:installer");?></title>
<div class="container">
		<form action="<?=site_base_url().'/com/installer/login/process'?>" method="post">
		  <div class="form-group">
		    <label for="email"><?=printl("username:com:installer");?>:</label>
		    <input type="text" name='usr' class="form-control" id="usr">
		  </div>
		  <div class="form-group">
		    <label for="pwd"><?=printl("password:com:installer");?>:</label>
		    <input type="password" name='pwd' class="form-control" id="pwd">
		  </div>
		  <div class="form-group">
		   <input type="submit" name="submit" class="btn btn-primary" value="<?=printl("login:btn:com:installer");?>">
		  </div>
		</form>		
	</div>
</body>
</html>
