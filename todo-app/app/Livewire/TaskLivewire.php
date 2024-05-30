<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskLivewire extends Component
{
    public $todos = [];
    public $in_progress = [];
    public $complete = [];
    public $tasks = [];
    public $status = '';
    public $title = '';

    public $isEdit = [];

    public function render()
    {
        $this->resetTask();
        return view('livewire.task-livewire');
    }

    public function mount() {
        $this->resetTask();
        $this->defaultStatus();
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = Task::find($taskId);
        if(!$task){
            return redirect()->route('home')->with('error','Please Drop Valid Task !');
        }
        $task->status = $newStatus;
        $task->save();

        $this->resetTask();
    }

    public function defaultStatus() {
        if(count($this->tasks) > 0) {
            foreach($this->tasks as $i) {
                $this->isEdit[$i->id] = false;
            }
        }
    }

    public function editEmp($id) {
        try {
            $task = Task::findOrFail($id);
            if( !$task) {
                return session()->flash('error','Employee Task not found');
            } else {
                $this->status = $task->status;
                $this->title = $task->title;
                $this->isEdit[$id] = true;
            }
        } catch (\Exception $ex) {
            return session()->flash('error','Something goes wrong !');
        }
    }

    public function resetFields()
    {
        $this->status = '';
        $this->title = '';
    }

    public function updateEmp($id) {
        try {
            Task::whereId($id)->update([
                'status' => $this->status,
                'title' => $this->title,
            ]);
            session()->flash('status','Employee Task Updated Successfully!!');
            $this->resetFields();
            $this->isEdit[$id] = false;
        } catch (\Exception $ex) {
            dd(session()->flash('status','Something goes wrong!!'));
        }
    }

    public function resetTask() {
        $this->tasks = Task::all();
        $this->todos = Task::where('status','to_do')->get();
        $this->in_progress = Task::where('status','in_progress')->get();
        $this->complete = Task::where('status','complete')->get();
    }
}
