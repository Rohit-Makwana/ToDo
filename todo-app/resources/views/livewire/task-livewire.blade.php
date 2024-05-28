<div>
    <div class="row mt-5">
        <div class="col-xxl-4">
            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title text-center">TO DO</h4>
                    <hr class="border border-warning border-1 opacity-50">
                    @if(count($tasks) > 0)
                        @foreach ($tasks as $todo)
                            @if($todo?->status == 'to_do')
                            <div class="card text-start mb-3">
                                <div class="card-body bg-warning bg-opacity-50">
                                    <div class="row">
                                        <div class="col-xxl-6">
                                            <p class="card-text">{{ $todo?->title }}</p>
                                        </div>
                                        <div class="col-xxl-4">
                                            <div class="mb-3">
                                                @if(!$isEdit[$todo?->id])
                                                    <input type="text" class="form-control" value="{{ strToupper(str_replace('_', ' ', $todo?->status)) }}" disabled>
                                                @else
                                                    <select class="form-select" name="status" id="status" wire:model='status' @if(!$isEdit[$todo?->id]) disabled @endif>
                                                        <option value="to_do" @if($todo?->status == "to_do") selected @endif>TO-DO</option>
                                                        <option value="in_progress" @if($todo?->status == "in_progress") selected @endif>IN-PROGRESS</option>
                                                        <option value="complete" @if($todo?->status == "complete") selected @endif>COMPLETE</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 text-end">
                                            @if (!$isEdit[$todo?->id])
                                                <a class="btn  btn-sm edit" title="Edit" wire:click="editEmp({{ $todo->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>
                                                </a>
                                            @else
                                                <a class="btn  btn-sm edit" title="Edit" wire:click="updateEmp({{ $todo->id }})">
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
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title text-center">IN-PROGRESS</h4>
                    <hr class="border border-primary border-1 opacity-50">
                    @if(count($tasks) > 0)
                        @foreach ($tasks as $progress)
                            @if($progress?->status == 'in_progress')
                                <div class="card text-start">
                                    <div class="card-body bg-primary bg-opacity-50">
                                        <div class="row">
                                            <div class="col-xxl-6">
                                                <p class="card-text">{{ $progress?->title }}</p>
                                            </div>
                                            <div class="col-xxl-4">
                                                <div class="mb-3">
                                                    @if(!$isEdit[$progress?->id])
                                                        <input type="text" class="form-control" value="{{ strToupper(str_replace('_', ' ', $progress?->status)) }}" disabled>
                                                    @else
                                                        <select class="form-select" name="status" id="status" wire:model='status'>
                                                            <option value="to_do" @if($progress?->status == "to_do") selected @endif>TO-DO</option>
                                                            <option value="in_progress" @if($progress?->status == "in_progress") selected @endif>IN-PROGRESS</option>
                                                            <option value="complete" @if($progress?->status == "complete") selected @endif>COMPLETE</option>
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 text-end">
                                                @if (!$isEdit[$progress?->id])
                                                    <a class="btn  btn-sm edit" title="Edit" wire:click="editEmp({{ $progress->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                        </svg>
                                                    </a>
                                                @else
                                                    <a class="btn  btn-sm edit" title="Edit" wire:click="updateEmp({{ $progress->id }})">
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
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xxl-4">
            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title text-center">COMPLATE</h4>
                    <hr class="border border-success border-1 opacity-50">
                    @if(count($tasks) > 0)
                        @foreach ($tasks as $done)
                            @if($done?->status == 'complete')
                                <div class="card text-start">
                                    <div class="card-body bg-success bg-opacity-50">
                                        <div class="row">
                                            <div class="col-xxl-6">
                                                <p class="card-text">{{ $done?->title }}</p>
                                            </div>
                                            <div class="col-xxl-4">
                                                <div class="mb-3">
                                                    @if(!$isEdit[$done?->id])
                                                        <input type="text" class="form-control" value="{{ strToupper(str_replace('_', ' ', $done?->status)) }}" disabled>
                                                    @else
                                                        <select class="form-select" name="status" id="status" wire:model='status'>
                                                            <option value="to_do" @if($done?->status == "to_do") selected @endif>TO-DO</option>
                                                            <option value="in_progress" @if($done?->status == "in_progress") selected @endif>IN-PROGRESS</option>
                                                            <option value="complete" @if($done?->status == "complete") selected @endif>COMPLETE</option>
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-xxl-2 text-end">
                                                @if (!$isEdit[$done?->id])
                                                    <a class="btn  btn-sm edit" title="Edit" wire:click="editEmp({{ $done->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                        </svg>
                                                    </a>
                                                @else
                                                    <a class="btn  btn-sm edit" title="Edit" wire:click="updateEmp({{ $done->id }})">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
