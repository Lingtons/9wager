@extends('layouts.manage')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                    <h2>Banks <span class="m-l-50 pull-right"><a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addBank" ><i class="fa fa-plus"></i> Add Bank</a></span></h2>
                    @include('_includes.partials.bank_modal')
                    
                    <div class="clearfix"></div>
                </div>
					<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Logo</th>
                            
                          </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            
                        </tr>
                      </tfoot>
                      <tbody>
                          @if (count($banks))
                          @foreach($banks as $bank)
                          <tr>
                              <td>{{$bank->name}}</td>
                              <td><img src = "{{ asset('uploads/' . $bank->image_path)}}" alt="Bank Logo" height="40">
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

