<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Registration extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Room_id','Student_id','Registration_create', 'NumberOfMonth','Registration_pay','Registration_status'
    ];
    protected $primaryKey ='Registration_id';
    protected $table ='Registration';
}

