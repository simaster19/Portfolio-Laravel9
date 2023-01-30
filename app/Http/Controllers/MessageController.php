<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('dashboards.messages.index', [
            'dataMessage' => Message::all(),
            'title' => 'Message'
        ]);
    }

    public function show($id)
    {
        return view('dashboards.messages.detail', [
            'dataMessage' => Message::where('id', $id)->get()[0],
            'title' => 'Detail'
        ]);
    }

    public function destroy($id)
    {
        Message::destroy($id);

        return redirect('/message')->with('success', 'Data Berhasil di Hapus');
    }
}
