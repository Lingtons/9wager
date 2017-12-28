<?php

namespace App\Http\Controllers\Web;
use App\Models\Account;
use App\Models\Bet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\Category;

class BetsController extends Controller
{
    //
    public function user_bets(){
            return view('user.bets.list');
    }

    public function find_bet(){
            return view('user.bets.find');
    }

    public function view_bet($id)
    {
    
    $bet = Bet::where('code', $id )->first();
        if ($bet == NULL ) {
            return redirect()->back()->with('warning', "We are Sorry !, but no matching bet was found");
        }else{
            return view('user.bets.found_bet', compact('bet'));
        }
    }

    public function search_bet(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

    $bet = Bet::where('code', $request->code )->first();
        if ($bet == NULL ) {
            return redirect()->back()->with('warning', "We are Sorry !, but no matching bet was found");
        }else{
            return view('user.bets.found_bet', compact('bet'));
        }


    }


    public function create_game(){
        
        $categories = Category::all();
        return view('user.bets.create', compact('categories'));
    }

    public function bets($type){
            if($type == 'All'){
                $bets = Bet::all();
            }elseif ($type == 'Today') {
                $today = \Carbon\Carbon::today();
                $bets = Bet::WHERE('deadline', $today)->get();
            }elseif ($type == 'Verified') {
                $bets = Bet::WHERE('status', 'Verified')->get();
            }elseif ($type == 'Settled') {
                $bets = Bet::WHERE('status', 'Settled')->get();
            }elseif ($type == 'Active') {
                $bets = Bet::WHERE('status', 'Active')->get();
            }else{
                $bets = Bet::all();
            }
            return view('manage.bets.list', compact('bets', 'type'));
    }

    public function new_game(Request $request)
    
    {
        
      $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'deadline' => 'required',
            'option' => 'required',
            'category_id' => 'required',
        ]);

        $from = \Carbon\Carbon::now();
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->deadline);
        $diff_in_days = $to->diffInDays($from);

        $credit = Account::where('user_id', Auth::user()->id )->where('type', 'Credit')->get()->sum('amount');
        $debit = Account::where('user_id', Auth::user()->id )->where('type', 'Debit')->get()->sum('amount');

        if ($diff_in_days < 1){
            return redirect()->back()->with('warning', "Games must be 24hrs or above far from the end date!");
        }elseif ((($request->amount % 1000) != 0) || ($request->amount < 1000) ) {
            return redirect()->back()->with('warning', "Bet stake must be in multiple of 1000 naira !");
        }elseif (($credit - $debit - 1000) < $request->amount ){
            return redirect()->back()->with('warning', "Insufficient fund for this bet !");
        }else{

            $bet = new Bet();

            $bet->name = $request->name;
            $bet->code = $this->gen_random_str();
            $bet->type = $request->type;
            $bet->deadline = $request->deadline;
            $bet->amount = $request->amount;
            $bet->status = 'Active';
            $bet->user_id = Auth::user()->id;
            $bet->category_id = $request->category_id;

            if($bet->save()){
                $checks = DB::table('bet_user')
                            ->select('bet_id', 'user_id')
                            ->where('bet_id', $bet->id)
                            ->where('user_id', Auth::user()->id)
                            ->get();
                
                if (count($checks) > 0) {
                    //modify later to show bet page
                    return redirect()->back()->with('warning', "You are already a participant in this bet group !");
                }else{

                    $join_bet = DB::table('bet_user')->insert([
                    'bet_id' => $bet->id,
                    'user_id' => Auth::user()->id,
                    'my_option' => $request->option

                    ]);

                    if($join_bet){
                            Account::create([
                        'amount' => $request->input('amount'),
                        'type' => 'Debit',
                        'user_id' => Auth::user()->id,
                        'bet_id' => $bet->id,
                        ]);

                            //modify later to show bet page
                    return redirect()->back()->with('success', "You have successfully created and joined the bet group!");
                    }else{
                            //modify later to show bet page
                        return redirect()->back()->with('info', "You are created the bet group but could not join, Kindly join using the 7 digit code !");
                    }
                }                
            }else{
                //modify later to show bet page
                return redirect()->back()->with('danger', "Unable to create the bet group, an error occurred !");
            }

            
         
        }

    }

    public function join_bet(Request $request)
    
    {
        
      $this->validate($request, [
            'option' => 'required',
            'code' => 'required',
        ]);

        $bet = Bet::where('code', $request->code )->first(); 

        $from = \Carbon\Carbon::now();
        $to = $bet->deadline;
        $diff_in_days = $to->diffInDays($from);

        $credit = Account::where('user_id', Auth::user()->id )->where('type', 'Credit')->get()->sum('amount');
        $debit = Account::where('user_id', Auth::user()->id )->where('type', 'Debit')->get()->sum('amount');

        if ($diff_in_days < 1){
            return redirect()->route('find_bet')->with('warning', "Games must be 24hrs or above far from the end date!");
        }elseif (($credit - $debit - 1000) < $bet->amount ){
            return redirect()->route('find_bet')->with('warning', "Insufficient fund, You cannot join this bet !");
        }else{

            if(count($bet->bet_users) <= 5 ){
                $checks = DB::table('bet_user')
                            ->select('bet_id', 'user_id')
                            ->where('bet_id', $bet->id)
                            ->where('user_id', Auth::user()->id)
                            ->get();
                
                if (count($checks) > 0) {
                    //modify later to show bet page
                    return redirect()->route('find_bet')->with('warning', "You are already a participant in this bet group !");
                }else{

                    $join_bet = DB::table('bet_user')->insert([
                    'bet_id' => $bet->id,
                    'user_id' => Auth::user()->id,
                    'my_option' => $request->option,

                    ]);

                    if($join_bet){
                        Account::create([
                        'amount' => $bet->amount,
                        'type' => 'Debit',
                        'user_id' => Auth::user()->id,
                        'bet_id' => $bet->id,
                        ]);

                            //modify later to show bet page
                    return redirect()->back()->with('success', "You have successfully joined the bet group!");
                    }else{
                            //modify later to show bet page
                        return redirect()->route('find_bet')->with('error', "You were unable to be joined into the group !");
                    }
                }                
            }else{
                //modify later to show bet page
                return redirect()->route('find_bet')->with('warning', "We are sorry, maximum number of participants for this bet have been reached !");
            }

            
         
        }

    }

    public function gen_random_str(){

          $length = 5;
          $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
          $str = '';
          $max = mb_strlen($keyspace, '8bit') - 1;
          for ($i = 0; $i < $length; ++$i) {
              $str .= $keyspace[random_int(0, $max)];
          }

          $random_code = $str;
          return $random_code;

    }

}
