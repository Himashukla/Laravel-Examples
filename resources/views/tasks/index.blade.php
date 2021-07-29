@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               <div class="row">
               <div class="col-md-2">
                  <h5>{{ __('Tasks') }}</h5>
               </div>
               <div class="col-md-9">
                  <a href='{{route('tasks.create')}}' class='btn btn-primary'>Add Task</a>
               </div>
               </div>
            </div>

            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif

               <table class="table table-borered">
                  <tr>
                     <th>Title</th>
                     <th>Completed?</th>
                     <th>Start Date</th>
                     <th>End Date</th>
                  </tr>
                  @if($tasks->count() > 1)
                  @foreach($tasks as $t)
                  <tr>
                     <td>{{$t->name}}</td>
                     <td>
                        @if($t->completed == 1)
                        <span class="text-success font-weight-bold">Completed</span>
                        @else
                        <span class="text-danger font-weight-bold">Not Completed</span>
                        @endif
                     </td>
                     <td>{{date('d M Y',strtotime($t->start_date))}}</td>
                     <td>{{date('d M Y',strtotime($t->end_date))}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <td colspan="4" align="center">No Tasks Found.</td>
                  </tr>
                  @endif
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection