@extends('layouts.bank')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                    <h2>Transactions</h2>
                    
                    <div class="clearfix"></div>
                </div>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Reciever</th>
                              <th>Reference</th>
                              <th>Description</th>                            
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Reciever</th>
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
                              <td>{{$deposit->user->phone}}</td>
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
</div>
@endsection

