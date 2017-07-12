@extends('layouts.app')
<style type="text/css">
    body{
        font-family: 'Open Sans', sans-serif;
       background-color: #e5e8ef;
}
.singleone{
    background: #009df7;
    border-radius: 15px;
    padding: 10px;
    color: #fff;
}
</style>

@section('content')
@include('partial.addnewtask')
@include('partial.addnewuser')
<div style="padding: 3px !important; margin-top: 72px;">

  <div class="col-md-10 col-md-offset-1 singleone">
      @foreach($newtask as $task)
      <h3 style="text-align: center;">{{$task->taskname}}</h3>
      <p style="text-align: center;">DeadLine:-{{$task->deadline}}</p>
      <p style="text-align: center;">assignedTo:-{{$task->user->name}}</p>

      
      <hr>
      <p>
          {{$task->description}}
      </p>
     <hr>
     @if($task->attachfile)
      <p style="text-align: center;">download attached Files :- <a href="download/{{$task->attachfile}}" class="btn btn-default stat-item">
                      <i class="fa fa-cloud-download"></i>
      </a></p>
      @endif

      
      @endforeach
  </div>
</div>
  
@endsection
