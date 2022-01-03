<?php

namespace App;

class Navigation
{
    public static function isActive($pageName)
    {
        if ($pageName == $_GET['c']) {
            return 'active';
        }
        return '';
    }
}