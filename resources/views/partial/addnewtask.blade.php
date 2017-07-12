 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">add new task</h4>
                      </div>
                      <div class="modal-body">
                     
                      
                      <form id="addnewuser" enctype="multipart/form-data" method="post" action="{{ url('/addnewtask') }}">
                       {{ csrf_field() }}
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                         <label>Assigned To User</label>
                          
                                <input id="taskname" type="text" class="form-control" name="taskname" value="{{ old('taskname') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('taskname') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             <label>Description</label>
                          
                               <textarea name="description" placeholder="description" class="form-control" rows="3" required>
                                 
                               </textarea>
                            </div>
                        

                        <div class="form-group">
                          <label>Assigned To User</label>
                          <select name="assignedto" class="form-control">
                          @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                           
                           
                          </select>
                        </div>

                        <div class="form-group">
                          <label>deadline</label>
                          <input type="date" name="deadline" class="form-control">
                          
                        </div>
                        <div class="form-group">
                          <label>AttachedFile</label>
                          <input type="file" name="file" class="form-control">
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button onclick="event.preventDefault(); document.getElementById('addnewuser').submit();" class="btn btn-success green"><i class="fa fa-share"></i> Add</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

