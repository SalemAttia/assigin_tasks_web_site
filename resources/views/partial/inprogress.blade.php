 <aside class="sm-side col-md-4 col-sm-4 col-xs-12">
                      <div class="user-head" style="background: #c4c4c4;">
                         
                          <div class="user-name">
                              <h5><a href="#">In progress Task</a></h5>
                              <span><a href="#" style="color: #fff;">All your in Progress task</a></span>
                          </div>
                         
                      </div>
                      @if($inprogress)
                      <ul class="inbox-nav inbox-divider">
                       @foreach($inprogress as $task)
                         <li class="">
                           <form id="form{{$task->id}}" method="post" action="{{ url('/update') }}">
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$task->id}}">
                         <input type="hidden" name="statue" value="2">
                      
                              <a href="task/{{$task->id}}"><i class="fa fa-inbox"></i>{{$task->taskname}} 
                               @if(Auth::user()->rol == '0')
                              <span class="pull-right"><input type="checkbox"  onchange="$('#form{{$task->id}}').submit();" value="" <?php if ($task->statue === 2) {
    echo 'checked';
} ?> class="custom-control-input"></span>
                              @endif
                               <span class="label label-danger pull-right">{{$task->deadline}}</span> </a>


                           </form>
                          </li>
                          @endforeach
                         
                      </ul>
                      @else
                      <p>No new Tasks </p>
                      @endif

                        @if($rejected)
                      <ul class="inbox-nav inbox-divider">
                      <span class="label label-danger " style="padding: 5px;">Rejected Tasks</span> 
                      <br>
                       @foreach($rejected as $task)
                         <li class="">
                           <form id="form{{$task->id}}" method="post" action="{{ url('/update') }}">
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$task->id}}">
                         <input type="hidden" name="statue" value="2">
                      
                              <a href="task/{{$task->id}}"><i class="fa fa-inbox"></i>{{$task->taskname}} 
                               @if(Auth::user()->rol == '0')
                              <span class="pull-right"><input type="checkbox"  onchange="$('#form{{$task->id}}').submit();" value="" <?php if ($task->statue === 2) {
    echo 'checked';
} ?> class="custom-control-input"></span>
                              @endif
                               <span class="label label-danger pull-right">{{$task->deadline}}</span> </a>
                                </a>
                               

                           </form>
                          </li>
                          @endforeach
                         
                      </ul>
                      @else
                      <p>No new Tasks </p>
                      @endif
                     
                    

                  </aside>