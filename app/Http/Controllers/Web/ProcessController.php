<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\Account;
use Session;

class ProcessController extends Controller
{
    //
    

	public function checkout($code){

    	$bet = Bet::where('code', $code )->first();

    	$bet_win = $this->get_winners($bet);
    	$bet_loss = $this->get_losers($bet);

        if ($bet == NULL ) {
            return redirect()->back()->with('warning', "We are Sorry !, but no matching bet was found");
        }else{

            return view('manage.bets.checkout', compact('bet','bet_win','bet_loss'));
        }
    }

    public function verify_bet(Request $request, $id){

    	$this->validate($request, [
        'option' => 'required',
        ]);

    	$bet = Bet::findOrFail($id);
    	$bet->status = 'Verified';
    	$bet->win_option = $request->option;

      	if ($bet->save()) {
      	
            return redirect()->back()->with('success', "Successfully verified and updated the bet");
        }else{
        	    return redirect()->back()->with("We are Sorry !, but we could not verify the bet");
        	
        }
    }

    public function reward_bet(Request $request){
    	$this->validate($request, [
        'code' => 'required',
        ]);

        $bet = Bet::where('code', $request->code )->first();
        $winners = $this->get_winners($bet)->bet_users;
        $losers = $this->get_losers($bet)->bet_users;

        $num_losers = $losers->count();
        $num_winners = $winners->count();
        $gross_win = $bet->amount * $num_losers;
        $commission = $gross_win * 0.1;
        $dividend = $gross_win - $commission;
        $ind_win = $dividend/$num_winners;

        foreach ($winners as $key => $winner) {
        	Account::create([
	            'amount' => $ind_win+$bet->amount,
	            'type' => 'Reward',
	            'description'=> 'Bet Win Profit :'.$ind_win.'Stake returned :'.$bet->amount,
	            'bank_reference' => 'Bet win reward',
	            'user_id' => $winner->id,
	            'bet_id' => $bet->id,
	            'bank_id' => NULL,
	        	]);
        }

        Account::create([
	            'amount' => $commission,
	            'type' => 'Commission',
	            'description'=> 'Administration Commission',
	            'bank_reference' => 'Administration Commission',
	            'user_id' => 1,
	            'bet_id' => $bet->id,
	            'bank_id' => NULL,
	        	]);

        $bet->status = 'Settled';

        if ($bet->save()) {
        	               //modify later to show bet page
                return redirect()->back()->with('success', "Successfully rewarded and settled bet !");
        }else{
        	return redirect()->back()->with('danger', "Unable to reward or settle bet !");
        }
    }

    private function get_winners($active_bet){

    	$win = Bet::with(['bet_users' => function($query) use ($active_bet){
    				$query->where('my_option', $active_bet->win_option);
    	} ])->where('code', $active_bet->code )->first();

    	return $win;

    }

    private function get_losers($active_bet){

    	$loss = Bet::with(['bet_users' => function($query) use ($active_bet){
    				$query->where('my_option', '<>', $active_bet->win_option);
    	} ])->where('code', $active_bet->code )->first();

    	return $loss;
    	
    }
}
