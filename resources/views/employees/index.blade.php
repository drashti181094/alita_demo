@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div>
                <h2>Employee Management system</h2>
            </div>
            <div>
                <a href="{{route('employees.create')}}">Create New Employee</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ ++$i}}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
                <form action="{{route('employees.destroy',$employee->id)}}" method="post">
                    <a href="{{route('employees.show', $employee->id)}}">Show</a>
                    <a href="{{route('employees.edit', $employee->id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $employees->links() !!}
@endsection