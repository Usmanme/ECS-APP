@extends('layouts.app-master')

@section('content')
     <!-- Sidebar -->
     @include('layouts.partials.left-sidebar')
     <!-- Sidebar -->
     <!-- Navbar -->
     @include('layouts.partials.nav')
     <!-- Navbar -->

    <!-- Customer -->
    <main class="ecs-main-body" style="height: 100vh;">
        <div class="container-fluid pt-4">


        <!-- Save -->
        @if (session('status_save') === 'true')
            <div class="ecs_alert alert alert-success" role="alert">
                Customer has been registered successfully.
            </div>
        @elseif (session('status_save') === 'false')
            <div class="ecs_alert alert alert-danger" role="alert">
                <b>Error:</b> Your customer could not be register.
            </div>
        @endif

        <!-- Edit -->
        @if (session('status_edit') === 'true')
            <div class="ecs_alert alert alert-success" role="alert">
                Customer has been updated successfully.
            </div>
        @elseif (session('status_edit') === 'false')
            <div class="ecs_alert alert alert-danger" role="alert">
                <b>Error:</b> Your customer could not be update.
            </div>
        @endif

        <div class="d-flex flex-row justify-content-between text-light">
            <div class="ecs-card-header-left">
                <span class="heading pageheading">Customers</span>
                <span class="stats totalnumber"><span class="num">500</span></span>
            </div>
            <div class="d-flex flex-row">
                <span class="material-symbols-outlined p-2">
                    refresh
                </span>
                <span class="material-symbols-outlined p-2">
                    download
                </span>
                {{-- <button class="bigbutton">Add Csutomer</button> --}}
                <a class="bigbutton" href="{{ url('newcustomer') }}">Add Customer</a>


            </div>
        </div>
        <div class="miniheading">(Total Customers)</div>
        <div class="text-end "> <span class="material-symbols-outlined searchicon"> search
        </span><input class="searchbars"   id="myInput" onkeyup="myFunction()" placeholder="Search" type="text"></div>

        <div class="ecs-table-card">
            <p class="ecs-table-heading-main">Customers</p>
            <div class="ecs-table-container">
                <div class="table-responsive">
                    <table id="myTable" class="table table-hover">
                        <thead class="ecs-custom-header">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Nationality</th>
                    <th>Company</th>
                    <th>Department if B2B</th>
                    <th>Designation If B2B</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="ecs-custom-body">
                @if (!empty($data))
                    @foreach ($data as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>
                                <div class="nameentry">
                                    <img width="100px" src="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}"
                                        class="customerpic">
                                </div>
                            </td>
                            <td>{{ $value->name  }}</td>
                            <td>{{ $value->mobile_number }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->nationality }}</td>
                            <td>{{ $value->company }}</td>
                            <td>{{ $value->department ?? '--' }}</td>
                            <td>{{ $value->designation ?? '--' }}</td>
                            <td>
                                <a href="javascript:void(0)" class="edit_customer_btn" data-target="#editCustomerModal"
                                    data-toggle="modal" data-edit_action="{{ url('/customers/update/' . $value->id) }}">
                                    <img src="{{ url('/assets/images/edit-icon.png') }}">
                                </a>
                            </td>
                            <input type="hidden" data-name="{{ $value->name }}" data-mobile_number="{{ $value->mobile_number }}" data-email="{{ $value->email }}" data-nationality="{{ $value->nationality }}" data-company="{{ $value->company }}" data-department="{{ $value->department }}" data-designation="{{ $value->designation }}" data-img="{{ $value->img != '' ? asset('/uploads/' . $value->img) : asset('/assets/images/avarat.png') }}">
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="ecs-table-pagination-main">
        <form method="GET" action="{{ route('customers') }}" style="display: flex">
            <p class="rows-txt">Rows per page</p>
            <select name="per_page" class="custom-pages-ddl" style="height:23px;" onchange="this.form.submit()">
                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                <option value="55" {{ request('per_page') == 55 ? 'selected' : '' }}>55</option>
                <option value="75" {{ request('per_page') == 75 ? 'selected' : '' }}>75</option>
            </select>
            <p class="rows-txt">{{ $data->firstItem() }}-{{ $data->lastItem() }} of {{ $data->total() }}</p>
        </form>
        <div class="rows-clicks-main">
            <a href="{{ $data->url(1) }}"><img src="{{ asset('assets/icons/fast-left.png') }}" alt="arrow-fast-left" /></a>
            <a href="{{ $data->previousPageUrl() }}"><img src="{{ asset('assets/icons/left.png') }}" alt="arrow-left" /></a>
            <a href="{{ $data->nextPageUrl() }}"><img src="{{ asset('assets/icons/right.png') }}" alt="arrow-right" /></a>
            <a href="{{ $data->url($data->lastPage()) }}"><img src="{{ asset('assets/icons/fast-right.png') }}" alt="arrow-fast-right" /></a>
        </div>
    </div>
</div>
</div>

    </div>
    </main>



    <!-- ./Customer -->

    <!-- Add Modal -->
    <div class="modal fade modal_form" id="addCustomerModal" tabindex="-1" role="dialog"
        aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/customers/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter Customer Name" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number"
                                placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" name="nationality" id="nationality"
                                placeholder="Enter Nationality">
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" name="company" id="company"
                                placeholder="Enter Company" required>
                        </div>
                        <div class="form-group">
                            <label for="department">Department if B2B</label>
                            <input type="text" class="form-control" name="department" id="department"
                                placeholder="Enter Department if B2B" >
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation If B2B</label>
                            <input type="text" class="form-control" name="designation" id="designation"
                                placeholder="Enter Designation If B2B" >
                        </div>
                        <div class="form-group">
                            <label for="customer_img">Image</label>
                            <input type="file" class="form-control" name="customer_img" id="customer_img"
                                accept="image/png, image/gif, image/jpeg" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-black">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Add Modal -->

    <!-- Edit Modal -->
    <div class="modal fade modal_form" id="editCustomerModal" tabindex="-1" role="dialog"
        aria-labelledby="editCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter Customer Name" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" id="mobile_number"
                                placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" name="nationality" id="nationality"
                                placeholder="Enter Nationality">
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" name="company" id="company"
                                placeholder="Enter Company" required>
                        </div>
                        <div class="form-group">
                            <label for="department">Department if B2B</label>
                            <input type="text" class="form-control" name="department" id="department"
                                placeholder="Enter Department if B2B" required>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation If B2B</label>
                            <input type="text" class="form-control" name="designation" id="designation"
                                placeholder="Enter Designation If B2B" required>
                        </div>
                        <div class="form-group">
                            <label for="customer_img">Image</label>
                            <input type="file" class="form-control" name="customer_img" id="customer_img"
                                accept="image/png, image/gif, image/jpeg">
                            <img src="" class="edit_modal_img">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-black">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Edit Modal -->
@endsection
<script>
     function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows
  for (i = 0; i < tr.length; i++) {
    // Skip the header row (assuming it's the first row)
    if (i === 0) continue;
    
    // Initialize a variable to indicate if any column matches the filter
    var matchFound = false;
    
    // Loop through all table columns in the current row
    for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        // Check if the current column's text matches the filter
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          matchFound = true;
          break; // No need to check further columns in this row
        }
      }
    }
    
    // Display or hide the row based on whether any column matched the filter
    if (matchFound) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}

</script>
