 <aside class="sm-side col-md-4 col-sm-4 col-xs-12">
                      <div class="user-head" style="background: #5bc0de;">
                         
                          <div class="user-name">
                              <h5><a href="#">New Task</a></h5>
                              <span><a href="#">All your new task</a></span>
                          </div>
                         
                      </div>
                     @if($newtask)
                      <ul class="inbox-nav inbox-divider">
                       @foreach($newtask as $task)
                       
                          <li class="">
                           <form id="form{{$task->id}}" method="post" action="{{ url('/update') }}">
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$task->id}}">
                         <input type="hidden" name="statue" value="1">
                      
                              <a href="task/{{$task->id}}"><i class="fa fa-inbox"></i>{{$task->taskname}}
                              @if(Auth::user()->rol == '0') <span class="pull-right"><input type="checkbox"  onchange="$('#form{{$task->id}}').submit();" value="" <?php if($task->statue == 2) echo "checked"; ?> class="custom-control-input"></span>
                              @endif
                               <span class="label label-danger pull-right">{{$task->deadline}}</span> </a>

                           </form>
                          </li>
                          @endforeach
                         
                      </ul>
                      @else
                      <p>No new Tasks </p>
                      @endif
                     
                    

                  </aside>