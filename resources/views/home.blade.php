<x-layout-app page-title="Home">

   <div class="w-100 p-4">
        <h3>Home</h3>

        <hr>
        
        <div class="d-flex">
         <x-info-title-value item-title="Total Colaborators" :item-value="$data['total_colaborators']" />
         <x-info-title-value item-title="Total Deleted Colaborators" :item-value="$data['total_colaborators_deleted']" />
         <x-info-title-value item-title="Total Salary" :item-value="$data['total_salary']" />
        </div>

        <hr>

        <div class="d-flex">
            <x-info-title-collection item-title="Colaborators by Department" :collection="$data['total_colaborators_per_department']" />
            <x-info-title-collection item-title="Total Salary by Department" :collection="$data['total_salary_by_department']" />
   </div>

</x-layout-app>