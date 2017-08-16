@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->


        <!-- New Task Form -->

        @include('inc.error')
        <form action="{{ route('tasks.store')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
        <div class="col-sm-offset-3 col-sm-6">
            <h2>Current Lists</h2>
        
        @if(count($tasks) > 0)
            <table class = "tabel table-striped">
                <thead>
                    <th>Tasks</th>
                    <th>nbsp;</th>
                </thead>
                <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td></td>
                                <td>
                                    <form  action = "{{route('tasks.destroy', $task->id)}}"  method = "POST">
                                            <button type = "submit" class = "btn btn-danger">Delete</button>
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
                </table>
        @else
        <h3>there is no tasks</h3>
        @endif
        </div>

  

    <!-- TODO: Current Tasks -->
@endsection