<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;

        return view('dashboards.index', [
            'dataUser' => User::where('id', $id)->withCount(['project'])->get()[0],
            'dataMessage' => Message::all(),
            // 'dataImage' => Image::all(),
            'title' => 'Dashboard'

        ]);
    }
}
