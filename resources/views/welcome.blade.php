@extends('layouts.app')


@section('content')
<div id="wrapper">
    <h1>Task Management </h1>

    <form method="post" action="{{ route('index') }}">
        {{ csrf_field() }}
        <input type="text" name="search" class="input">
        <input type="submit">
    </form>
    <div class="col-12">
        @if (Session::has('success'))
            <p class="text-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                {{ Session::get('success') }}
            </p>
        @endif
    </div>
    <form name="form" name="form">
        {{ csrf_field() }}
        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th><span>Id</span></th>
                <th><span>Name</span></th>
                <th><span>Phone</span></th>
                <th><span>Email</span></th>
                <th><span></span></th>
                <th><span></span></th>
            </tr>
            </thead>
            <tbody id="deletse">
            @foreach($tasks as $key => $task )
                <tr>
                    <td class="lalign">{{ ++$key }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->phone }}</td>
                    <td>{{ $task->email }}</td>
                    <td><a href="{{ route('update', $task->id) }}">Update</a></td>
                    <td><a href="#" class="delete-task" id="{{ $task->id }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    <a href="{{ route('insert', ['id' => 0]) }}" class="color"><h2>add new</h2></a>
</div>
{{ $tasks->links() }}
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.delete-task').click(function () {
            var taskId = $(this).attr('id');
            // taskId.preventDefault();
            $.ajax({
                url: "http://localhost:8000/delete/" + taskId,
                type: "GET",
                data: {
                    'id': taskId
                },

                success: function (data) {
                    window.location = "/";
                }
            });

        });
    });

</script>
<script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js"></script>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js'></script>

@endsection
 