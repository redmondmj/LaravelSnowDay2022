<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Vote;

class VoteController extends Controller
{
    protected function validator()
    {
        return Validator::make($data, [
            'vote' => ['required', 'integer', 'digits_between:0,3'],
            'name' => ['string', 'max:255', 'unique:users'],
            'school' => ['string', 'max:255'],
        ]);

    }

    protected function store()
    {
        // test
        //return request()->all();
        // $vote = request()->all();
        // dd($vote);

        $vote = new Vote();

        $vote->user_id = request('user_id');
        $vote->name = request('name');
        $vote->school = request('school');
        $vote->vote = request('vote');

        $vote->save();

        // return view('home');
        return response()->json($vote);
    }

    public function index()
    {
        return view('vote.create');
        // return view('results');
    }
}
