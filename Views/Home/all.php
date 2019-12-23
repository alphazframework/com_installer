<?=\Zest\Component\View\View::view(__COM_INSTALLER__."Header");?>
<title><?=printl('com:com:installer')?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<style type="text/css">
  .red {
    color: red;
  }
  .green {
    color: green;
  }
</style>
<div class="card">
  <div class="card-header"><?=printl('com:com:installer')?></div>
</div>
<br/>
<div class="container" id="accordion">
<?php foreach ($args as $key => $value) : ?>
    <?php $c = (new \App\Components\com_installer\Models\Com())->getConponentConfigByName($value); ?>
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#<?=$value?>">
        <?php if ($c['status'] === true) { ?>
          <i class="fa fa-check close green"></i>
        <?php } else { ?>
          <i class="fa fa-times close red"></i>
        <?php } ?>
        <?=$c['name']?>
      </a>
    </div>
    <div id="<?=$value?>" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <p><?= isset($c['description']) ? $c['description'] : null ?></p>
            			<table class="table margin-top-10">
 			 	<tr>
    				<th scope="row"><?=printl("version:com:installer");?></th>
    				<td><?=$c['version']?></td>
 			 	</tr>
 			 	<tr>
    				<th scope="row"><?=printl("author:com:installer");?></th>
    				<td><?=$c['author']['name']?></td>
 			 	</tr>
 			 	<tr>
    				<th scope="row"><?=printl("author:url:com:installer");?></th>
    				<td><a target="_blank" href="<?=$c['author']['homepage']?>"><?=$c['author']['homepage']?>/</a></td>
 			 	</tr>
 			 	<tr>
    				<th scope="row"><?=printl("license:com:installer");?></th>
    				<td><a target="_blank" href="<?=$c['license']['url']?>"><?=$c['license']['license']?></a></td>
 			 	</tr>
      			 	<tr>
    				<th scope="row"><?=printl('requirements:com:installer')?></th>
    				<td>
                    	<table class="table">
                        	<tr class="table-titles">
                            	<th><?=printl("name:com:installer");?></th>
                            	<th><?=printl("version:com:installer");?></th>
                                <th><?=printl('availability:com:installer')?></th>
                            </tr>

                            	<tr>
                            		<td><?=printl('z:version:com:installer')?></td>
                                	<td><?=$c['requires']['version']?></td>
                               	 	<td><i class="<?=(new \App\Components\com_installer\Models\Com())->getIconAvailability($c['requires']['version'], $c['requires']['comparator']);?>"></i></td>
                            	</tr>
                     </table>
                    </td>
 			 	</tr>
			</table>
        <?php if (strtolower($c['id']) !== 'com_installer'): ?>
			  <a id='delete-<?=$c['id']?>' href="<?=site_base_url();?>/com/installer/delete?name=<?=$c['id']?>" class="btn btn-danger"><?=printl('delete:btn:com:installer')?></a><script type="text/javascript">
          $("#delete-<?=$c['id']?>").click(function(e){
            e.preventDefault();
            var href = $(this).attr("href");
            if (confirm("Are you sure?")) {
                window.location = href;
            }
          });
       </script>

        <?php if ((new \App\Components\com_installer\Models\Com())->isSupported($c['requires']['version'], $c['requires']['comparator'])) : ?>
			  <?php if ($c['status'] === true) { ?>
			  	<a href="<?=site_base_url()?>/com/installer/disable?name=<?=$c['id']?>" class="btn btn-warning"><?=printl('disable:btn:com:installer')?></a>
			  <?php } else { ?>
			  <a href="<?=site_base_url()?>/com/installer/enable?name=<?=$c['id']?>" class="btn btn-success"><?=printl('enable:btn:com:installer')?></a>
			<?php } endif;endif; ?>
      </div>
    </div>

  </div>
<?php endforeach; ?>
</div>
</body>
</html>
