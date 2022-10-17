<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectLeader;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('project_leaders')->get();
        // dd($projects);
        return view('welcome')->with([
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p_lead = ProjectLeader::all();
        return view('create')->with([
            'p_lead' => $p_lead
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required',
            'client' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'progress' => 'required'
        ]);

        $project = new Project;
        $project->project_name = $request->project_name;
        $project->client = $request->client;
        $project->leader_id = $request->leader_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->progress = $request->progress;
        $project->save();

        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Project::with('project_leaders')->findOrFail($id);
        $p_lead = ProjectLeader::all();
        return view('edit')->with([
            'data' => $data,
            'p_lead' => $p_lead
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Project::with('project_leaders')->findOrFail($id);
        $data->project_name = $request->project_name;
        $data->client = $request->client;
        $data->leader_id = $request->leader_id;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->progress = $request->progress;
        $data->update();

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Project $project)
    public function destroy($id)
    {
        $data = Project::findOrFail($id);
        $data->delete();

        return redirect()->route('project.index');
    }
}
