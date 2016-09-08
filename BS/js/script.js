// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#Rider_ID').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#Rider_ID').val(item);
	// hide proposition list
	$('#country_list_id').hide();
}

// autocomplet : this function will be executed every time we change the text
function autocomplethorse() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#Horse_ID').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refreshhorse.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#horse_list').show();
				$('#horse_list').html(data);
			}
		});
	} else {
		$('#horse_list').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_itemhorse(item) {
	// change input value
	$('#Horse_ID').val(item);
	// hide proposition list
	$('#horse_list').hide();
}
