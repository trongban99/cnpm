<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Facilities extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Facilities_name','Facilities_quantity','Facilities_brand'
    ];
    protected $primaryKey ='Facilities_id';
    protected $table ='Facilities';
}

