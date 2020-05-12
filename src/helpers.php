<?php

if (! function_exists('get_page_title')) {
    function get_page_title($title)
    {
        return $title;
    }
}

if (! function_exists('load_view')) {
    function load_view($path,$template = null)
    {
        $template = $template == null ? config('iziecode.template') : $template;
        return "iziecode::$template.$path";
    }
}