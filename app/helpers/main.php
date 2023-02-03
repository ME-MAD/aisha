<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('getStudentTypes')) {
    function getStudentTypes()
    {
        return [
            'normal' => 'عادي',
            'dense' => 'مكثف',
        ];
    }
}

if (!function_exists('getGuard')) {
    function getGuard()
    {
        return Session::get('admin_guard');
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


if (!function_exists('getPermissionKeys')) {
    function getPermissionKeys()
    {
        return [
            'create',
            'update',
            'delete',
            'edit',
            'show',
            'index',
            'store'
        ];
    }
}

if (!function_exists('getPermissionTables')) {
    function getPermissionTables()
    {
        return [
            'exam',
            'experience',
            'group',
            'groupDay',
            'groupStudent',
            'groupType',
            'lesson',
            'payment',
            'role',
            'student',
            'studentLesson',
            'studentLessonReview',
            'subject',
            'syllabus',
            'syllabusReview',
            'teacher',
            'user',
        ];
    }
}


if (!function_exists('getPermissionsForView')) {
    function getPermissionsForView()
    {
        $keys = getPermissionKeys();
        $tables = getPermissionTables();

        $permissions = [];

        foreach($tables as $table)
        {
            foreach($keys as $key => $value)
            {
                $permissions [$table] []= [
                    'key' => $value,
                    'value' => "$value-$table"
                ];
            }
        }
        return $permissions;
    }
}


if (!function_exists('getPermissionsForSeeder')) {
    function getPermissionsForSeeder()
    {
        $keys = getPermissionKeys();
        $tables = getPermissionTables();

        $permissions = [];

        foreach($tables as $table)
        {
            foreach($keys as $key => $value)
            {
                $permissions [] ['name']= "$value-$table";
            }
        }
        return $permissions;
    }
}


if (!function_exists('getPermissionsArray')) {
    function getPermissionsArray()
    {
        $keys = getPermissionKeys();
        $tables = getPermissionTables();

        $permissions = [];

        foreach($tables as $table)
        {
            foreach($keys as $key => $value)
            {
                $permissions []= "$value-$table";
            }
        }
        return $permissions;
    }
}