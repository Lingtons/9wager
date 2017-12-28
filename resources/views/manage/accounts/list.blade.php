@extends('layouts.manage')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2>{{$type}} Transactions </h2>
        
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th>User</th>
                              
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th>User</th>
                              
                        </tr>
                      </tfoot>
                      <tbody>
                          @if (count($all))
                          @foreach($all as $transaction)
                          <tr>
                              <td>{{$transaction->created_at->toFormattedDateString()}}</td>
                              <td>{{$transaction->amount}}</td>
                              <td>{{$transaction->type}}</td>
                              <td>{{$transaction->user->phone}}</td>
                              
                          </tr>


                          @endforeach

                          @endif
                      </tbody>
                       
                    </table>
        </div>
    </div>
</div>
@endsection

