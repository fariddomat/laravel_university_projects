<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectForm extends Model
{
    protected $guarded=[];

    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function studentsForm()
    {
        return $this->belongsTo(User::class, 'student', 'id');
    }

    public function professorSuper()
    {
        return $this->belongsTo(User::class, 'professorSupervisor', 'id');
    }

    public function laboratorySuper()
    {
        return $this->belongsTo(User::class, 'laboratorySupervisor', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
