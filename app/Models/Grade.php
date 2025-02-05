<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Grade extends Model
{
    use HasFactory;

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
    protected $with = ['department'];
    protected $fillable = ['nama', 'department_id'];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }


}
