<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserInterface
{

    public function __construct(Admin $user)
    {
        $this->user = $user;
    }

    public function getUser($values){
      return $this->user->where('username',$values->username)->first();
    }
}
?>