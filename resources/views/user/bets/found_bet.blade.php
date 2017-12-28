@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row row-eq-height">

@if ($bet)
                 <div class="col-md-8 col-md-offset-2">
            

    <h2 class="title text-center text-info">{{$bet->name}}</h2>
            
            <h4 class="text-danger text-center">{{$bet->deadline->toFormattedDateString()}}</h4>            
        </div> 
        <div class="col-md-6 col-md-offset-3">
          @include('_includes.forms.join_bet')
        </div>

                <div class="col-md-4 col-md-offset-4">
                 <h2 class="title lead text-center">Bet Details</h2>       
                <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                          <tr>
                            <th>Stake</th>
                            <td><b><i>NGN {{$bet->amount}}</i></b></td>
                          </tr>
                          <tr>                          
                          <tr>
                            <th>Code</th>
                            <td>{{$bet->code}}</td>
                          </tr>
                          <tr>
                            <th>Category</th>
                            <td>{{$bet->category->name}}</td>
                          </tr>
                          <tr>
                            <th>Type</th>
                            <td>{{$bet->type}}</td>
                          </tr>
                          <tr>
                            <th>Status</th>
                            <td>{{$bet->status}}</td>
                          </tr>
                          <tr>
                            <th>Participants</th>
                            <td>{{count($bet->bet_users)}} || <a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#view" ><i class="fa fa-eye-open"></i>View Participants</a></td>
                          </tr>
                          <tr>
                            <th>Created By</th>
                            <td>{{$bet->user->name}}</td>
                          </tr>
                      </tbody>                       
                    </table>

          
                    @include('_includes.partials.participants_modal')

        </div>
@else
    <div class="panel panel-default">
        <div class="panel-heading text-center">No Bet found</div>
                        
          </div>
@endif
    </div>
</div>

@endsection
