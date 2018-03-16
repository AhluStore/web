<div data-role="page" id="<?php echo $theme->id_page?>" class="ahlu-page <?php echo isset($theme->cls)?$theme->cls:""?>">

	<div data-role="header">
		<a data-icon="arrow-l" href="#" data-rel="back">Back</a>
		<h1><?php echo isset($theme->title)?$theme->title:"Title Mobile"?></h1>
		<?php echo $theme->header; ?>
	</div>

	<div data-role="content">	
		<?php echo $theme->content; ?>
	</div>
	
	<div data-role="footer">
		<?php echo $theme->footer; ?>
	</div>
	
</div>