@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Customers</h6>
              <a href="/customers/create" class="btn btn-primary float-end">Add Customer</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                      <td>{{ $customer->name }}</td>
                      <td>{{ $customer->email }}</td>
                      <td class="text-center">{{ $customer->address }}</td>
                      <td class="text-center">{{ $customer->phone }}</td>
                      <td>
                          <form action="/customers/{{ $customer->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="/customers/{{ $customer->id }}/edit" class="btn btn-warning">Edit</a>
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
