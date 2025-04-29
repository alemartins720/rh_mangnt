<x-layout-app page-title="Departments">

    <div class="w-100 p-4">

        <h3>Departments</h3>
    
        <hr>

        @if ($departments->count() === 0)
            <div class="text-center my-5">
                <p>No departments found</p>
                <a href="#" class="btn btn-primary">Create a new department</a>
            </div>

            @else

            <div class="mb-3">
                <a href="#" class="btn btn-primary">Create a new department</a>
            </div>

            <table class="table w-50" id="table">
                <thead class="table-dark">
                    <th>Departments</th>
                    <th></th>
                </thead>
                <tbody>

                    @foreach ($departments as $department )
                        
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>
                            <div class="d-flex gap-3 justify-content-end">
                                <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-trash-can me-2"></i>Delete</a>
                            </div>
                        </td>
                    </tr>

                    @endforeach                
                </tbody>
            </table>
    </div>

        @endif

   
    
       
        


</x-layout-app>