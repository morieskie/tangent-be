<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // protected $casts = ['id' => 'string'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public $fillable = [
         'id',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'street',
        'street',
        'city',
        'country',
        'postal_code',
        'date_of_birth'
    ];
    public $hidden = ['created_at', 'updated_at'];

    public function skills()
    {
        return $this->hasMany(EmployeeSkill::class);
    }
}
