@extends('layouts.manage')

@section('content')
<div class="container-fluid">
    <div class="row row-eq-height">

@if ($bet)
                 <div class="col-md-8 col-md-offset-2">
            

    <h2 class="title text-center text-info">{{$bet->name}}</h2>
            
            <h4 class="text-danger text-center">{{$bet->deadline->toFormattedDateString()}}</h4>            
        </div> 
        
          @if($bet->status == 'Active')
            @include('_includes.forms.verify_bet')
          @else
            @include('_includes.forms.reward_bet')
          @endif
@else
    <div class="panel panel-default">
        <div class="panel-heading text-center">No Bet found</div>
                        
          </div>
@endif
    </div>
</div>

@endsection
