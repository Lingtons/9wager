@extends('layouts.bank')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Credit Transaction</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('bank.new_deposit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Credit Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" required autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Phone Contact
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="number" pattern="\d{11}" title="Phone Number (Format: 0703 320 2415" class="form-control" name="phone" value="{{ old('phone') }}" required >

                                <!-- <span><a href="#" data-toggle="tooltip" data-placement="right" title="enter correctly"><i class="fa fa-question-circle"></i></a>
                                </span>    -->
                                

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('bank_reference') ? ' has-error' : '' }}">
                            <label for="bank_reference" class="col-md-4 control-label">Trans Ref</label>

                            <div class="col-md-6">
                                <input id="bank_reference" type="text" class="form-control" name="bank_reference" required>
                                @if ($errors->has('bank_reference'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_reference') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Fund Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

