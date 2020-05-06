<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++)
        {
            $names = [
                'Aubrey Hlungwane',
                'Mike Hove',
                'Aubrey Hlungwane',
                'Mike Hove',
                'Aubrey Hlungwane',
                'Mike Hove',
            ];
            $jobTitle = [
                'Chairman at DTO',
                'CEO at TOC',
                'Chairman at DTO',
                'CEO at TOC',
                'Chairman at DTO',
                'CEO at TOC',
            ];

            for ($x = 0; $x < 4; $x++) {
                DB::table('testimonials')->insert([
                    'names' => $names[$x],
                    'job_title' => $jobTitle[$x],
                    'message' => 'All I can say is i love this app so much. it helps me to keep manage my time. Being productive. All I can say is i love this app so much. it helps me to keep manage my time. Being productive. ',
                    'book_id' => $i
                ]);
            }
        }
    }
}
