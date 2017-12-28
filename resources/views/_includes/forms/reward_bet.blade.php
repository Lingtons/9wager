<div class="col-md-8">
<div class="col-md-12">
  <h3>Winners</h3>
<table class="table table-striped table-bordered">
  <tbody>
    <tr>
      <th>Name</th>
      <th>Phone</th>
      <th>Side</th>
    </tr>
    @foreach($bet_win->bet_users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->pivot->my_option}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div class="col-md-12">
  <h3>Losers</h3>
  <table class="table table-striped table-bordered">
  <tbody>
    <tr>
      <th>Name</th>
      <th>Phone</th>
      <th>Side</th>
    </tr>
    @foreach($bet_loss->bet_users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->pivot->my_option}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

                <div class="col-md-4">
                 <h3 class="title text-center">Bet Outcome</h3>       


                 <form class="form-horizontal" method="POST" action="{{route('manage.reward_bet')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                                             Total Losers =  l <br>
                 Total Winners = w <br>
                 Actual Total Share, ats = stake * l <br>
                 Commission, c = ats * 0.01 <br>
                 Total Users Dividend, tud = ats - c <br>
                 Individual gain = tud / w
                            
                          </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-6 col-md-offset-3">
                              <input type="hidden" name="code" value="{{$bet->code}}">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Process Bet Reward
                                </button>

                            </div>
                        </div>
                    </form>    

                

        </div>