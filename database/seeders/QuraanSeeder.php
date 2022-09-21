<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mockery\Matcher\Subset;

class QuraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make a subject with name = القرءان
        $subject = Subject::create([
            'name' => 'القران الكريم'
        ]);


        // make 114 lesson inside the lesson table with the id of the subject you created above

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الفاتحه'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'البقره'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'ال عمران'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النساء'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المائده'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الانعام'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الإعراف'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الإنفال'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'التوبة'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'يونس'
        ]);

        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'هود'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'يوسف'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الرعد'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'إبراهيم'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الحجر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النحل'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الإسراء'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الكهف'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'مريم'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'طه'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الأنبياء'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الحج'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المؤمنون'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النور'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الفرقان'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الشعراء'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النمل'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'القصص'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'العنكبوت'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الروم'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'لقمان'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'السجده'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الاحزاب'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'سبأ'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'فاطر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'يس'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الصافات'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'ص'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الزمر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'غافر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'فصلت'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الشورى'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الزخرف'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الدخان'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الجاثيه'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الاحقاف'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'محمد'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الفتح'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الحجرات'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'ق'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الذاريات'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الطور'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النجم'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'القمر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الرحمن'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الواقعة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الحديد'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المجادلة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الحشر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الممتحنة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الصف'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الجمعة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المنافقون'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'التغابن'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الطلاق'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'التحريم'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الملك'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'القلم'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الحاقة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المعارج'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'نوح'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الجن'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المزمل'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المدثر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'القيامة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الإنسان'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المرسلات'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النبأ'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النازعات'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'عبس'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'التكوير'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الانفطار'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المطففين'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الانشقاق'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'البروج'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الطارق'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الأعلى'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الغاشية'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الفجر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'البلد'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الشمس'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الليل'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الضحى'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الشرح'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'التين'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'العلق'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'القدر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'البينة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الزلزلة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'العاديات'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'القارعة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'التكاثر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'العصر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الهمزة'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الفيل'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'قريش'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الماعون'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الكوثر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الكافرون'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'النصر'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'المسد'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الإخلاص'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الفلق'
        ]);
        Lesson::create([
            'subject_id' => $subject->id,
            'title'      => 'الناس'
        ]);
    }
}