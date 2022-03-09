@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Management:</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">User id</th>
                                    <th scope="col">User NAme</th>
                                    <th scope="col">Email</th>
                                    <!-- <th scope="col">Roles</th> -->
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                            <td>
                                            <a href="{{ route('users.edit', $user->id )}}"><button class="btn btn-info text-white float-left mr-2" type="submit">Edit</button></a>
                                            <form action="{{ route('users.destroy', $user)}}" method="post" class="float-left">
                                                {{ method_field('DELETE')}}
                                                @csrf
                                                <button class="btn btn-danger text-white" type="submit">Delete</button></a>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>

                        <a href="{{ URL::previous() }}" class="btn btn-info text-white" role="button">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
@endsection
