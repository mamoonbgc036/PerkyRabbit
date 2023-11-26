<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Achievement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'department_id'];

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'achievement_employee', 'employee_id', 'achievement_id')->withPivot('achievement_date');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
