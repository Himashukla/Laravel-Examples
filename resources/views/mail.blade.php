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
               <form action="{{route('send.email')}}" method="POST">
                  @csrf
               <table class="table table-borered">
                  <tr>
                     <th>Enter Emails comma seperated</th>
                     <td>
                        <textarea name="emails" class="form-control"></textarea>
                     </td>
                  </tr>
               </table>
               <div class="text-center"><input type="submit" name="submit" class="btn btn-primary"></div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection