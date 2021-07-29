@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
                  <h5>{{ __('Add Task') }}</h5>
            </div>

            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               <form action="{{route('tasks.store')}}" method="POST">
                  @csrf
                  <input type="hidden" name="owner_id" value="{{Auth::user()->id}}"> 
               <table class="table table-borered">
                  <tr>
                     <th>Task Assignee</th>
                     <td>
                     <select name="user_id" class="form-control">
                        @foreach ($users as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                     </select>
                     </td>
                  </tr>
                  <tr>
                     <th>Task Title</th>
                     <td><input type="text" name="name" class="form-control"></td>
                  </tr> 
                  <tr>
                     <th>Task Description</th>
                     <td><textarea name="description" class="form-control"></textarea></td>
                  </tr>
                  <tr>
                     <th>Start Date</th>
                     <td><input type="date" name="start_date" class="form-control"></td>
                  </tr>
                  <tr>
                     <th>End Date</th>
                     <td><input type="date" name="end_date" class="form-control"></td>
                  </tr>                  
               </table>
               <div class="text-center"><input type="submit" name="submit" class="btn btn-primary"></div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection