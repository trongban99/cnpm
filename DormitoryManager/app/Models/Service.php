<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Service_name','Service_unit', 'Service_price','Service_desc'
    ];
    protected $primaryKey ='Service_id';
    protected $table ='Service';
}

