<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Bill_Detail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Bill_id','Service_id','Old_index','New_index', 'Bill_pay','Price','Total'
    ];
    protected $table ='bill_detail';
}

