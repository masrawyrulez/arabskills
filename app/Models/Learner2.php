<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learner2 extends Model
{
    protected $table = 'WFP';
    protected $fillable = [
        'Learner_Name',
        'Learner_Code',
        'Date',
        'Course_Name',
        'Track',
        'Training_Duration',
        'Training_Area',
        'مدة التدريب',
        'التدريب',
        'التخصص'
    ];
}
