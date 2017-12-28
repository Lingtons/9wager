                    <form class="form-horizontal" method="POST" action="{{route('join_bet')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
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
                                    Join Bet
                                </button>

                            </div>
                        </div>
                    </form>