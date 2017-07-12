 <!--  Modals-->
                
                <br>
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">add new user</h4>
                      </div>
                      <div class="modal-body">
                    
                      <form id="addnewuse" enctype="multipart/form-data" method="post" action="{{ url('/addnewuser') }}">
                       {{ csrf_field() }}
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">user Rol</label>

                            <div class="col-md-6">
                                <select name="rol" class="form-control">
                            <option value="0">user</option>
                            <option value="1">admin</option>
                            
                           
                          </select>
                            </div>
                        </div>
           
                          
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">position</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="position" value="{{ old('position') }}">

                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button onclick="event.preventDefault(); document.getElementById('addnewuse').submit();" class="btn btn-success green"><i class="fa fa-share"></i> Add</button>
                      </div>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
              </div>



              <!-- End Modals-->