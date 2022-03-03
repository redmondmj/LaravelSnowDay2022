@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Cast A Vote') }}<i class="fa fa-thumbs-up ml-2" aria-hidden="true"></i>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('vote.create') }}">
                        @csrf

                        @guest
                        <div class="row justify-content-center">
                            <p class="h1">Hey Stranger!!!</p>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <p class="">Let's get to know you first: (or <a href="../register">register</a> to avoid
                                this)</p>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"
                                placeholder="What should we call you?">{{ __('Name') }} <i class="fa fa-user ml-2"
                                    aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                <!-- TODO: This validation is not implimented yet -->
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right">{{ __('School') }}<i
                                    class="fa fa-graduation-cap ml-2" aria-hidden="true"></i></label>

                            <div class="col-md-6">
                                <input id="school" type="text" class="form-control @error('school') is-invalid
                                    @enderror" name="school" value="{{ old("school") }}" autocomplete="school">
                                <!-- TODO: This validation is not implimented yet -->
                                @error("school")
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <!-- TODO: Vue: Since we now have name and school in the form above why not
                                put it in the message like we do for logged in users. See Vue ExampleComponent-->
                            <p class="h3 text-center my-5">So, will there be a snow day for your school tomorrow?</p>
                        </div>

                        @else
                        <div class="row d-flex justify-content-center">
                            <p class="display-4 text-center">Welcome {{ Auth::user()->name }}!!!</p>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <p class="h3 text-center mb-5">So, will there be a snow day for
                                {{ Auth::user()->school ?? school}} tomorrow?</p>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="school" value="{{ Auth::user()->school }}">
                        @endguest

                        <div class="row">
                            <div class="col-6 d-flex justify-content-center">
                                <button class="btn btn-outline-success btn-lg p-5" name="vote" value="1"
                                    type="submit"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Yes! <i
                                        class="fa fa-snowflake-o" aria-hidden="true"></i></button>
                            </div>
                            <div class="col-6 d-flex justify-content-center">
                                <button class="btn btn-outline-danger btn-lg p-5" name="vote" value="0" type="submit">
                                    <i class="fa fa-sun-o" aria-hidden="true"></i> No!<i class="fa fa-sun-o p-1"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection