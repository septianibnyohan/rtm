@extends('layouts.admin')

@section('content')
         <div class="container mt-4">
            <a href="{{ url('add-user') }}" class="text-center btn btn-success mb-1">Create User</a>
            <table class="table table-bordered" id="laravel-datatable-crud">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
         </div>
@endsection
@section('js')

   <script>
     $(document).ready( function () {
      $('#laravel-datatable-crud').DataTable({
           processing: true,
           serverSide: true,
          ajax: {
            url: "{{ url('list-user') }}",
            type: 'GET',
           },
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action' }
                 ]
       });
     });

     $('body').on('click', '.deleteUser', function () {
 
        var todo_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
          $.ajax({
              type: "get",
              url: "{{ url('delete-user') }}"+'/'+todo_id,
              success: function (data) {
              var oTable = $('#laravel-datatable-crud').dataTable(); 
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
       }
    }); 
   </script>
@endsection