jQuery(document).ready(function ($) {
	// Replace 'your_post_type' with the actual slug of your custom post type
	if (window.location.href.indexOf('post_type=employer') > -1) {
		$('th#start_date').on('click', function () {
			let currentURL = new URL(window.location.href);
			let currentOrderby = currentURL.searchParams.get('orderby');
			let currentOrder = currentURL.searchParams.get('order');

			if (currentOrderby === 'start_date') {
				currentOrder = currentOrder === 'asc' ? 'desc' : 'asc';
			} else {
				currentOrder = 'asc';
			}

			currentURL.searchParams.set('orderby', 'start_date');
			currentURL.searchParams.set('order', currentOrder);

			window.location.href = currentURL.href;
		});
	}
});
