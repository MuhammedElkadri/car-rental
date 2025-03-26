@extends('car_rent.layouts.dashboard')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> Users Tables</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
      <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Edit Role</th>
        <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($users as $user)
      <tr>
      <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->name }} </strong></td>
      <td>{{ $user->email }}</td>

      <td>
        <form action="{{ route('users.update', $user->id) }}" method="POST" style="display: inline;">
          @csrf
          @method('PUT')
          <select name="role" class="form-control">
            <option value="renter" {{ $user->hasRole('renter') ? 'selected' : '' }}>Renter</option>
            <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
            <option value="car owner" {{ $user->hasRole('car owner') ? 'selected' : '' }}>Car Owner</option>
          </select>
        </td>
        <td>
          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
      </td>
      </tr>
    @endforeach

        </tr>
      </tbody>
      </table>
    </div>
    </div>

  @endsection