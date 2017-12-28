@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
                <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Find Bet<span class="pull-right"><a href="{{route('home')}}" class="btn btn-primary btn-xs" ><i class="fa fa-chevron-left p-r-5"></i>Back</a></span></div>

                <div class="panel-body">
        @include('_includes.forms.find_bet')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
