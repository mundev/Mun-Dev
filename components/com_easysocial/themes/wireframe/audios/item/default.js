
EasySocial.require()
.script('site/audios/item')
.done(function($) {

	$('[data-audio-item]').implement(EasySocial.Controller.Audios.Item, {
		callbackUrl: "<?php echo base64_encode($audio->getPermalink(false));?>"

		<?php if ($usersTagsList) { ?>
		,"tagsExclusion": <?php echo $usersTagsList;?>
		<?php } ?>
	});
});