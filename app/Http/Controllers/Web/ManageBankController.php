<?php

namespace App\Http\Controllers\Web;
use App\Models\Account;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageBankController extends Controller
{
    //
    public function dashboard(){
    	return view('bank.dashboard');
    }

    public function list(){

    	if(Auth::user()->bank != NULL){
    		$deposits = Account::WHERE('bank_id',Auth::user()->bank->id)->get();
    		return view('bank.list', compact('deposits'));
    	}else{
    		return redirect()->back()->with('danger', "We were unable to resolve the represented bank of the logged in user!");
    	}

    	
    }

    public function new_deposit(Request $request)
    {
        //
        $this->validate($request, [
            'amount' => 'required|numeric',
            'phone' => 'required|numeric',
            'bank_reference' => 'required|unique:accounts',
		]);

		$user = User::WHERE('phone',$request->phone)->first();
		Auth::user()->id;
		
		
		if(Auth::user()->bank != NULL){
			if($user == NULL){
			return redirect()->back()->with('danger', "No Account with the phone number was found.");
			}else{
				$description = $request->bank_reference.'From'.Auth::user()->bank->name;

				$deposit = Account::create([
	            'amount' => $request->input('amount'),
	            'type' => 'Credit',
	            'description'=> $description,
	            'bank_reference' => $request->input('bank_reference'),
	            'user_id' => $user->id,
	            'bank_id' => Auth::user()->bank->id,
	        	]);

	        	if($deposit){
	        		return redirect()->route('bank.list')->with('success', "The account $user->phone has successfully been creditted.");
	        	}else{
	        		return redirect()->back()->with('danger', "An attempt to credit the account $user->phone failed.");
	        	}
			}
		}else{
			return redirect()->back()->with('danger', "We were unable to resolve the represented bank of the logged user!");
		}
    }
}
