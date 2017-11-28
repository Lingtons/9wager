<?php

namespace App\Http\Controllers\Web;
use App\Models\User;
use App\Models\Role;
use App\Models\Bank;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $banks = Bank::all();
        return view ('manage.users.list', compact('users','roles','banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function assign_role(Request $request, $id)
    {
        
        $this->validate($request, [
        'role_id' => 'required',
        ]);
        
        $unique_check = DB::table('role_user')
                     ->where('role_id', $request->role_id)
                     ->where('user_id', $id)
                     ->get();
                         

        $user = User::findOrFail($id);


        if (count($unique_check) > 0) {
                Session::flash('warning', 'Duplicate user role attempted'); 
                return redirect()->route('users.index');
        }else{

            if($user->attachRole($request->role_id)){
                if(($request->role_id == '4')&&($request->bank_id != '')){
                    $user->bank_id = $request->bank_id;
                    if($user->save()){
                        Session::flash('success', 'Successfully attached user to bank role'); 
                        return redirect()->route('users.index');
                    }
                        Session::flash('danger', 'Error encountered trying to attach user to bank role'); 
                        return redirect()->route('users.index');
                }
                Session::flash('success', 'Successfully attached role'); 
                return redirect()->route('users.index');
            }else{
                Session::flash('danger', 'Error encountered while trying to attach role'); 
                return redirect()->route('users.index');
            }
        }    
    }

        public function detach_role(Request $request, $id)
    {
        
        $this->validate($request, [
        'role_id' => 'required',
        ]);
        
        $unique_check = DB::table('role_user')
                     ->where('role_id', $request->role_id)
                     ->where('user_id', $id)
                     ->get();
                         

        $user = User::findOrFail($id);


        if (count($unique_check) > 0) {
            if($user->detachRole($request->role_id)){
                if(($request->role_id == '4')&&($user->bank_id != '')){
                    $user->bank_id = NULL;
                    if($user->save()){
                        Session::flash('success', 'Successfully detached user from bank role'); 
                        return redirect()->route('users.index');
                    }
                        Session::flash('danger', 'Error encountered trying to detach user from bank role'); 
                        return redirect()->route('users.index');

                }
                Session::flash('success', 'Successfully detached role'); 
                return redirect()->route('users.index');
            }else{
                Session::flash('danger', 'Error encountered while trying to detach role'); 
                return redirect()->route('users.index');
            }
        }else{
            Session::flash('warning', 'No attached roles were found'); 
            return redirect()->route('users.index');
        }    
    }
}
