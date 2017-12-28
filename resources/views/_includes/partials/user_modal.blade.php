<div id="assign{{$user->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
                        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Assign to {{$user->name}}</h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{ route('assign_role', ['id' => $user->id ]) }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                <div class="row">
                    <div class="form-group">
                            <label for="role_id" class="col-md-4 control-label">Role (optional)</label>

                            <div class="col-md-6">
                            <select id="role_id{{$user->id}}" class="form-control" name="role_id" required>
                                <option value="" selected>Select Role </option>
                                      @if(count($roles))
                                        @if (Auth::user()->hasRole('superadministrator'))
                                          @foreach($roles as $assign)
                                              <option value="{{$assign->id}}">{{$assign->name}}</option>
                                          @endforeach
                                        @elseif (Auth::user()->hasRole('administrator'))
                                          @foreach($roles as $assign)
                                              @if(($assign->name === 'superadministrator') | ($assign->name === 'administrator'))
                                                @continue
                                              @else
                                                <option value="{{$assign->id}}">{{$assign->name}}</option>
                                              @endif
                                            @endforeach
                                        @endif
                                      @endif
                                                                    
                            </select>
                            </div>
                        </div>
                        <div class="form-group" id="bank{{$user->id}}">
                            <label for="bank_id" class="col-md-4 control-label">Bank</label>

                            <div class="col-md-6">
                            <select  class="form-control" name="bank_id">
                                <option value="" selected>Select Bank </option>
                                      @if(count($banks))
                                        
                                          @foreach($banks as $bank)
                                <option value="{{$bank->id}}">{{$bank->name}}</option>
                                          @endforeach
                                        
                                      @endif
                                                                    
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Assign 
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        $('#bank{{$user->id}}').hide(); 
    $('#role_id{{$user->id}}').change(function(){
        if($('#role_id{{$user->id}}').val() == '4') {
            $('#bank{{$user->id}}').show(); 
        } else {
            $('#bank{{$user->id}}').hide(); 
        } 
    });
    
    } );
    </script>
</div>

<!-- view modal -->
<div id="view{{$user->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
                        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{$user->name}}</h4>
            </div>
            <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('detach_role', ['id' => $user->id ]) }}" enctype="multipart/form-data" >

                        {{ csrf_field() }}
                        {{method_field('PUT')}}


                        <div class="form-group{{ $errors->has('bank_id') ? ' has-error' : '' }}" id="bank{{$user->id}}">
                            <label for="name" class="col-md-4 control-label">Roles</label>

                            <div class="col-md-6">

                            <select id="role_id{{$user->id}}" class="form-control" name="role_id" required>
                                <option value="" selected>View Role </option>
                                      @if(count($user->roles))
                                        @if (Auth::user()->hasRole('superadministrator'))
                                          @foreach($user->roles as $assign)
                                              <option value="{{$assign->id}}">{{$assign->name}}</option>
                                          @endforeach
                                        @endif
                                      @endif  
                                                                    
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Detach Role
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>