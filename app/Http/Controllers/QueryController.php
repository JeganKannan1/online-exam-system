<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Query;
use App\Models\Admin;
use App\Models\Answer;
use App\Jobs\QueryJob;
use App\Jobs\ResponseJob;

use Session;
class QueryController extends Controller
{
    //

    public function __construct(Admin $user,Test $test,Query $query,Answer $answer)
    {
       $this->userreg = $user;
       $this->test = $test;
       $this->query = $query;
       $this->answer = $answer;
    }
    /**
     * view user query page
     * return view
     */
    public function query(){
        $teamId = Session::get('team_id');
        $id = Session::get('id');
        $testName = $this->answer->with('Test')->where('user_id', $id)->where('team_id', $teamId)->get();
        return view('employee.query',compact('teamId','id','testName'));
    }
    /**
     * send user query as a mail to admin 
     * return back
     */
    public function userQuery(Request $request){
        $user = $this->query->create($request->all());
        $details=new QueryJob($request->all());
        dispatch($details);
        toastr()->success('Requested your query,You will get mail once admin accept');
        return back();
    }
    /**
     * reassign test to user by deleting the request retest record in db
     * and sends a mail to user 
     * return back
     */
    public function deleteTest($id,$testId){
        $status = $this->query->where('test_id', $testId)->where('user_id', $id)->update(array('re_assign'=>1));
        $deleteTest = $this->answer->where('user_id', $id)->where('test_title', $testId)->delete();
        $details = $this->userreg->where('id',$id)->first();
        $details=new ResponseJob($details);
        dispatch($details);
        toastr()->success('Test re-assigned successfully');
        return back();
    }
    /**
     * view user query to admin 
     * return view
     */
    public function showQuery(){
        $showQuery = $this->query->with('Admin','Team','Test')->get();
        return view('support.showquery',compact('showQuery'));
    }
}
