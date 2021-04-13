<?php

namespace Modules\Authentication;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $table = "teams";
    protected $fillable = ['team_name'];
}
