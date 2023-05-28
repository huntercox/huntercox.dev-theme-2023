jQuery(document).ready(function ($) {

	//  Category Listener
	$('.cat-list_item').on('click', function () {
		$('.cat-list_item').parent().removeClass('label--active');
		$(this).parent().addClass('label--active');
		let catSlug = $(this).data('slug');

		filterProjectsByCategory(catSlug);
	});


	// Date Listener
	$('.date-list_item').on('click', function () {
		$('.date-list_item').parent().removeClass('label--active');
		$(this).parent().addClass('label--active');
		let dateSlug = $(this).data('slug');

		filterProjectsByDate(dateSlug);
	});

});

function filterProjectsByCategory(catSlug) {
	console.log(catSlug);

	jQuery.ajax({
		type: 'POST',
		url: hsc_projects_filters.ajaxurl,
		dataType: 'html',
		data: {
			action: 'hsc_projects_filters_categories',
			category: catSlug,
		},
		success: function (res) {
			jQuery('.projects__list-items').html(res);
		}
	})

}

function filterProjectsByDate(dateSlug) {
	console.log(dateSlug);

	jQuery.ajax({
		type: 'POST',
		url: hsc_projects_filters.ajaxurl,
		dataType: 'html',
		data: {
			action: 'hsc_projects_filters_dates',
			date: dateSlug,
		},
		success: function (res) {
			jQuery('.projects__list-items').html(res);
		}
	})

}