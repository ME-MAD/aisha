<?php

use Illuminate\Support\Facades\Auth;
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

if (!function_exists('userCan')) {
    function userCan($permission)
    {
        if (Auth::guard(getGuard())->user()->isAbleTo($permission)) {
            return true;
        }
        return false;
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
            'exam' => "Exam",
            'experience' => "Experience",
            'group' => "Group",
            'groupDay' => "Group Day",
            'groupStudent' => "Group Student",
            'groupType' => "Group Type",
            'lesson' => "Lesson",
            'payment' => "Payment",
            'role' => "Role",
            'student' => "Student",
            'studentLesson' => "Student Lesson",
            'studentLessonReview' => "Student Lesson Review",
            'subject' => "Subject",
            'syllabus' => "Syllabus",
            'syllabusReview' => "Syllabus Review",
            'teacher' => "Teacher",
            'user' => "User",
        ];
    }
}



if (!function_exists('getAdditionalPermissions')) {
    function getAdditionalPermissions()
    {
        return [
            'report' => [
                'report-payment'
            ],
            'note' => [
                'note-studentIndex'
            ]
        ];
    }
}


if (!function_exists('getPermissionsForView')) {
    function getPermissionsForView()
    {
        $keys = getPermissionKeys();
        $tables = getPermissionTables();
        $additionalPermissions = getAdditionalPermissions();


        $permissions = [];

        foreach($tables as $table => $tableName)
        {
            foreach($keys as $key => $value)
            {
                $permissions [$table] []= [
                    'key' => $value,
                    'value' => "$value-$table",
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

        $additionalPermissions = getAdditionalPermissions();

        $permissions = [];

        foreach($tables as $table => $tableName)
        {
            foreach($keys as $key => $value)
            {
                $permissions [] ['name']= "$value-$table";
            }
        }

        foreach($additionalPermissions as $items)
        {
            foreach($items as $permission)
            {
                $permissions [] ['name'] = $permission;
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

        $additionalPermissions = getAdditionalPermissions();

        $permissions = [];

        foreach($tables as $table => $tableName)
        {
            foreach($keys as $key => $value)
            {
                $permissions []= "$value-$table";
            }
        }

        foreach($additionalPermissions as $items)
        {
            foreach($items as $permission)
            {
                $permissions [] = $permission;
            }
        }

        return $permissions;
    }
}


if (!function_exists('getSeededRoles')) {
    function getSeededRoles()
    {
        return [
            [
                'name' => 'admin',
                'display_name' => 'admin',
                'description' => 'Have All Control On System',
            ],
            [
                'name' => 'teacher',
                'display_name' => 'teacher',
                'description' => 'Have Accessibility on teacher and Student Actions ',
            ],
            [
                'name' => 'student',
                'display_name' => 'student',
                'description' => 'Have Accessibility on Student Actions',
            ],

        ];
    }
}

