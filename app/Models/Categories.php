<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name'];
    protected $fillable1 = ['gender'];
    protected $fillable2 = ['birth'];
    protected $fillable3 = ['address'];
    protected $fillable4 = ['phone'];
    protected $fillable5 = ['email'];
}
