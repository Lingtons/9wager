@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
                <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Bet<span class="pull-right"><a href="{{route('home')}}" class="btn btn-primary btn-xs" ><i class="fa fa-chevron-left p-r-5"></i>My Games</a></span></div>

                <div class="panel-body">
        @include('_includes.forms.create_bet')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        $('#stake').show(); 
    $('#type').change(function(){
        if($('#type').val() == 'ZeroPlay') {
            $('#stake').hide();
            //document.getElementById("amount").required = false;
            $('#amount').attr('required', false);
        } else {
            $('#stake').show(); 
            $('#amount').removeAttr('required');
        } 
    });
    } );
    </script>
@endsection
