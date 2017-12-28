@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			
                    <div class="row">
                      
                    
                    <div class="col-md-6">
                      <h2>Account Stats </h2>
                      <table class="table">
                      <tr>
                        <th>Total Credits</th>
                        <td>NGN {{$credit}}</td>
                      </tr>
                      <tr>
                        <th>Total Debits</th>
                        <td>NGN {{$debit}}</td>
                      </tr>
                      <tr>
                        <th>Total Balance </th>
                        <td>NGN {{$credit - $debit}}</td>
                      </tr>
                      <tr>
                        <th>Available Balance</th>
                        <td>NGN {{$credit - $debit - 1000}}</td>
                      </tr>
                      <tr>
                        <td colspan="2"><span class="btn text-info"><b>You need enough fund to create or join a bet</b></span><a href="#" class="btn btn-primary btn-md pull-right">Fund Account Now</a></td>
                        
                      </tr>
                    </table>
                    </div>
                    <!-- <div class="col-md-6">
                      <h2>Fund Account </h2>
                                            <table class="table">
                      <tr>
                        <th>Total Credits</th>
                        <td>NGN {{$credit}}</td>
                      </tr>
                      <tr>
                        <th>Total Debits</th>
                        <td>NGN {{$debit}}</td>
                      </tr>
                      
                    </table>
                    </div> -->
                    </div>

                    <h2>Transactions History </h2>
        
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th>Reference</th>
                              <th>Description</th>                            
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th>Reference</th>
                              <th>Description</th>                            
                        </tr>
                      </tfoot>
                      <tbody>
                          @if (count($deposits))
                          @foreach($deposits as $deposit)
                          <tr>
                              <td>{{$deposit->created_at->toFormattedDateString()}}</td>
                              <td>{{$deposit->amount}}</td>
                              <td>{{$deposit->type}}</td>
                              <td>{{$deposit->bank_reference}}</td>
                              <td>{{$deposit->description}}</td>                          
                          </tr>


                          @endforeach

                          @endif
                      </tbody>
                       
                    </table>
        </div>
    </div>
</div>
@endsection

