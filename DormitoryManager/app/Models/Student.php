<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Student_class', 'Student_faculty'
    ];
    protected $primaryKey ='Student_id';
    protected $table ='student';
}
