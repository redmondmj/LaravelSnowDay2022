@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <example-component></example-component>
            <chart-component :yesvotes="{!! json_encode($data['yesVotes']) !!}" :novotes="'{{ $data['noVotes'] }}'">
            </chart-component>
            <!-- TODO: Wouldn't it make sense to move this table to a Vue Component as well? -->
            <div class="card mb-3">
                <div class="card-header">Votes</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <!--TODO: This should also show the day! -->
                            <th>Id</th>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>Snow Vote</th>
                        </tr>
                        {{-- @for($i = 0; $i < count($data['votes']); $i++) <tr>
                            <td><a href="/vote/show/{{ $data['votes'][$i]->id }}">{{ $data['votes'][$i]->id }}</a></td>
                            <td>{{ $data['votes'][$i]->user_id }}</td>
                            <td>{{ $data['votes'][$i]->name }}</td>
                            <td>{{ $data['votes'][$i]->school }}</td>
                            <td>{{ $data['votes'][$i]->vote }}</td>
                            </tr>
                            @endfor --}}
                        @foreach($data['votes'] as $vote) <tr>
                            <td><a href="/vote/show/{{ $vote->id }}">{{ $vote->id }}</a></td>
                            <td>{{ $vote->user_id }}</td>
                            <td>{{ $vote->name }}</td>
                            <td>{{ $vote->school }}</td>
                            <td>{{ $vote->vote }}</td>
                            </tr>
                            @endforeach
                    </table>
                    <a href="{{ URL::previous() }}" class="btn btn-info text-white" role="button">Go Back</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection