@if (Session::has('danger'))
<div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Danger! &nbsp;</strong>{{ Session::get('danger') }}
</div>
@endif

@if (Session::has('info'))
<div class="col-md-8 col-md-offset-2 alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Info! &nbsp;</strong>{{ Session::get('info') }}
</div>
@endif

@if (Session::has('success'))
<div class="col-md-8 col-md-offset-2 alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success! &nbsp;</strong>{{ Session::get('success') }}
</div>
@endif

@if (Session::has('warning'))
<div class="col-md-8 col-md-offset-2 alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning! &nbsp;</strong>{{ Session::get('warning') }}
</div>
@endif

