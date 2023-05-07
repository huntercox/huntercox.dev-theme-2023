(function ($) {
	$.fn.xDebugErrorTab = function (options) {
		var settings = $.extend({
			tabWidth: '60%'
		}, options);

		var createErrorTab = function (errors) {
			var tabContainer = $('<div>', { class: 'xdebug-error-tab-container' });
			var tabToggle = $('<button>', { class: 'xdebug-error-tab-toggle', text: '❗️ Xdebug Errors' });
			var errorList = $('<ul>', { class: 'xdebug-error-list' });
			var overlay = $('<div>', { class: 'xdebug-error-overlay' });

			errors.each(function (i, error) {
				var listItem = $('<li>').append($(error));
				errorList.append(listItem);
			});

			tabContainer.append(errorList);

			$('body').append(tabContainer);
			$('body').append(tabToggle);
			$('body').append(overlay);

			var toggleTab = function () {
				tabContainer.toggleClass('open');
				overlay.toggleClass('visible');
			};

			tabToggle.on('click', toggleTab);
			overlay.on('click', toggleTab);
		};

		var init = function () {
			var errors = $('body').find('.xdebug-error');
			if (errors.length) {
				createErrorTab(errors);
			}
		};

		init();

		return this;
	};

	// Initialize the plugin on document ready
	$(document).ready(function () {
		$('body').xDebugErrorTab();
	});

}(jQuery));
