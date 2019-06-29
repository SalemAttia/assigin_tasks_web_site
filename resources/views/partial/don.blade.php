 <aside class="sm-side col-md-4 col-sm-4 col-xs-12">
                      <div class="user-head" style="background: green;">
                         
                          <div class="user-name">
                              <h5><a href="#">Done Task</a></h5>
                              <span><a href="#" style="color: #fff;">All your Don task</a></span>
                          </div>
                         
                      </div>
                      @if($done)
                      <ul class="inbox-nav inbox-divider">
                       @foreach($done as $task)
                          <li class="">
                           <form id="form{{$task->id}}" method="post" action="{{ url('/update') }}">
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$task->id}}">
                         <input type="hidden" name="statue" value="3">
                      
                              <a href="task/{{$task->id}}"><i class="fa fa-inbox"></i>{{$task->taskname}} 
                               @if(Auth::user()->rol == '1')
                              <span class="pull-right"><input type="checkbox"  onchange="$('#form{{$task->id}}').submit();" value="" <?php if ($task->statue === 0) {
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
                    

                  </aside>