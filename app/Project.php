<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Project extends Model
{

    use Rateable;
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(User::class, 'users_projects');
    }

    public function professors()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function projectForm()
    {
        return $this->belongsTo(ProjectForm::class);
    }


    //search project [project,student,professor]
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->wherehas('projectForm', function ($qu) use ($search) {
                return $qu->where('title', 'like', "%$search%")
                    ->orWhere('about', 'like', "%$search%")
                    ->orWhere('goal', 'like', "%$search%")
                    ->orWhere('skills', 'like', "%$search%")
                    ->orWherehas('professorSuper', function ($qu2) use ($search) {
                        return $qu2->where('Firstname', 'like', "%$search%")
                            ->orWhere('Lastname', 'like', "%$search%");
                    });
            })->orWherehas('students', function ($qu2) use ($search) {
                return $qu2->where('Firstname', 'like', "%$search%")
                    ->orWhere('Lastname', 'like', "%$search%");
            });
        });
    }

    public function scopeWhenCategory($query, $category)
    {
        return $query->when($category, function ($q) use ($category) {
            return $q->whereHas('projectForm', function ($qu) use ($category) {
                return $qu->wherehas('category', function ($qu2) use ($category) {
                    return $qu2->where('id', "$category");
                });
            });
        });
    }

    public function scopeWhenCollegues($query, $collegue)
    {
        return $query->when($collegue, function ($q) use ($collegue) {
            return $q->whereHas('students', function ($qu) use ($collegue) {
                return $qu->wherehas('collegue', function ($qu2) use ($collegue) {
                    return $qu2->where('id',"$collegue");
                });
            });
        });
    }
    public function comments()
    {
        return $this->hasMany(ProjectComment::class);
    }

    public function getCoverPathAttribute()
    {
        if ($this->cover == "") {
            return asset('/home/images/p-6.jpg');
        } else {
            return asset('uploads/cover/images/' . $this->cover);
        }
    }
}
