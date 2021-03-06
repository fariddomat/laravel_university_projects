<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Model
{

    protected $guarded=[];
    public function user()
      {
          return $this->belongsTo(User::class);
      }

      public function replies()
      {
          return $this->hasMany(ProjectComment::class, 'project_id');
      }
}
