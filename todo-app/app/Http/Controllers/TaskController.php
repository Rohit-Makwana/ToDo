<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() {

    }

    public function create() {

    }

    public function store(TaskRequest $request) {

        try {
            Task::create([
                'title' => $request->title,
                'description' => $request?->description,
                'status' => $request->status,
                'admin_id' => Auth::user()->id,
                'admin_user' => Auth::user()->name,
                'admin_state' => 'A',
                'admin_time' => date('y-m-d H:m:s'),
                'admin_saved' => 1,
                'toggle' => 0
            ]);

            return redirect()->route('home')->with('status','create Task Successfully !');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error',$e->getMessage());
        }
    }

    public function edit() {

    }

    public function update () {

    }
}
