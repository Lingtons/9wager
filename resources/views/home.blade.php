@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-4">
                        <div class="panel panel_animate panel-bet">
                                <div class="panel-heading text-center">
                                        <img src="{{ asset('img/bet.png') }}">
                                </div>
                                <div class="panel-footer"> <a class="btn btn-lg btn-block btn-default" href="{{route('user.create_game')}}">CREATE BET</a> </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="panel panel_animate panel-bet">
                                <div class="panel-heading text-center">
                                        <img src="{{ asset('img/join.png') }}">
                                </div>
                                <div class="panel-footer"> <a class="btn btn-lg btn-block btn-default" href="{{route('find_bet')}}">JOIN A BET</a> </div>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="panel panel_animate panel-bet">
                                <div class="panel-heading text-center">
                                        <img src="{{ asset('img/all_bets.png') }}">
                                </div>
                                <div class="panel-footer"> <a class="btn btn-lg btn-block btn-default" href="{{route('bet_list')}}">BETS</a> </div>
                        </div>
                </div>
        </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <span class="pull-left"><a href="{{route('bet_list')}}" class="btn btn-primary btn-xs" ><i class="fa fa-list p-r-5"></i>Connected bets </a></span>

                    My own Bets <span class="pull-right"><a href="{{route('user.create_game')}}" class="btn btn-primary btn-xs" ><i class="fa fa-plus p-r-5"></i>Create Bet</a></span></div>
            </div>
        </div>

        <div class="col-md-12">
            @if (count(Auth::user()->bets))
                <table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                      <thead>
                          <tr>
                              <th>S/n</th>
                              <th>Name</th>
                              <th>Code</th>
                              <th>Category</th>
                              <th>Type</th>                              
                              <th>Status</th>                        
                              <th>View</th>
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                              <th>S/n</th>
                              <th>Name</th>
                              <th>Code</th>
                              <th>Category</th>
                              <th>Type</th>                              
                              <th>Status</th>                        
                              <th>View</th>

                        </tr>
                      </tfoot>
                      <tbody>
                          
                          @foreach(Auth::user()->bets as $key=>$bet)
                          <tr>
                            <td>{{$key+1}}</td>
                              <td><a href="{{route('view_bet', ['id' => $bet->code ])}}" class = "text-dark" >{{$bet->name, 0,9}}</a>
                                </td>
                              <td>{{$bet->code}}</td>
                              <td>{{$bet->category->name}}</td>
                              <td>{{$bet->type}}</td>
                              
                              <td>{{$bet->status}}</td>
                              
                              <td><a href="{{route('view_bet', ['id' => $bet->code ])}}" class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i></a>
                              </td>
                          
                          </tr>
                          @endforeach
                      </tbody>
                       
                    </table>
                @else
                <div class="panel panel-default">
                    <div class="panel-heading text-center">You have not created any bet yet</div>
                </div>
                @endif

            
        </div>
    </div>
</div>

@endsection
