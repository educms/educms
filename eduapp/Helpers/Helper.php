<?php
    function set_active($path, $active = 'active') {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }
    function set_menu_open($path, $active = 'menu-open') {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }
    function set_icon($path, $active = 'fa-check-circle') {
        return call_user_func_array('Request::is', (array)$path) ? $active : 'fa-circle';
    }
    
?>
