<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=site_base_url();?>/com/installer/upload"><?=printl('upload:btn:com:installer')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_base_url();?>/com/installer/index"><?=printl('manage:btn:com:installer')?></a>
      </li>
      <li class="nav-item">
        <?php if ((new \App\Components\com_installer\Models\Com())->isLogin()) { ?>
        <a class="nav-link" href="<?=site_base_url();?>/com/installer/logout"><?=printl('signout:btn:com:installer')?></a>
        <?php } else { ?>
          <a class="nav-link" href="<?=site_base_url();?>/com/installer/login"><?=printl('login:btn:com:installer')?></a>
        <?php } ?>
      </li>
    </ul>
  </div>
</nav>
<br/>
       <?php
         $msg = view_system_message();
             echo $msg;

        ?>