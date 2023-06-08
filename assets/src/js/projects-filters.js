jQuery(function ($) {
	$('#projects-filters-form #category-filters input[type="checkbox"]').not('#category-all').on('change', function (e) {
		$('#category-all').prop('checked', false);
	});

	$('#projects-filters-form #date-filters input[type="checkbox"]').not('#date-any').on('change', function (e) {
		$('#date-any').prop('checked', false);
	});

	$('#filter').submit(function () {
		var filter = $('#projects-filters-form');
		$.ajax({
			url: filter.attr('action'),
			data: filter.serialize(), // form data
			type: filter.attr('method'), // POST
			beforeSend: function (xhr) {
				filter.find('button').text('Processing...'); // changing the button label
			},
			success: function (data) {
				filter.find('button').text('Apply'); // changing the button label back
				$('#projects-response').html(data); // insert data
			}
		});
		return false;
	});
});




















// jQuery(document).ready(function ($) {

// 	//  Category Listener
// 	let categoryFilterButton = $('.cat-list_item');
// 	categoryFilterButton.on('click', function () {
// 		categoryFilterButton.parent().removeClass('label--active');
// 		$(this).parent().addClass('label--active');
// 		let catSlug = $(this).data('slug');

// 		filterProjectsByCategory(catSlug);
// 	});

// 	// Date Listener
// 	let dateFilterButton = $('.date-list_item');
// 	dateFilterButton.on('click', function () {
// 		dateFilterButton.parent().removeClass('label--active');
// 		$(this).parent().addClass('label--active');
// 		let dateSlug = $(this).data('slug');

// 		filterProjectsByDate(dateSlug);
// 	});


// 	if (dateFilterButton && categoryFilterButton) {

// 		let slugs = {
// 			date: dateSlug,
// 			category: catSlug
// 		}
// 		filterProjects(slugs);
// 	}

// });

// function filterProjectsByCategory(catSlug) {
// 	console.log('filterProjectsByCategory() with category slug: ' + catSlug);

// 	jQuery.ajax({
// 		type: 'POST',
// 		url: hsc_projects_filters.ajaxurl,
// 		dataType: 'html',
// 		data: {
// 			action: 'hsc_projects_filters_categories',
// 			category: catSlug,
// 		},
// 		success: function (res) {
// 			jQuery('.projects__list-items').html(res);
// 		}
// 	})

// }

// function filterProjectsByDate(dateSlug) {
// 	console.log('filterProjectsByDate() with date slug: ' + dateSlug);

// 	jQuery.ajax({
// 		type: 'POST',
// 		url: hsc_projects_filters.ajaxurl,
// 		dataType: 'html',
// 		data: {
// 			action: 'hsc_projects_filters_dates',
// 			date: dateSlug,
// 		},
// 		success: function (res) {
// 			jQuery('.projects__list-items').html(res);
// 		}
// 	})

// }

// function filterProjects(slugs) {

// 	console.log(slugs);
// 	let dateSlug = '';
// 	let catSlug = '';

// 	slugs.$.each(slugs, function (type, slug) {
// 		if (type === 'date') {
// 			dateSlug = slug;
// 		} else if (type === 'category') {
// 			catSlug = slug;
// 		} else {
// 			return;
// 		}
// 	});

// 	jQuery.ajax({
// 		type: 'POST',
// 		url: hsc_projects_filters.ajaxurl,
// 		dataType: 'html',
// 		data: {
// 			action: 'hsc_projects_filters',
// 			date: dateSlug,
// 			category: catSlug
// 		},
// 		success: function (res) {
// 			jQuery('.projects__list-items').html(res);
// 		}
// 	})
// }
