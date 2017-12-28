<div class="col-md-8">
    <form class="form-horizontal" method="POST" action="{{route('verify_bet', ['id'=> $bet->id ])}}">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="form-group">
                            
                            <div class="col-md-6 col-md-offset-3">
                            <label for="side" class="control-label">Update Winning Side</label><br><br>    
                                <select name="option" class="form-control" id="side" required>
                                    <option value="" selected >Take a Side</option>
                                    <option value="support" >Support</option>
                                    <option value="against" >Against</option>
                                </select>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="code" value="{{$bet->code}}">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Verify Bet
                                </button>

                            </div>
                        </div>
                    </form>    
</div>
                    
                <div class="col-md-4">
                 <h3 class="title text-center">Bet Details</h3>       
                <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                          <tr>
                            <th>Stake</th>
                            <td><b><i>NGN {{$bet->amount}}</i></b></td>
                          </tr>
                          <tr>                          
                          <tr>
                            <th>Code</th>
                            <td>{{$bet->code}}</td>
                          </tr>
                          <tr>
                            <th>Category</th>
                            <td>{{$bet->category->name}}</td>
                          </tr>
                          <tr>
                            <th>Type</th>
                            <td>{{$bet->type}}</td>
                          </tr>
                          <tr>
                            <th>Status</th>
                            <td>{{$bet->status}}</td>
                          </tr>
                          <tr>
                            <th>Participants</th>
                            <td>{{count($bet->bet_users)}} || <a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#view" ><i class="fa fa-eye-open"></i>View Participants</a></td>
                          </tr>
                          <tr>
                            <th>Created By</th>
                            <td>{{$bet->user->name}}</td>
                          </tr>
                      </tbody>                       
                    </table>

          
                    @include('_includes.partials.participants_modal')

        </div>