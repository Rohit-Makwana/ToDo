<div>
    <div class="row mt-5">
        <div class="col-xxl-4 col-md-4">
            {{-- TO DO --}}
            @include('livewire.partial.task_list',['statuss' => 'to_do','color' => 'warning','task' => $tasks, 'status_wise' => $todos])
        </div>
        <div class="col-xxl-4 col-md-4">
            {{-- IN PROGRESS --}}
            @include('livewire.partial.task_list',['statuss' => 'in_progress','color' => 'primary','task' => $tasks , 'status_wise' => $in_progress])
        </div>
        <div class="col-xxl-4 col-md-4">
            {{-- COMPLETE --}}
            @include('livewire.partial.task_list',['statuss' => 'complete','color' => 'success','task' => $tasks, 'status_wise' => $complete])
        </div>
    </div>    
    <script>
        // TODO: Understand Following Script:
        function allowDrop(event) {
            event.preventDefault();
        }
        
        function drag(event, taskId) {
            event.dataTransfer.setData("taskId", taskId);
        }
        
        function drop(event, newStatus) {
            event.preventDefault();
            var taskId = event.dataTransfer.getData("taskId");
            @this.call('updateTaskStatus', taskId, newStatus);
        }

        // DEMO EXAPMLE OF SHORT USING DRAG AND DROP
        // let root = document.querySelector('[drag-root]')

        // root.querySelectorAll('[drag-item]').forEach(el => {
        //     el.addEventListener('dragstart', e => {
        //         e.target.setAttribute('dragging',true)
        //     })

        //     el.addEventListener('drop', e => {
        //         e.target.classList.remove('bg-dark')

        //         let draggingEl = root.querySelector('[dragging]')
        //         console.log("Before inserting dragging element:", e.target);
        //         e.target.before(draggingEl);
        //         console.log("After inserting dragging element:", e.target);
        //     })

        //     el.addEventListener('dragenter', e => {
        //         e.target.classList.add('bg-dark')
        //     })

        //     el.addEventListener('dragover', e => e.preventDefault())

        //     el.addEventListener('dragleave', e => {
        //         e.target.classList.remove('bg-dark')
        //     })

        //     el.addEventListener('dragend', e => {
        //         e.target.removeAttribute('dragging')
        //     })
        // });
    </script>
</div>
