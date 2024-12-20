<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'department_id',
    ];

    /**
     * Get the department the designation belongs to.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
