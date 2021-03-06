EasySocial.module('site/api/stream', function($){

var module = this;

/*========================================================================
 * Capture events from the story form and trigger it on the stream.
 * This allows us to inject stuffs on the stream on trigger level
 *======================================================================== */
$(document)
	.on('create', '[data-story]', function(event, html, ids) {

		// Get the stream controller
		var stream = $('[data-es-streams]');

		if (stream.length <= 0) {
			return;
		}

		var stream = $('[data-es-streams]');
		var controller = stream.controller();

		if (ids != '') {
			controller.updateExcludeIds(ids);
		}

		controller.insertItem(html);
	});

$(document)
	.on('update', '[data-story]', function(event, html, id, preview) {

		// Get the stream item
		var streamItem = $('[data-stream-list]').find('[data-id='+ id +']');
		var contents = streamItem.find('[data-contents]');
		var editor = streamItem.find('[data-editor]');

		contents.html(html);

		streamItem.removeClass('is-editing');

		// Remove the editor form
		editor.empty();

		// Show the contents
		contents.removeClass('t-hidden');

		// update preview if there is any
		if (preview != undefined && preview.length > 0) {
			var previewEle = streamItem.find('[data-preview]');
			if (previewEle.length > 0) {

				if (previewEle.hasClass('t-hidden')) {
					previewEle.removeClass('t-hidden')
				}

				previewEle.html(preview);
			}
		}

	});


module.resolve();

});
