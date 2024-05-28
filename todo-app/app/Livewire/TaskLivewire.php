<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskLivewire extends Component
{
    public $todos = [];
    public $in_progress = [];
    public $complete = [];
    public $status = '';

    public function render()
    {
        return view('livewire.task-livewire');
        // return view('home');
    }

    public function mount() {
        $this->todos = Task::where('status','to_do')->get();
        $this->in_progress = Task::where('status','in_progress')->get();
        $this->complete = Task::where('status','complete')->get();
    }

    public function updateStatus($id) {
        dd($id,$this->status);
    }
}
