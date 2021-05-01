<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = "admin";
    protected $fillable = ['username', 'password','name','email','phone','team_id','role_id'];

    public function Team()
    {
        return $this->belongsTo(Team::class,'team_id','id');
    }

    public function Role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
