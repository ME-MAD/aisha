<?php

if (!function_exists('getStudentTypes')) {
    function getStudentTypes()
    {
        return [
            'normal' => 'عادي',
            'dense' => 'مكثف',
        ];
    }
}


if (!function_exists('getMonthNames')) {
    function getMonthNames()
    {
        return [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
    }
}


if (!function_exists('getCurrectMonthName')) {
    function getCurrectMonthName()
    {
        return date('F');
    }
}


