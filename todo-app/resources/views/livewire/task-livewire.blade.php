<div>
    <div class="row mt-5">
        <div class="col-xxl-4">
            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title text-center">TO DO</h4>
                    <hr class="border border-warning border-1 opacity-50">
                    @if(count($todos) > 0)
                        @foreach ($todos as $todo)
                            <p class="card-text">{{ $todo?->title }}</p>
                            <div class="mb-3">
                                <select class="form-select" name="status" id="status" wire:model='status-{{ $todo?->id }}' wire:change='updateStatus({{ $todo?->id }})' required>
                                    <option value="to_do" @if($todo?->status == "to_do") selected @endif>TO-DO</option>
                                    <option value="in_progress" @if($todo?->status == "in_progress") selected @endif>IN-PROGRESS</option>
                                    <option value="complete" @if($todo?->status == "complete") selected @endif>COMPLETE</option>
                                </select>
                            </div>
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
                    @if(count($in_progress) > 0)
                        @foreach ($in_progress as $progress)
                            <p class="card-text">{{ $progress?->title }}</p>
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

                    {{-- TODO: ADD LOOP FOR COMPLATE LIST --}}
                    @if(count($complete) > 0)
                        @foreach ($complete as $done)
                            <p class="card-text">{{ $done?->title }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
