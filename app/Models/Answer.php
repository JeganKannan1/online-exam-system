<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = "table_marks";
    protected $fillable = ['user_id','test_title','score', 'total','skiped','team_id','role_id'];

    public function Test()
    {
        return $this->belongsTo(Test::class,'test_title','id');
    }
}
