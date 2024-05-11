<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $primaryKey = 'employer_id';

    // Les attributs que vous pouvez assigner massivement.
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password', 
        'role',
        'ad_id',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


}
