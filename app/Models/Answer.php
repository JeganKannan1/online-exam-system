<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = "table_marks";
    protected $fillable = ['score', 'total','skiped','team_id','role_id'];
}
