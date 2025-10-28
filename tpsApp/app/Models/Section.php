<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['sectionName', 'room'];

    // A section has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // A section can have many subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'section_subject');
    }
}
