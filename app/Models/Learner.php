<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    protected $table = 'learners';
    protected $fillable = [
        'learner_code',
        'learner_name',
        'client_name',
        'program_name',
        'awarded_date',
        'image_name',
    ];
}
