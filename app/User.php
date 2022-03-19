<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'Firstname', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'users_projects');
    }

    public function projectForm()
    {
        return $this->hasMany(ProjectForm::class, 'student', 'id');
    }

    public function projectForm2()
    {
        return $this->hasMany(ProjectForm::class, 'professorSupervisor', 'id');
    }

    public function collegue()
    {
        return $this->belongsTo(Collegue::class);
    }

    public function professor_projects()
    {
        return $this->hasMany(Project::class);
    }

    public function professor_roles()
    {
        return $this->belongsTo(Role::class);
    }

    public function professor_collegues()
    {
        return $this->belongsToMany(Collegue::class, 'professors_colleges');
    }


    public function getImagePathAttribute()
    {
        if ($this->img_path == "") {
            if ($this->Gender == "female")
                return asset('/home/images/female.ico');
            else {
                return asset('/home/images/male.ico');
            }
        } else {
            return asset('uploads/images/' . $this->img_path);
        }
    }

    public function getProjectsInfoAttribute()
    {
        $projects = $this->projects()->whereHas('projectForm',function($q){
            return $q->where('status', 'like', 'completed');
        })->get();
        // dd($projects);
        return $projects;
    }
    //for professor
    public function getProjectsInfo2Attribute()
    {
        $projects = $this
            ->hasMany(ProjectForm::class, 'professorSupervisor', 'id')
            ->where('status', 'like', 'completed')
        ->get();
        // dd($projects);
        return $projects;
    }
}
