<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    //
    protected $table = "queries";
    protected $fillable = ['user_id', 'team_id','test_id','query','option4','re_assign'];
    
    public function Admin()
    {
        return $this->belongsTo(Admin::class,'user_id','id');
    }
    public function Team()
    {
        return $this->belongsTo(Team::class,'team_id','id');
    }
    public function Test()
    {
        return $this->belongsTo(Test::class,'test_id','id');
    }
}
