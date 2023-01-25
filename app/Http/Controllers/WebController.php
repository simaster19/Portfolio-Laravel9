<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $dataProject = Project::with(['images', 'user'])->get();
        return view('index', [
            'user' => $dataProject->first()->user->name,
            'dataProject' => $dataProject
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email:dns',
            'message' => 'required|max:255'
        ]);


        Message::create($data);

        return redirect('/')->with('success', 'Pesan Berhasil Di Kirim');
    }

    public function show($id)
    {
        return view('detail', [
            'dataProject' => Project::where('id', $id)->with('images')->get()[0]
        ]);
    }
}
