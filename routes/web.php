<?php

Route::get('/haystack/search', function() {
	$path = config('haystack.data.path');
	
	if (! is_file($path)) {
		return response('Haystack data not found', 404);
	}

	return response()->file($path);
});
