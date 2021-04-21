<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use Mail;
use DB;
use Session;
Use Log;

use App\Jobs\SendEmailJob;

class RoleController extends Controller
{
    public function __construct(Role $role)
    {
       
       $this->rolereg = $role;
    }

    public function addRole(){
        $getRoles = $this->rolereg->get();
        return view('admin.role',compact('getRoles'));
        }
        public function createRole(Request $request){
        
        $role = $this->rolereg->create($request->all());
        return back();
        }
        public function editRole($id){
        
        $editRoles = $this->rolereg->where('id',$id)->first();
        return view('admin.changerole',compact('editRoles'));
        }
        public function updateRole(Request $request){
        
        $this->rolereg->where('id',$request->id)->update($request->except(['_token']));
        return view('admin.index');
        }
        public function deleteRole($id)
        {
        $this->rolereg->where('id',$id)->delete();
        return back();
        }
}
