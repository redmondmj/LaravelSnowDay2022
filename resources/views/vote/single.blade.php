@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vote: {{ $vote->id }}</div>
                    <div class="card-body">
                        <p>It looks like {{ $vote->name }} voted "{{ $vote->vote }}" for a snow day tomorrow at {{ $vote->school }}.</p>

                        @if ($vote->vote == '1')
                            <p>{{ $vote->name }} is pretty smart. Looks like it might be a snow day!</p>
                        @else
                            <p>{{ $vote->name }} is pretty smart. Might not be a snow day tomorrow.</p>
                        @endif
                        <!-- TODO: Can we add a link to delete this vote>? -->
                        {{-- <button href="{{ URL::previous() }}" class="btn btn-primary" type="button">Go Back!</button> --}}
                        <a href="{{ URL::previous() }}" class="btn btn-info text-white" role="button">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
@endsection