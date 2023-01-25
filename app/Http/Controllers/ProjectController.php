<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        return view('dashboards.projects.index', [
            'dataUser' => User::where('id', $id)->with(['project'])->get()[0],
            'title' => 'Project'
        ]);
    }

    public function create()
    {
        return view('dashboards.projects.add', [
            'dataProject' => auth()->user(),
            'dataUser' => User::where('id', auth()->user()->id)->with(['project'])->get()[0],
            'title' => 'Add Project'
        ]);
    }

    public function store(Request $request)
    {
        $files = $request->file('images');


        $data = $request->validate([
            'id_admin' => 'required',
            'jenis_project' => 'required',
            'nama_project' => 'required',
            'dibuat_dengan' => 'required',
            'keterangan' => 'required'
        ]);
        $project = Project::create($data);

        if ($request->has('images')) {
            foreach ($files as $file) {
                $imageName = $project['id'] . "_image" . time() . rand(1, 1000) . "." . $file->extension();
                $file->move(public_path('project-images'), $imageName);
                Image::create([
                    'id_project' => $project['id'],
                    'gambar' => $imageName
                ]);
            }
        }

        return redirect('/project/create')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit($id)
    {

        return view('dashboards.projects.edit', [
            'dataProject' => Project::where('id', $id)->with('images')->get()[0],
            'title' => 'Edit'

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id_admin' => 'required',
            'jenis_project' => 'required',
            'nama_project' => 'required',
            'dibuat_dengan' => 'required',
            'keterangan' => 'required'
        ]);

        $idProject = Project::findOrFail($id);
        $idProject->update($data);

        return redirect('/project')->with('success', 'Data dengan ID:' . $id . ' Berhasil di update');
    }

    public function show($id)
    {
        return view('dashboards.projects.detail', [
            'dataProject' => Project::where('id', $id)->with('images')->get()[0],
            'title' => 'Detail'
        ]);
    }

    public function destroy($id)
    {
        $data = Image::where('id_project', $id)->get();

        if ($data) {
            foreach ($data as $images) {
                $fileImage = "project-images/" . $images->gambar;
                File::delete($fileImage);
            }
        }

        Project::destroy($id); //delete Cascade image


        return redirect('/project')->with('success', 'Data has been Deleted!');
    }
}
