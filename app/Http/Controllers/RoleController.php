<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

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
    /**
     * view add new role 
     * return view
     */
    public function addRole(){
        $getRoles = $this->rolereg->get()->except(["id"=>1]);
        return view('admin.role',compact('getRoles'));
    }
    /**
     * add new role 
     * return view
     * @param $request
     */
    public function createRole(RoleRequest $request){
        try{
            $validated = $request->validated();
                $getTeam = $this->rolereg->where('role_name',$request->role_name)->first();
                if(empty($getTeam)){
                    $role = $this->rolereg->create($request->all());
                    toastr()->success('Role created successfully');
                    return back();
                }else{
                    toastr()->error('Entered role already exists');
                    return back();
                }
        }catch(Throwable $exception){
                return redirect()->route('dashboard')
                ->with('error',$exception->getMessages());
                Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * edit role 
     * return view
     * @param $id
     */
    public function editRole($id){
        $editRoles = $this->rolereg->where('id',$id)->first();
        return view('admin.changerole',compact('editRoles'));
    }
    /**
     * update role 
     * return view
     * @param $request
     */
    public function updateRole(RoleRequest $request){
        try{
            $validated = $request->validated();
            $this->rolereg->where('id',$request->id)->update($request->except(['_token']));
            toastr()->success('Role edited successfully');
            return redirect('/role');
        }catch(Throwable $exception){
            return redirect()->route('dashboard')
            ->with('error',$exception->getMessages());
            Log::info('admin login',$exception->getMessages());
        }
    }
    /**
     * delete role 
     * return view
     * @param $id
     */
    public function deleteRole($id)
    {
        $this->rolereg->where('id',$id)->delete();
        toastr()->success('Role deleted successfully');
        return back();
    }
}
