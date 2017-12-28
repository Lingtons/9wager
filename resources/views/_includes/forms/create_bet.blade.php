                    <form class="form-horizontal" method="POST" action="{{route('user.new_game')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Game Category</label>

                            <div class="col-md-6">
                            <select  class="form-control" name="category_id" required>
                                <option value="" selected>Select Game Category </option>
                                      @if(count($categories))
                                        
                                          @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                          @endforeach
                                        
                                      @endif
                                                                    
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Game Type</label>

                            <div class="col-md-6">
                                <select name="type" class="form-control" id="type" required>
                                    <option value="ProPlay" selected >ProPlay</option>
                                    <option value="ZeroPlay" >ZeroPlay</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}" id="stake">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="side" class="col-md-4 control-label">Take a Side</label>

                            <div class="col-md-6">
                                <select name="option" class="form-control" id="side" required>
                                    <option value="" selected >Take a Side</option>
                                    <option value="support" >Support</option>
                                    <option value="against" >Against</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" >
                            <label for="deadline" class="col-md-4 control-label">End Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" id="deadline" name="deadline" required>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Start Game
                                </button>

                            </div>
                        </div>
                    </form>