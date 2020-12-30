<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Room extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Room_name','Room_address','Room_type', 'Room_price','Room_acreage','Number_people', 'Room_status'
    ];
    protected $primaryKey ='Room_id';
    protected $table ='room';
}

