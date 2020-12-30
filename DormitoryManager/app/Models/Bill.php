<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Bill extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Room_id','Bill_name','Bill_create', 'Bill_pay','Bill_total','Bill_status'
    ];
    protected $primaryKey ='Bill_id';
    protected $table ='bill';
}

