EasySocial.module("story/discuss", function($){

var module = this;

EasySocial.require()
.library('plupload')
.done(function(){

EasySocial.Controller("Story.Discuss", {
	defaultOptions: {
		"{title}" : "[data-discuss-title]",
		"{content}" : "[data-discuss-content]",
		"{category}": "[data-story-discuss-category]",


		"{canvas}": "[data-discuss-canvas]",
		"{dropsite}": "[data-discuss-dropsite]",
		"{upload}": "[data-discuss-upload]",

		"{uploadGroup}": "[data-discuss-items]",
		"{fileItem}": "[data-discuss-item]",
		"{removeItem}": "[data-discuss-item-remove]",
		"{uploadItem}": "[data-discuss-upload-item]",

		"{templates}": "[data-discuss-templates]",

		settings: {
				url: "<?php echo ESR::raw('index.php?option=com_easysocial&controller=apps&task=controller&appController=uploader&appId=' . $appId . '&appTask=upload&' . ES::token() . '=1'); ?>",
				max_file_size: "20mb",
				filters: [{extensions: "<?php echo $edconfig->get('main_attachment_extension');?>"}]
		},

		attachment_enabled: "<?php echo $params->get('story_attachment', true); ?>"
	}
}, function(self, opts) { return {
	items: {},
	template: {},

	init: function() {
		if (self.options.attachment_enabled == 1) {
			self.initUploader();
			self.initTemplates();
		}
	},

	initTemplates: function() {
		self.template['item'] = self.templates().find('[data-discuss-template=item]');
		self.template['progress'] = self.templates().find('[data-discuss-template=progress]');
	},

	getTemplate: function(type) {
		var tmpl = self.template[type].clone();

		if (type == 'item') {
			tmpl.attr('data-discuss-item', '');
		}

		if (type == 'progress') {
			tmpl.attr('data-discuss-upload-item', '');
		}
		return tmpl;
	},

	initUploader: function() {
		// Initialize plupload's settings
		var options = $.extend({
							"{uploadButton}": self.upload.selector,
							"{uploadDropsite}": self.dropsite.selector
						}, {
							"settings": self.options.settings
						});


		// Implement plupload controller on the canvas
		self.uploader = self.canvas().addController('plupload', options);

		// Plupload
		self.plupload = self.uploader.plupload;

		// Add the uploader
		self.addPlugin("uploader", self.uploader);

		// Indicate uploader supports drag & drop
		if (!$.IE && self.plupload.runtime=="html5") {
			self.canvas().addClass("can-drop-file");
		}

		// Indicate uploader is ready
		self.canvas().addClass("can-upload");

		self.setLayout();
	},

	hasItems: function() {
		var hasItem = self.fileItem().length > 0;
		var hasUploadItem = self.uploadItem().length > 0;

		return hasItem || hasUploadItem;
	},

	setLayout: function() {
		self.canvas()
			.toggleClass("has-items", self.hasItems());
	},

	removeFile: function(id) {

		// Remove photo item
		self.fileItem()
			.where('id', id)
			.remove();

		self.setLayout();
	},

	clearFiles: function(){

		self.fileItem().remove();
		self.uploadItem().remove();

		self.setLayout();
	},

	removeFileItem: function(id) {

		var item = self.getItem(id);
		
		if (!item) {
			return;
		}


		// Remove item
		self.plupload.removeFile(item.file());
		item.element.remove();
		delete self.items[id];

		self.setLayout();
	},

	getItem: function(file) {

		var id;

		// By id
		if ($.isString(file)) {
			id = file;
		}

		// By file object
		if (file && file.id) {
			id = file.id;
		}

		return self.items[id];
	},

	createItem: function(file) {

		// Get the view item
		var item = self.getTemplate('progress');
		item.attr('id', file.id);

		// Add to item group
		self.uploadGroup().append(item);

		// Keep a copy of the item in our registry
		self.items[file.id] = item;

		self.setLayout();

		self.trigger("QueueCreated", [item]);

		return item;
	},

	"{uploader} FilesAdded": function(el, event, uploader, files) {

		// Wrap the entire body in a try...catch scope to prevent
		// browser from trying to redirect and load the file if anything goes wrong here.
		try {

			// Reverse upload ordering as we are prepending.
			files.reverse();

			$.each(files, function(i, file) {

				// The item may have been created before, e.g.
				// when plupload error event gets triggered first.
				if (self.getItem(file)) return;

				self.createItem(file);
			});

		} catch (e) {
			console.error(e);
		};

		self.setLayout();

		// Begin the upload process
		self.uploader.plupload.start();
	},

	"{uploader} FileUploaded": function(el, event, uploader, file, response) {

		var progress = self.getItem(file);
		var attachmentItem = self.getTemplate('item');
		
		attachmentItem.attr('data-id', response.id);
		attachmentItem.find('[data-name]').html(response.title);

		// var attachmentItem = self.view.attachment({"file" : file, "id" : response.id});

		// Insert the preview after the progress
		attachmentItem
			.data('file-id', response.id)
			.addClass('new-item')
			.insertAfter(progress);

		// Remove the progress
		progress.remove();

		self.setLayout();

		// Remove the new-item class since we want it to be displayed on the screen once it is added
		setTimeout(function(){
			attachmentItem.removeClass("new-item");
		}, 1);
	},

	"{uploader} UploadProgress": function(el, event, uploader, file) {

		var item = self.getItem(file);

		if (!item) {
			return;
		}

		var noFilesize = (file.size===undefined || file.size=="N/A");
		file.percentage = file.percent + "%";
		file.filesize   = (noFilesize) ? "" : $.plupload.formatSize(file.size);
		file.remaining  = (noFilesize) ? "" : $.plupload.formatSize(file.size - (file.loaded || 0));

		var percentage = file.percentage;

		// Never use 100% because users might think
		// the photo is completely uploaded when it might
		// still be working.
		if (percentage=="100%") {
			percentage = "99%";
		}

		if (percentage=="0%") {
			percentage = "1%";
		}

		item.find('.upload-progress-bar')
			.width(percentage);

		// Set the percentage
		item.find('.upload-percentage')
			.html(percentage);
	},


	"{uploader} FileError": function(el, event, uploader, file, response) {

		self.story.setMessage(response.message, "error");

		var uploadingFile = self.uploadingFile;

		if (uploadingFile) {
			uploadingFile.reject();

			delete self.uploadingFile;
		}

		self.setLayout();
	},

	"{uploader} Error": function(el, event, uploader, error) {

		self.story.setMessage(error.message, "error");

		var uploadingFile = self.uploadingFile;

		if (uploadingFile) {
			uploadingFile.reject();

			delete self.uploadingFile;
		}

		// Temporary workaround. Delegated event don't work
		// because the element has been removed.
		self.removeItem()
			.click(function(){
				setTimeout(function(){
					self.setLayout();
				}, 1);
			});

		self.setLayout();
	},

	"{removeItem} click": function(el) {

		var id = el.parent(self.fileItem.selector).data('id');

		// Remove item
		self.removeFile(id);
	},

	"{story} save": function(element, event, save) {

		if (save.currentPanel != 'discuss') {
			return;
		}

		var items = self.fileItem();
		var files = [];

		if (items.length) {
			items.each(function(){
				files.push($(this).data('id'));
			});
		}

		var categoryId = self.category().val();
		var title = self.title().val();
		var content = self.content().val();

		if (!title) {
			self.clearMessage();
			save.reject('<?php echo $errorTitle; ?>');
			return false;
		}

		if (!content) {
			self.clearMessage();
			save.reject('<?php echo $errorContent; ?>');
			return false;
		}

		var data = {
				"categoryId" : categoryId, 
				"title": title, 
				"content": content,
				"files": files
		};

		// Check for attachments and add into data.files
		save.addData(self, data);
	},

	"{story} clear": function() {

		self.title().val('');
		self.content().val('');
		self.clearFiles();
	}
}});

module.resolve();

});
});


EasySocial.require()
.script("story/discuss")
.done(function($) {
	var plugin = story.addPlugin("discuss", {
			"errors": {
				"-601": "<?php echo JText::_('COM_EASYSOCIAL_INVALID_FILE_UPLOADED', true);?>",
				"-600": "<?php echo JText::_('COM_EASYSOCIAL_FILE_SIZE_ERROR', true);?>"
			}
		});
});

