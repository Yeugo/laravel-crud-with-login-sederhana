@extends('dashboard')

@section('content')
<div class="container">
  <div class="row">
  <h2>Section title</h2>
    <a href="{{ route('create') }}" class="btn btn-primary">Create New</a>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Usia</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->email }}</td>
              <td>{{ $customer->address }}</td>
              <td>{{ $customer->age }}</td>
              <td>
                  <a href=" {{ route('update', ['customer_id'=>$customer->id] ) }}" class="btn btn-warning">Update</a>
                  <form action="{{ route('delete', ['customer_id'=>$customer->id] ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection