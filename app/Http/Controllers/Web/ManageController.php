<?php

namespace App\Http\Controllers\Web;
use App\Models\Bank;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    public function dashboard(){
    	return view('manage.dashboard');
    }

    public function list_banks(){
    	$banks = Bank::all();

    	return view('manage.bank.list', compact('banks'));
    }

	public function add_bank(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:banks,name',
            'image' => 'required',
        ]);

        $image_name = $this->storeImage($request);

        $bank = Bank::create([
            'name' => $request->input('name'),
            'image_path' => $image_name,
        ]);

        return redirect()->route('manage.banks')->with('success', "The bank $bank->name has successfully been created.");
    }

        private function storeImage($request)
    {
        $image = $request->file('image');
        if ($image) {
            $image_name = time().'.'.$request->image->getClientOriginalExtension();
            Image::make($image)->resize(128, 128)->save(public_path('uploads/'.$image_name));
            return $image_name;
        }
        return null;
    }
}
