<?php

namespace App\Models;

use App\Models\Term;
use App\Models\User;
use App\Models\Classes;
use App\Models\Class_arm;
use App\Models\AcademicSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = ['first_name','last_name','email', 'user_id','status', 'admission_no', 'rpin', 'class_id', 'class_arm_id', 'term_id', 'academic_sessions_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function classes()
{
    return $this->belongsTo(Classes::class, 'class_id');
}

public function class_arm()
{
    return $this->belongsTo(Class_arm::class, 'class_arm_id');
}

public function term()
{
    return $this->belongsTo(Term::class, 'term_id');
}

public function academicsessions()
{
    return $this->belongsTo(AcademicSession::class, 'academic_sessions_id');
}


}
