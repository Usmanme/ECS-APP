@extends('layouts.app-master')

@section('content')
    <!-- Sidebar -->
    @include('layouts.partials.left-sidebar')
    <!-- Sidebar -->
    <!-- Navbar -->
    @include('layouts.partials.nav')
    <!-- Ride -->
    <main class="ecs-main-body" style="height: 100vh;">
        <div class="container-fluid pt-4">


            <div class="d-flex flex-row justify-content-between text-light">
                <div class="ecs-card-header-left">
                    <span class="heading pageheading">Finance</span>
                    @php
                        $finance = DB::table('rides')->where('status', 'Completed')->sum('fare');
                    @endphp
                    <span class="stats totalnumber"><span class="num">{{ $finance }}</span></span>
                </div>
                <div class="d-flex flex-row">
                    <span class="material-symbols-outlined p-2">
                        refresh
                    </span>
                    <span class="material-symbols-outlined p-2">
                        download
                    </span>
                    <button class="bigbutton" style="padding-top:0px !important;">Add Finance</button>
                </div>
            </div>
            <div class="miniheading">(Revenue)</div>
            <div class="text-end "> <span class="material-symbols-outlined searchicon"> search
            </span><input class="searchbars"  id="myInput" onkeyup="myFunction()" placeholder="Search" type="text"></div>


            <div class="ecs-table-card">
                {{-- <p class="ecs-table-heading-main">Finance</p> --}}
                <div class="ecs-table-container">
                    <div class="table-responsive">
                        <table  id="myTable" class="table table-hover">
                            <thead class="ecs-custom-header">
                                <thead>
                                    <tr>
                                        <th>Trip ID</th>
                                        <th>Customer Name</th>
                                        <th>Date & Time</th>
                                        <th>Pick Up</th>
                                        <th>Drop Up</th>
                                        <th>Vehicle Assigned</th>
                                        <th>Booking Type</th>
                                        <th>Status</th>
                                        <th>Fare</th>
                                    </tr>
                                </thead>
                            <tbody class="ecs-custom-body">
                                @if (!empty($data))
                                    @foreach ($data as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->customer_name }}</td>
                                            <td>
                                                <div class="dameentry">
                                                    <p class="datepart">{{ $value->booking_pickup }}</p>
                                                    <p class="datepart">{{ $value->booking_drop }}</p>
                                                </div>
                                            </td>
                                            <td>{{ $value->hotel_pickup }}</td>
                                            <td>{{ $value->hotel_drop }}</td>
                                            <td>{{ $value->car_name }}</td>
                                            <td>{{ $value->category }}</td>
                                            <td>
                                                <div class="booking_status">Completed</div>
                                            </td>
                                            <td>{{ $value->fare }}SAR</td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="ecs-table-pagination-main">
                        <form method="GET" action="{{ route('finance') }}" style="display: flex">
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
    <!-- ./Ride -->
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
