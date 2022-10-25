<?php


if (!function_exists("chapterQuran")) {

    function chapterQuran()
    {
        $chapters = [
            [
                'surah_ar' => 'سورة الفاتحة',
                'surah_count' => '7',
            ],
            [
                'surah_ar' => 'سورة البقرة',
                'surah_count' => '286'
            ],
            [
                'surah_ar' => 'سورة ال عمران',
                'surah_count' => '200'
            ],
            [
                'surah_ar' => 'سورة النساء',
                'surah_count' => '176'
            ],
            [
                'surah_ar' => 'سورة المائده',
                'surah_count' => '120'
            ],
            [
                'surah_ar' => 'سورة الانعام',
                'surah_count' => '165'
            ],
            [
                'surah_ar' => 'سورة الإعراف',
                'surah_count' => '206'
            ],
            [
                'surah_ar' => 'سورة الإنفال',
                'surah_count' => '75'
            ],
            [
                'surah_ar' => 'سورة التوبة',
                'surah_count' => '129'
            ],
            [
                'surah_ar' => 'سورة يونس',
                'surah_count' => '109'
            ],
            [
                'surah_ar' => 'سورة هود',
                'surah_count' => '123'
            ],
            [
                'surah_ar' => 'سورة يوسف',
                'surah_count' => '111'
            ],
            [
                'surah_ar' => 'سورة الرعد',
                'surah_count' => '43'
            ],
            [
                'surah_ar' => 'سورة إبراهيم',
                'surah_count' => '52'
            ],
            [
                'surah_ar' => 'سورة الحجر',
                'surah_count' => '99'
            ],
            [
                'surah_ar' => 'سورة النحل',
                'surah_count' => '128'
            ],
            [
                'surah_ar' => 'سورة الإسراء',
                'surah_count' => '111'
            ],
            [
                'surah_ar' => 'سورة الكهف',
                'surah_count' => '110'
            ],
            [
                'surah_ar' => 'سورة مريم',
                'surah_count' => '98'
            ],
            [
                'surah_ar' => 'سورة طه',
                'surah_count' => '135'
            ],
            [
                'surah_ar' => 'سورة الأنبياء',
                'surah_count' => '112'
            ],
            [
                'surah_ar' => 'سورة الحج',
                'surah_count' => '78'
            ],
            [
                'surah_ar' => 'سورة المؤمنون',
                'surah_count' => '118'
            ],
            [
                'surah_ar' => 'سورة النور',
                'surah_count' => '64'
            ],
            [
                'surah_ar' => 'سورة الفرقان',
                'surah_count' => '77'
            ],
            [
                'surah_ar' => 'سورة الشعراء',
                'surah_count' => '227'
            ],
            [
                'surah_ar' => 'سورة النمل',
                'surah_count' => '93'
            ],
            [
                'surah_ar' => 'سورة القصص',
                'surah_count' => '88'
            ],
            [
                'surah_ar' => 'سورة العنكبوت',
                'surah_count' => '69'
            ],
            [
                'surah_ar' => 'سورة الروم',
                'surah_count' => '60'
            ],
            [
                'surah_ar' => 'سورة لقمان',
                'surah_count' => '34'
            ],
            [
                'surah_ar' => 'سورة السجده',
                'surah_count' => '30'
            ],
            [
                'surah_ar' => 'سورة الاحزاب',
                'surah_count' => '73'
            ],
            [
                'surah_ar' => 'سورة سبأ',
                'surah_count' => '54'
            ],
            [
                'surah_ar' => 'سورة فاطر',
                'surah_count' => '45'
            ],
            [
                'surah_ar' => 'سورة يس',
                'surah_count' => '83'
            ],
            [
                'surah_ar' => 'سورة الصافات',
                'surah_count' => '182'
            ],
            [
                'surah_ar' => 'سورة ص',
                'surah_count' => '88'
            ],
            [
                'surah_ar' => 'سورة الزمر',
                'surah_count' => '75'
            ],
            [
                'surah_ar' => 'سورة غافر',
                'surah_count' => '85'
            ],
            [
                'surah_ar' => 'سورة فصلت',
                'surah_count' => '54'
            ],
            [
                'surah_ar' => 'سورة الشورى',
                'surah_count' => '53'
            ],
            [
                'surah_ar' => 'سورة الزخرف',
                'surah_count' => '89'
            ],
            [
                'surah_ar' => 'سورة الدخان',
                'surah_count' => '59'
            ],
            [
                'surah_ar' => 'سورة الجاثيه',
                'surah_count' => '37'
            ],
            [
                'surah_ar' => 'سورة الاحقاف',
                'surah_count' => '35'
            ],
            [
                'surah_ar' => 'سورة محمد',
                'surah_count' => '38'
            ],
            [
                'surah_ar' => 'سورة الفتح',
                'surah_count' => '29'
            ],
            [
                'surah_ar' => 'سورة الحجرات',
                'surah_count' => '18'
            ],
            [
                'surah_ar' => 'سورة ق',
                'surah_count' => '45'
            ],
            [
                'surah_ar' => 'سورة الذاريات',
                'surah_count' => '60'
            ],
            [
                'surah_ar' => 'سورة الطور',
                'surah_count' => '49'
            ],
            [
                'surah_ar' => 'سورة النجم',
                'surah_count' => '62'
            ],
            [
                'surah_ar' => 'سورة القمر',
                'surah_count' => '55'
            ],
            [
                'surah_ar' => 'سورة الرحمن',
                'surah_count' => '78'
            ],
            [
                'surah_ar' => 'سورة الواقعة',
                'surah_count' => '96'
            ],
            [
                'surah_ar' => 'سورة الحديد',
                'surah_count' => '29'
            ],
            [
                'surah_ar' => 'سورة المجادلة',
                'surah_count' => '22'
            ],
            [
                'surah_ar' => 'سورة الحشر',
                'surah_count' => '24'
            ],
            [
                'surah_ar' => 'سورة الممتحنة',
                'surah_count' => '13'
            ],
            [
                'surah_ar' => 'سورة الصف',
                'surah_count' => '14'
            ],
            [
                'surah_ar' => 'سورة الجمعة',
                'surah_count' => '11'
            ],
            [
                'surah_ar' => 'سورة المنافقون',
                'surah_count' => '11'
            ],
            [
                'surah_ar' => 'سورة التغابن',
                'surah_count' => '18'
            ],
            [
                'surah_ar' => 'سورة الطلاق',
                'surah_count' => '12'
            ],
            [
                'surah_ar' => 'سورة التحريم',
                'surah_count' => '12'
            ],
            [
                'surah_ar' => 'سورة الملك',
                'surah_count' => '30'
            ],
            [
                'surah_ar' => 'سورة القلم',
                'surah_count' => '52'
            ],
            [
                'surah_ar' => 'سورة الحاقة',
                'surah_count' => '52'
            ],
            [
                'surah_ar' => 'سورة المعارج',
                'surah_count' => '44'
            ],
            [
                'surah_ar' => 'سورة نوح',
                'surah_count' => '28'
            ],
            [
                'surah_ar' => 'سورة الجن',
                'surah_count' => '28'
            ],
            [
                'surah_ar' => 'سورة المزمل',
                'surah_count' => '20'
            ],
            [
                'surah_ar' => 'سورة المدثر',
                'surah_count' => '56'
            ],
            [
                'surah_ar' => 'سورة القيامة',
                'surah_count' => '40'
            ],
            [
                'surah_ar' => 'سورة الإنسان',
                'surah_count' => '31'
            ],
            [
                'surah_ar' => 'سورة المرسلات',
                'surah_count' => '50'
            ],
            [
                'surah_ar' => 'سورة النبأ',
                'surah_count' => '40'
            ],
            [
                'surah_ar' => 'سورة النازعات',
                'surah_count' => '46'
            ],
            [
                'surah_ar' => 'سورة عبس',
                'surah_count' => '42'
            ],
            [
                'surah_ar' => 'سورة التكوير',
                'surah_count' => '29'
            ],
            [
                'surah_ar' => 'سورة الانفطار',
                'surah_count' => '19'
            ],
            [
                'surah_ar' => 'سورة المطففين',
                'surah_count' => '36'
            ],
            [
                'surah_ar' => 'سورة الانشقاق',
                'surah_count' => '24'
            ],
            [
                'surah_ar' => 'سورة البروج',
                'surah_count' => '22'
            ],
            [
                'surah_ar' => 'سورة الطارق',
                'surah_count' => '17'
            ],
            [
                'surah_ar' => 'سورة الأعلى',
                'surah_count' => '19'
            ],
            [
                'surah_ar' => 'سورة الغاشية',
                'surah_count' => '22'
            ],
            [
                'surah_ar' => 'سورة الفجر',
                'surah_count' => '30'
            ],
            [
                'surah_ar' => 'سورة البلد',
                'surah_count' => '18'
            ],
            [
                'surah_ar' => 'سورة الشمس',
                'surah_count' => '15'
            ],
            [
                'surah_ar' => 'سورة الليل',
                'surah_count' => '21'
            ],
            [
                'surah_ar' => 'سورة الضحى',
                'surah_count' => '11'
            ],
            [
                'surah_ar' => 'سورة الشرح',
                'surah_count' => '8'
            ],
            [
                'surah_ar' => 'سورة التين',
                'surah_count' => '8'
            ],
            [
                'surah_ar' => 'سورة العلق',
                'surah_count' => '19'
            ],
            [
                'surah_ar' => 'سورة القدر',
                'surah_count' => '5'
            ],
            [
                'surah_ar' => 'سورة البينة',
                'surah_count' => '8'
            ],
            [
                'surah_ar' => 'سورة الزلزلة',
                'surah_count' => '8'
            ],
            [
                'surah_ar' => 'سورة العاديات',
                'surah_count' => '11'
            ],
            [
                'surah_ar' => 'سورة القارعة',
                'surah_count' => '11'
            ],
            [
                'surah_ar' => 'سورة التكاثر',
                'surah_count' => '8'
            ],
            [
                'surah_ar' => 'سورة العصر',
                'surah_count' => '3'
            ],
            [
                'surah_ar' => 'سورة الهمزة',
                'surah_count' => '9'
            ],
            [
                'surah_ar' => 'سورة الفيل',
                'surah_count' => '5'
            ],
            [
                'surah_ar' => 'سورة قريش',
                'surah_count' => '4'
            ],
            [
                'surah_ar' => 'سورة الماعون',
                'surah_count' => '7'
            ],
            [
                'surah_ar' => 'سورة الكوثر',
                'surah_count' => '3'
            ],
            [
                'surah_ar' => 'سورة الكافرون',
                'surah_count' => '6'
            ],
            [
                'surah_ar' => 'سورة النصر',
                'surah_count' => '3'
            ],
            [
                'surah_ar' => 'سورة المسد',
                'surah_count' => '5'
            ],
            [
                'surah_ar' => 'سورة الإخلاص',
                'surah_count' => '4'
            ],
            [
                'surah_ar' => 'سورة الفلق',
                'surah_count' => '5'
            ],
            [
                'surah_ar' => 'سورة الناس',
                'surah_count' => '6'
            ],

        ];
        return $chapters;
    }
}