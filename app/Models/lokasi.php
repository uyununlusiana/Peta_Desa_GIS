<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;
    public $fillable =['nama', 'lat','lang','marker'];
    public $timestamps = true;
}
