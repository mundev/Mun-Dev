
EasySocial.require()
.script('site/audios/form')
.done(function($) {

	$('[data-audios-form]').implement(EasySocial.Controller.Audios.Form, {
		"defaultAlbumart": "<?php echo $defaultAlbumart; ?>",
		"importMetadata": "<?php echo $this->config->get('audio.allowencode'); ?>",
		<?php if ($userTagItemList) { ?>
		"tagsExclusion": <?php echo ES::json()->encode($userTagItemList); ?>
		<?php } ?>
	});
	
});
