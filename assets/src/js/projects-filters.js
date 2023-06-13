jQuery(document).ready(function ($) {


	// If "All" is checked, uncheck all other checkboxes
	$('#myform #category-filters #category-all').on('change', function (e) {
		if ($(this).is(':checked')) {
			$('#category-filters input[type="checkbox"]').not('#category-all').prop('checked', false);
		}
	});

	// By Category: checkbox listeners
	$('#myform #category-filters input[type="checkbox"]').not('#category-all').on('change', function (e) {
		if ($(this).is(':checked')) {
			$('#category-all').prop('checked', false);
		} else {

			let checked = $('#category-filters input[type="checkbox"]').not('#category-all').is(':checked');
			if (!checked) {
				$('#category-all').prop('checked', true);
			}
		}
	});

	// If "Any" is checked, uncheck all other checkboxes
	$('#myform #date-filters #date-any').on('change', function (e) {
		if ($(this).is(':checked')) {
			$('#date-filters input[type="checkbox"]').not('#date-any').prop('checked', false);
		}
	});

	// By Date: checkbox listeners
	$('#myform #date-filters input[type="checkbox"]').not('#date-any').on('change', function (e) {

		if ($(this).is(':checked')) {
			$('#date-any').prop('checked', false);
		} else {

			let checked = $('#date-filters input[type="checkbox"]').not('#date-any').is(':checked');
			if (!checked) {
				$('#date-any').prop('checked', true);
			}
		}
	});


	$('#myform input[type="checkbox"]').on('change', function (e) {

		console.log();

		let categoryFields = $('#category-filters').serializeArray();
		let dateFields = $('#date-filters').serializeArray();

		// combine categoryFields and dateFields into one array
		let myFields = categoryFields.concat(dateFields);

		$.ajax({
			type: 'POST',
			url: hsc_projects_filters.ajaxurl,
			data: {
				action: 'hsc_projects_filters_action',
				category: categoryFields,
				date: dateFields,
			},
			beforeSend: function () {
				//console.log(myFields);
			},
			success: function (response) {
				$('#response').html(response);
				console.log('Response: ' + response);
			},
		});
	});


	let filteredCheckbox = $('#checkbox_filtered');

	$('#checkbox_filtered').change(function (e) {
		e.preventDefault();


		var isChecked = $('#checkbox_filtered').is(':checked') ? 'checked' : 'not-checked';

		$.ajax({
			type: 'POST',
			url: hsc_projects_filters.ajaxurl,
			// dataType: 'html',
			// contentType: 'multipart/form-data',
			data: {
				action: 'hsc_projects_filters_action',
				category: $('#category-filters').serialize(),
				date: $('#date-filters').serialize(),
			},
			success: function (response) {
				$('#response').html(response);
				log
			},

		});


	});
});