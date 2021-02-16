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

    /**
     * The {{ haystack:assets }} tag.
     *
     * @return string|array
     */
    public function assets()
    {
        return view('haystack::assets');
    }
}
