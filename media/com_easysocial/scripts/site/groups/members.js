EasySocial.module('site/groups/members', function($) {
	
	var module = this;

	EasySocial.Controller('Groups.App.Members', {
		defaultOptions: {

			// Wrapper
			"{wrapper}": "[data-wrapper]",
			"{result}": "[data-result]",

			// Item
			"{item}": "[data-item]",

			// Actions
			"{cancelInvite}": "[data-cancel]",
			"{remove}": "[data-remove]",
			"{approve}": "[data-approve]",
			"{promote}": "[data-promote]",
			"{revoke}": "[data-revoke]",
			"{reject}": "[data-reject]",

			// Search
			"{searchInput}": "[data-search-input]",

			// Filters
			"{filter}": "[data-filter]"
		}
	}, function(self, opts) { return {
		
		init : function() {
			// Get the id of the group
			opts.id = self.element.data('id');
			opts.returnUrl = self.element.data('return');
		},

		setActiveFilter: function(filter) {
			self.filter().removeClass('active');
			filter.addClass('active');
		},

		search: function(keyword) {
			var type = $('[data-filter].active').data('type');

			self.result().removeClass('is-empty');
			self.wrapper().addClass('is-loading');
			self.result().empty();

			EasySocial.ajax('apps/group/members/controllers/groups/getMembers', {
				"id": opts.id,
				"keyword": keyword,
				"type": type
			}).done(function(contents) {

				// Set the loading
				self.wrapper().removeClass('is-loading');

				// Update the result
				self.result().html(contents);

				// Show empty if necessary
				if (!self.item().length) {
					self.result().addClass('is-empty');
				}

			});
		},

		"{filter} click": function(filter, event) {

			var type = filter.data('type');

			self.setActiveFilter(filter);

			// If the input field is not empty, we filter by it instead
			if (self.searchInput().val() != '') {
				this.search(self.searchInput().val());
				return;
			}
			
			self.result().removeClass('is-empty');
			self.wrapper().addClass('is-loading');
			self.result().empty();

			EasySocial.ajax('apps/group/members/controllers/groups/getMembers', {
				"id": opts.id,
				"type": type
			}).done(function(contents) {

				// Set the loading
				self.wrapper().removeClass('is-loading');

				// Update the result
				self.result().html(contents);

				// Show empty if necessary
				if (!self.item().length) {
					self.result().addClass('is-empty');
				}

				$('body').trigger('afterUpdatingContents', [contents]);
			});
		},

		"{cancelInvite} click": function(link, event) {
			// Get the user id
			var userId = link.closest(self.item.selector).data('id');
			var item = link.closest(self.item.selector);

			EasySocial.ajax('site/controllers/groups/cancelInvite' , {
				"id" : opts.id, "userId" : userId, "return": opts.returnUrl
			}).done(function() {
				item.remove();
			});
		},

		"{remove} click" : function(link, event) {

			// Get the user id
			var userId = link.closest(self.item.selector).data('id');

			EasySocial.dialog({
				content: EasySocial.ajax('site/views/groups/confirmRemoveMember', {"id": opts.id, "userId" : userId, "return": opts.returnUrl})
			});
		},

		// Approve a member
		"{approve} click" : function(link, event) {
			// Get the user id
			var userId = link.closest(self.item.selector).data('id');

			EasySocial.dialog({
				"content": EasySocial.ajax('site/views/groups/confirmApprove', {"id": opts.id, "userId" : userId, "return": opts.returnUrl})
			});
		},

		"{promote} click": function(link, event) {
			// Get the user id
			var userId = link.closest(self.item.selector).data('id');

			EasySocial.dialog({
				content: EasySocial.ajax('site/views/groups/confirmPromote' , { "id" : self.options.id, "userId": userId, "return": opts.returnUrl})
			});
		},

		"{revoke} click": function(link, event) {
			
			// Get the user id
			var userId = link.closest(self.item.selector).data('id');

			EasySocial.dialog({
				content: EasySocial.ajax('site/views/groups/confirmDemote', {"id": self.options.id, "userId": userId, "return": opts.returnUrl})
			});
		},

		"{reject} click" : function(link, event) {
			// Get the user id
			var userId = link.closest(self.item.selector).data('id');

			EasySocial.dialog({
				content: EasySocial.ajax('site/views/groups/confirmReject', {"id": opts.id, "userId": userId, "return": opts.returnUrl})
			});
		},

		"{searchInput} keyup": $.debounce(function(textInput) {

			var keyword = $.trim(textInput.val());
			self.search(keyword);

		}, 250),
	}});

	module.resolve();
});

