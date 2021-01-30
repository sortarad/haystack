<?php

Route::get('/haystack/search', function() {
	return response()->file(public_path('vendor/haystack/data/codes.json'));
});
