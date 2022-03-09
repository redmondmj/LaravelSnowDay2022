@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User: {{ $user->name }}</div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="post">
                        {{ method_field('put') }}
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name </label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roles" class="col-md-4 col-form-label text-md-right">Roles</label>

                            <div class="col-md-6">
                                @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                        id="roles_{{ $role->name }}" @if ($user->hasRole($role->name))
                                    checked
                                    @endif>
                                    <label for="roles_{{ $role->name }}">{{ $role->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-4"></div>

                            <div class="col-md-6">
                                <button class="btn btn-info text-white float-left" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@endsection
