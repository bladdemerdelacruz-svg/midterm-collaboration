<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'subjectName', 'units'];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_subject');
    }
}
