// autocomplet : this function will be executed every time we change the text
function autocomplethorse() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword1 = $('#Horse_ID').val();
	if (keyword1.length >= min_length) {
		$.ajax({
			url: 'ajax_refreshhorse.php',
			type: 'POST',
			data: {keyword1:keyword1},
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
function set_item(item) {
	// change input value
	$('#Horse_ID').val(item);
	// hide proposition list
	$('#horse_list').hide();
}

