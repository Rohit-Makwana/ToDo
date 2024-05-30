<div class="card text-start">
    <div class="card-body" ondrop="drop(event, '{{ $statuss }}')" ondragover="allowDrop(event)">
        <h4 class="card-title text-center">{{ strToupper(str_replace('_', ' ', $statuss)) }}</h4>
        <hr class="border border-{{ $color }} border-1 opacity-50">
        @if(count($tasks) > 0 && count($status_wise) > 0)
            @foreach ($tasks as $task)
                @if($task?->status == $statuss)
                    <div wire:key='{{ $task?->id }}' class="card text-start mb-2" draggable="true" ondragstart="drag(event, {{ $task->id }})">
                        <div class="card-body bg-{{ $color }} bg-opacity-50">
                            <div class="row">
                                <div class="col-xxl-6">
                                    @if(!$isEdit[$task?->id])
                                        <p class="card-text">{{ $task?->title }}</p>
                                    @else
                                        <input type="text" wire:model='title' class="form-control">
                                    @endif
                                </div>
                                <div class="col-xxl-4">
                                    <div class="mb-3">
                                        @if(!$isEdit[$task?->id])
                                            <input type="text" class="form-control" value="{{ strToupper(str_replace('_', ' ', $task?->status)) }}" disabled>
                                        @else
                                            <select class="form-select" name="status" id="status" wire:model='status' @if(!$isEdit[$task?->id]) disabled @endif>
                                                <option value="to_do" @if($task?->status == "to_do") selected @endif>TO-DO</option>
                                                <option value="in_progress" @if($task?->status == "in_progress") selected @endif>IN-PROGRESS</option>
                                                <option value="complete" @if($task?->status == "complete") selected @endif>COMPLETE</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xxl-2 text-end">
                                    @if (!$isEdit[$task?->id])
                                        <a class="btn  btn-sm edit" title="Edit" wire:click="editEmp({{ $task->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </a>
                                    @else
                                        <a class="btn  btn-sm edit" title="Edit" wire:click="updateEmp({{ $task->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                                <path d="M11 2H9v3h2z"/>
                                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="text-center">
                <span class="text-{{ $color }}"><b>{{  strtolower(str_replace('_', ' ', $statuss)) }} is empty !</b></span>
            </div>
        @endif
    </div>
</div>