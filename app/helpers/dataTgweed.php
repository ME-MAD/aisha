<?php


if (!function_exists("chapterTgweed")) {

    function chapterTgweed()
    {
        $chapters = [
            [
                'lesson_ar' => '(الفصل الأول)المقدمة ',
                'num_pages' => '3'
            ],
            [
                'lesson_ar' => '(الفصل الأول)فضل تلاوة القرآن الكريم ',
                'num_pages' => '5'
            ],
            [
                'lesson_ar' => '(الفصل الأول)آداب تلاوة القرآن الكريم',
                'num_pages' => '6'
            ],
            [
                'lesson_ar' => '(الفصل الأول)معنى التجويد وحكمه وغايته',
                'num_pages' => '7'
            ],
            [
                'lesson_ar' => '(الفصل الأول)مراتب القراءة شعبة القراءة',
                'num_pages' => '7'
            ],
            [
                'lesson_ar' => '(الفصل الأول)اللحن ',
                'num_pages' => '8'
            ],
            [
                'lesson_ar' => '(الفصل الأول)الاستعاذة ',
                'num_pages' => '9'
            ],
            [
                'lesson_ar' => '(الفصل الأول)البسملة ',
                'num_pages' => '10'
            ],
            [
                'lesson_ar' => '(الفصل الأول)أسماء القراء العشرة ورواتهم',
                'num_pages' => '11'
            ],
            [
                'lesson_ar' => '(الفصل الثاني)الحروف العربية',
                'num_pages' => '13'
            ],
            [
                'lesson_ar' => '(الفصل الثاني) مخارج الحروف ',
                'num_pages' => '14'
            ],
            [
                'lesson_ar' => '(الفصل الثاني)الصور التوضيحية لأعضاء النطق',
                'num_pages' => '16'
            ],
            [
                'lesson_ar' => '(الفصل الثاني) الجوف',
                'num_pages' => '17'
            ],
            [
                'lesson_ar' => '(الفصل الثاني) الحلق',
                'num_pages' => '18'
            ],
            [
                'lesson_ar' => '(الفصل الثاني)اللسان',
                'num_pages' => '19'
            ],
            [
                'lesson_ar' => '(الفصل الثاني)الشفتان',
                'num_pages' => '22'
            ],
            [
                'lesson_ar' => '(الفصل الثاني)الخيشوم',
                'num_pages' => '22'
            ],
            [
                'lesson_ar' => '(الفصل الثاني)ألقاب الحروف',
                'num_pages' => '23'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)صفات الحروف',
                'num_pages' => '25'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)الهمس والجهر',
                'num_pages' => '27'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)الشدة والرخاوة والبينية ',
                'num_pages' => '28'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)الاستعلاء والاستفال',
                'num_pages' => '29'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)الاطباق والانفتاح',
                'num_pages' => '30'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)الإذلاق والإصمات',
                'num_pages' => '30'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)الصفير والقلقله واللين',
                'num_pages' => '31'
            ],
            [
                'lesson_ar' => '(الفصل الثالث)الانحراف والتكرير والتفشيوالاستطاله',
                'num_pages' => '32'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)التفخيم والترقيق ',
                'num_pages' => '34'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)الحروف المفخمة دائما',
                'num_pages' => '35'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)الحروف المرققة دائما',
                'num_pages' => '35'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)الحروف المفخمة تارة والمرققة تارة ',
                'num_pages' => '36'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)النون الساكنة والتنوين',
                'num_pages' => '39'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)الإظهار',
                'num_pages' => '40'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)الإدغام',
                'num_pages' => '41'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)الإقلاب',
                'num_pages' => '34'
            ],
            [
                'lesson_ar' => '(الفصل الرابع)الإخفاء',
                'num_pages' => '44'
            ],
            [
                'lesson_ar' => '(الفصل الخامس)الميم الساكنة',
                'num_pages' => '46'
            ],
            [
                'lesson_ar' => '(الفصل الخامس)النون والميم المشددتي',
                'num_pages' => '48'
            ],
            [
                'lesson_ar' => '(الفصل الخامس)علاقات الحروف',
                'num_pages' => '49'
            ],
            [
                'lesson_ar' => '(الفصل الخامس)أحكام اللام الساكنة',
                'num_pages' => '52'
            ],
            [
                'lesson_ar' => '(الفصل السادس)المد',
                'num_pages' => '55'
            ],
            [
                'lesson_ar' => '(الفصل السادس)المد الاصلي الطبيعي',
                'num_pages' => '56'
            ],
            [
                'lesson_ar' => '(الفصل السادس)بسبب الهمز',
                'num_pages' => '57'
            ],
            [
                'lesson_ar' => '(الفصل السادس)المد اللازم الكلمي ',
                'num_pages' => '58'
            ],
            [
                'lesson_ar' => '(الفصل السادس)المد العارض للسكون',
                'num_pages' => '59'
            ],
            [
                'lesson_ar' => '(الفصل السادس)المد اللين',
                'num_pages' => '59'
            ],
            [
                'lesson_ar' => '(الفصل السادس)أحكام المد في فواتح السور',
                'num_pages' => '59'
            ],
            [
                'lesson_ar' => '(الفصل السادس)الألفات السبعة',
                'num_pages' => '60'
            ],
            [
                'lesson_ar' => '(الفصل السادس)مسألة أقوى السببين ',
                'num_pages' => '61'
            ],
            [
                'lesson_ar' => '(الفصل السادس)مخطط يوضح  أقسام المدو ',
                'num_pages' => '62'
            ],
            [
                'lesson_ar' => '(الفصل السابع)همزتا القطع والوصل',
                'num_pages' => '64'
            ],
            [
                'lesson_ar' => '(الفصل السابع)التقاء الساكني',
                'num_pages' => '66'
            ],
            [
                'lesson_ar' => '(الفصل السابع)الوقف',
                'num_pages' => '67'
            ],
            [
                'lesson_ar' => '(الفصل السابع)السكت',
                'num_pages' => '70'
            ],
            [
                'lesson_ar' => '(الفصل السابع)كيفية الوقوف الصحيح',
                'num_pages' => '71'
            ],
            [
                'lesson_ar' => '(الفصل السابع)النبر في القران الكريم',
                'num_pages' => '75'
            ],
            [
                'lesson_ar' => '(الفصل السابع)علامات الوقف في المصحف',
                'num_pages' => '76'
            ],
            [
                'lesson_ar' => '(الفصل السابع)المصادر',
                'num_pages' => '77'
            ],
        ];

        return $chapters;
    }
}