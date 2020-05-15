<?php

if (! function_exists('page_title')) {
    function page_title($template)
    {
        
        return !isset($template->page_title) ? config('iziecode.page-title') : $template->page_title;
    }
}

if (! function_exists('app_name')) {
    function app_name($name = null)
    {
        return $name == null ? config('iziecode.app-name') : $name;
    }
}

if (! function_exists('load_view')) {
    function load_view($path,$template = null)
    {
        $template = $template == null ? config('iziecode.template') : $template;
        return "iziecode::$template.$path";
    }
}


if (! function_exists('number_only')) {
    function number_only($string)
    {
        $return = str_replace(',', '', $string);
        if (is_numeric($return)) {
            return $return;
        }
    }
}

// this fungction to check string is icon with izie code standar
// ex ez-icon.foo = true
if (! function_exists('is_icon')) {
    function is_icon($string)
    {
        $array = explode('.',$string);
        if($array[0] == 'ez-icon'){
           return true;
        }else{
            return false;
        }
    }
}
// this function for get icon name
// ex : ez-icon.foo = foo
if (! function_exists('get_icon')) {
    function get_icon($string)
    {
        $array = explode('.',$string);
        return $array[1];
    }
}