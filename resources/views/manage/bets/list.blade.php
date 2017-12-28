@extends('layouts.manage')

@section('content')
<div class="container-fluid">
    <div class="row">
                <div class="col-md-12">
                        @if (count($bets))
                        <h2>{{$type}} Bets</h2>

                <table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                      <thead>
                          <tr>
                              <th>S/n</th>
                              <th>Name</th>
                              <th>Code</th>
                              <th>Category</th>
                              <th>Type</th>                              
                              <th>Status</th>                        
                              <th>Checkout</th>
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
                              <th>Checkout</th>

                        </tr>
                      </tfoot>
                      <tbody>
                          
                          @foreach($bets as $key=>$bet)
                          <tr>
                            <td>{{$key+1}}</td>
                              <td><a href="{{route('manage.checkout', ['code' => $bet->code])}}" class = "text-dark" data-toggle="modal" data-target="#view{{$bet->id}}" >{{$bet->name, 0,9}}</a>
                                </td>
                              <td>{{$bet->code}}</td>
                              <td>{{$bet->category->name}}</td>
                              <td>{{$bet->type}}</td>
                              
                              <td>{{$bet->status}}</td>
                              
                              <td><a href="{{route('manage.checkout', ['code' => $bet->code])}}" class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i></a>
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
