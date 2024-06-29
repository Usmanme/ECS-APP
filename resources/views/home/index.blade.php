@extends('layouts.app-master')

@section('content')

<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <!-- Use active class for highlighted menu option -->
          <a href="#" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-van-shuttle fa-fw me-3"></i><span>Rides</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-user fa-fw me-3"></i><span>Drivers</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-car fa-fw me-3"></i><span>Vehicles</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-users fa-fw me-3"></i><span>Clients</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-chart-area fa-fw me-3"></i><span>Finance</span>
          </a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top ecs-navbar">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button data-mdb-button-init class="navbar-toggler" type="button" data-mdb-collapse-init
          data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand ecs-logo-text" href="#">
          DASHBOARD
        </a>
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          <li class="nav-item dropdown">
            <a data-mdb-dropdown-init class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
              id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-bell" id="ecs-notify"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Some news</a></li>
              <li><a class="dropdown-item" href="#">Another news</a></li>
              <li>
                <a class="dropdown-item" href="#">Something else here</a>
              </li>
            </ul>
          </li>
          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a data-mdb-dropdown-init class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
              id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <span class="ecs-user-name">Mutazir</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">My profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!-- NAVBAR ENDS -->
  <!--Main layout-->
  <main class="ecs-main-body">
    <div class="container-fluid pt-4">
      <!-- STATS STARTS -->
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header ecs-card-header-main">
              <div class="ecs-card-header-left">
                <span class="heading">Drivers</span>
                <span class="stats"><span class="num">5,889</span> (Total Drivers)</span>
              </div>
              <div class="ecs-card-header-right">
                <a class="ecs-stats-btn" href="#">View Drivers</a>
              </div>
            </div>
            <div class="card-body ecs-body-main">
              <p class="ecs-stats-num">5,321</p>
              <p class="ecs-stats-num-txt">Active Drivers ></p>
            </div>
          </div>
          <br />
          <div class="card">
            <div class="card-header ecs-card-header-main">
              <div class="ecs-card-header-left">
                <span class="heading">Overall Earnings</span>
                <span class="stats"><span class="num">SAR 500,380</span> (Total Earnings)</span>
              </div>
            </div>
            <div class="card-body">
              <!-- Tabs navs -->
              <ul class="nav nav-tabs mb-3 ecs-tab-main" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a data-mdb-tab-init class="nav-link active" id="ex1-tab-1" href="#ex1-tabs-1" role="tab"
                    aria-controls="ex1-tabs-1" aria-selected="true">Today</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a data-mdb-tab-init class="nav-link" id="ex1-tab-2" href="#ex1-tabs-2" role="tab"
                    aria-controls="ex1-tabs-2" aria-selected="false">This Month</a>
                </li class="nav-item">
                <li>
                  <form>
                    <div class="form-outline datepicker ecs-datepicker">
                      <input type="date" class="form-control" placeholder="Choose dates" />
                    </div>
                  </form>
                </li>
              </ul>
              <!-- Tabs navs -->
              <!-- Tabs content -->
              <div class="tab-content" id="ex1-content">
                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                  <p class="ecs-stats-num2">SAR 12,892</p>
                  <p class="ecs-stats-num-txt2">Overall Earnings</p>
                </div>
                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                  <p class="ecs-stats-num2">SAR 15,892</p>
                  <p class="ecs-stats-num-txt2">Overall Earnings</p>
                </div>
              </div>
              <!-- Tabs content -->
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card ecs-mobile-stats">
            <div class="card-header ecs-card-header-main">
              <div class="ecs-card-header-left">
                <span class="heading">Rides</span>
                <span class="stats"><span class="num">100,598</span> (Total Rides Completed)</span>
              </div>
              <div class="ecs-card-header-right">
                <a class="ecs-stats-btn" href="#">View Rides</a>
              </div>
            </div>
            <div class="card-body">
              <!-- Tabs navs -->
              <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a data-mdb-tab-init class="nav-link active" id="ex3-tab-3" href="#ex3-tabs-3" role="tab"
                    aria-controls="ex3-tabs-3" aria-selected="true">Today</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a data-mdb-tab-init class="nav-link" id="ex3-tab-2" href="#ex3-tabs-2" role="tab"
                    aria-controls="ex3-tabs-2" aria-selected="false">This Month</a>
                </li>
                <li class="nav-item">
                  <form>
                    <div class="form-outline datepicker ecs-datepicker">
                      <input type="date" class="form-control" placeholder="Choose dates" />
                    </div>
                  </form>
                </li>
              </ul>
              <!-- Tabs navs -->
              <!-- Tabs content -->
              <div class="tab-content" id="ex1-content">
                <div class="tab-pane fade show active" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                  <div class="row">
                    <div class="col-md-6">
                      <p class="ecs-stats-num2">3,052</p>
                      <p class="ecs-stats-num-txt2">Ride Created ></p>
                    </div>
                    <div class="col-md-6">
                      <p class="ecs-stats-num2">380</p>
                      <p class="ecs-stats-num-txt2">Completed ></p>
                    </div>
                    <div class="col-md-6">
                      <p class="ecs-stats-num2">1,021</p>
                      <p class="ecs-stats-num-txt2">Driver Assigned ></p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                  <div class="row">
                    <div class="row">
                      <div class="col-md-6">
                        <p class="ecs-stats-num2">5,052</p>
                        <p class="ecs-stats-num-txt2">Ride Created ></p>
                      </div>
                      <div class="col-md-6">
                        <p class="ecs-stats-num2">232</p>
                        <p class="ecs-stats-num-txt2">Completed ></p>
                      </div>
                      <div class="col-md-6">
                        <p class="ecs-stats-num2">2,021</p>
                        <p class="ecs-stats-num-txt2">Driver Assigned ></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Tabs content -->
            </div>
          </div>
        </div>
      </div>
      <!-- STATS ENDS -->

      <!-- TABLE STARTS -->
      <div class="ecs-table-card">
        <p class="ecs-table-heading-main">Completed Rides</p>
        <div class="ecs-table-container">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="ecs-custom-header">
                <tr>
                  <th class="th-sm">Trip Id</th>
                  <th class="th-sm">Customer Name</th>
                  <th class="th-sm">Date & Time</th>
                  <th class="th-sm">Pick Up</th>
                  <th class="th-sm">Drop Up</th>
                  <th class="th-sm">Booking Type</th>
                  <th class="th-sm">Driver Name</th>
                  <th class="th-sm">Vehicle Assigned</th>
                  <th class="th-sm">Status</th>
                  <th class="th-sm">Fare</th>
                </tr>
              </thead>
              <tbody class="ecs-custom-body">
                <tr>
                  <td>001</td>
                  <td>Tiger Nixon</td>
                  <td>12-06-2024</td>
                  <td>
                    Airport Road, King Khalid International Airport, Riyadh
                    Saudi Arabia
                  </td>
                  <td>Al Olaya, Riyadh Saudi Arabia</td>
                  <td class="type">Economy</td>
                  <td>Drake</td>
                  <td>Tahoe</td>
                  <td class="status-success">
                    Completed
                  </td>
                  <td>200 SAR</td>
                </tr>
                <tr>
                  <td>001</td>
                  <td>Tiger Nixon</td>
                  <td>12-06-2024</td>
                  <td>
                    Airport Road, King Khalid International Airport, Riyadh
                    Saudi Arabia
                  </td>
                  <td>Al Olaya, Riyadh Saudi Arabia</td>
                  <td class="type">Economy</td>
                  <td>Drake</td>
                  <td>Tahoe</td>
                  <td class="status-fail">
                    Driver Assigned
                  </td>
                  <td>200 SAR</td>
                </tr>
                <tr>
                  <td>001</td>
                  <td>Tiger Nixon</td>
                  <td>12-06-2024</td>
                  <td>
                    Airport Road, King Khalid International Airport, Riyadh
                    Saudi Arabia
                  </td>
                  <td>Al Olaya, Riyadh Saudi Arabia</td>
                  <td class="type">Economy</td>
                  <td>Drake</td>
                  <td>Tahoe</td>
                  <td class="status-warn">
                    Ride Created
                  </td>
                  <td>200 SAR</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="ecs-table-pagination-main">
            <p class="rows-txt">Rows per page</p>
            <select class="custom-pages-ddl">
              <option>25</option>
              <option>55</option>
              <option>75</option>
            </select>
            <p class="rows-txt">1-75 of 89,33</p>
            <div class="rows-clicks-main">
              <img src="./assets/icons/fast-left.png" alt="arrow-fast-left" />
              <img src="./assets/icons/left.png" alt="arrow-left" />
              <img src="./assets/icons/right.png" alt="arrow-right" />
              <img src="./assets/icons/fast-right.png" alt="arrow-fast-right" />
            </div>
          </div>
        </div>
      </div>
      <!-- TABLE ENDS -->
    </div>
  </main>
@endsection