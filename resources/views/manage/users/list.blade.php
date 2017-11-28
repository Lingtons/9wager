@extends('layouts.manage')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                    <h2>Users</h2>
                    
                    <div class="clearfix"></div>
                </div>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Assign</th>

                            
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Assign</th>
                            
                        </tr>
                      </tfoot>
                      <tbody>
                          @if (count($users))
                          @foreach($users as $user)
                          <tr>
                              <td><a href="#" class = "text-dark" data-toggle="modal" data-target="#view{{$user->id}}" >{{$user->name}}</a>
                                </td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->phone}}</td>
                              <td><a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assign{{$user->id}}" ><i class="fa fa-plus"></i></a>
                                @include('_includes.partials.user_modal')
                              </td>
                          
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

