<?php

namespace App;

class Navigation
{
    public static function isActive($pageName)
    {
        if (self::isPageNameSet()) {
            if ($pageName == $_GET['c']) {
                return 'active';
            }
        }

        return '';
    }

    public static function isPageNameSet()
    {
        if (isset($_GET['c'])) {
            return true;
        }

        return false;
    }
}