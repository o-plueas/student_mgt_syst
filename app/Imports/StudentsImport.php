<?php


namespace App\Imports;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    protected $class_id;
    protected $class_arm_id;
    protected $term_id;
    protected $academic_sessions_id;

    public function __construct($class_id, $class_arm_id, $term_id, $academic_sessions_id)
    {
        $this->class_id = $class_id;
        $this->class_arm_id = $class_arm_id;
        $this->term_id = $term_id;
        $this->academic_sessions_id = $academic_sessions_id;
    }

    public function model(array $row)
    {
        return DB::transaction(function () use ($row) {
              // Skip empty rows
        if (!isset($row[0]) || empty($row[0])) {
            return null;
        }

        dump($row); die;

            $first_name = $row[0] ?? null; // Column A
            $last_name = $row[1] ?? null;  // Column B
            $email = $row[2] ?? null;     
            // Create user
            $user = User::create([

                'name' => $first_name . ' '. $last_name,
                'email' => $email,
                'password' => bcrypt('student1'),
            ]);
            $user->assignRole('student');

            // Generate admission number
            $lastAdNo = Student::where('class_id', $this->class_id)->latest('id')->value('admission_no');
            $serial = $lastAdNo ? (int)substr($lastAdNo, -2) + 1 : 1;
            $adno = sprintf('PSA/%s/%02d', now()->year, $serial);

            $rpin = $user->id . $user->id . substr($adno, -2);

            return Student::create([
                'user_id' => $user->id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'admission_no' => $adno,
                'rpin' => $rpin,
                'class_id' => $this->class_id,
                'class_arm_id' => $this->class_arm_id,
                'term_id' => $this->term_id,
                'academic_sessions_id' => $this->academic_sessions_id,
            ]);
        });
    }
}
