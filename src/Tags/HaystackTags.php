<?php

namespace Sortarad\Haystack\Tags;

use Statamic\Tags\Tags;

class HaystackTags extends Tags
{
    protected static $handle = 'haystack';

    /**
     * The {{ haystack }} tag.
     *
     * @return string|array
     */
    public function index()
    {
        return view('haystack::search');
    }
}
