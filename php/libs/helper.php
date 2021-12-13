<?php

use staticList;

function get_param($key, $default_val, $is_post = true)
{
    $arry = $is_post ? $_POST : $_GET;
    return $arry[$key] ?? $default_val;
}

function redirect($path)
{
    if ($path === GO_HOME) {
        $path = get_url('');
    } elseif ($path === GO_REFERER) {
        $path = $_SERVER['HTTP_REFERER'];
    } else {
        $path = get_url($path);
    }

    header("Location: {$path}");

    die();
}

function the_url($path)
{
    echo get_url($path);
}

function get_url($path)
{
    return BASE_CONTEXT_PATH . trim($path, '/');
}

function is_alnum($val)
{
    return preg_match("/^[a-zA-Z0-9]+$/", $val);
}

function escape($data)
{
    if (is_array($data)) {
        foreach ($data as $prop => $val) {
            $data[$prop] = escape($val);
        }

        return $data;
    } elseif (is_object($data)) {
        foreach ($data as $prop => $val) {
            $data->$prop = escape($val);
        }

        return $data;
    } else {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
}

function is_staticListParam($val, $staic_list_param)
{
    $res = false;

    foreach ($staic_list_param as $key => $value) {
        if ($key === $val) {
            $res = true;
        }
    }

    return $res;
}

function get_active_nab_tab($tab_name)
{
    if (str_replace(BASE_CONTEXT_PATH, '', parse_url(CURRENT_URI)['path']) == $tab_name) {
        return 'active';
    }
}
