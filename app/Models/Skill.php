<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public $fillable = ['name'];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}
