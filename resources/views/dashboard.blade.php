@include('header');
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
  <!--begin::Main-->
  <!--begin::Header Mobile-->
  <div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
    <!--begin::Logo-->
    <a href="index.html">
    <img alt="Logo" src="assets/media/logos/logo-1.png" class="max-h-30px" />
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
      <button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
        <span class="svg-icon svg-icon-xl">
          <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <polygon points="0 0 24 0 24 24 0 24" />
              <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
              <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
            </g>
          </svg>
          <!--end::Svg Icon-->
        </span>
      </button>
    </div>
    <!--end::Toolbar-->
  </div>
  <!--end::Header Mobile-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
         <!--begin::Header-->
         @include('top-menu')
          <!--end::Header-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Entry-->
          <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <!--begin::Dashboard-->
              <!--begin::Row-->
              <div class="row">
                <div class="col-xl-6">
                  <!--begin::Base Table Widget 3-->
                  <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                      <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Upcoming Bookings</span>
                      </h3>
                      <div class="card-toolbar">
                        <a href="#" class="btn btn-dark font-weight-bolder font-size-sm mr-2">
                        Complete List </a>
                        <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-2" data-toggle="modal" data-target="#addnew">
                        Add New </a>
                        <a href="#" class="btn btn-success font-weight-bolder font-size-sm">
                        Export to excel</a>
                      </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                      <!--begin::Table-->
                      <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                          <thead class="bg-light">
                            <tr class="text-left">
                              <th  style="min-width: 150px">Booked For</th>
                              <th style="min-width: 180px">BOOKED DATE & TIME</th>
                              <th style="min-width: 150px">Booked By</th>
                              <th class=" text-right" style="min-width: 50px">action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="pr-0">
                                Brad Simmons
                              </td>
                              <td class="pl-0">
                                12-May-2023 | 1:00:00 PM
                              </td>
                              <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                              </td>
                              <td class="pr-0 text-right">
                                <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                              </td>
                            </tr>
                            <tr>
                              <td class="pr-0">
                                Brad Simmons
                              </td>
                              <td class="pl-0">
                                12-May-2023 | 1:00:00 PM
                              </td>
                              <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                              </td>
                              <td class="pr-0 text-right">
                                <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                              </td>
                            </tr>
                            <tr>
                              <td class="pr-0">
                                Brad Simmons
                              </td>
                              <td class="pl-0">
                                12-May-2023 | 1:00:00 PM
                              </td>
                              <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                              </td>
                              <td class="pr-0 text-right">
                                <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                              </td>
                            </tr>
                            <tr>
                              <td class="pr-0">
                                Brad Simmons
                              </td>
                              <td class="pl-0">
                                12-May-2023 | 1:00:00 PM
                              </td>
                              <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                              </td>
                              <td class="pr-0 text-right">
                                <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                              </td>
                            </tr>
                            <tr>
                              <td class="pr-0">
                                Brad Simmons
                              </td>
                              <td class="pl-0">
                                12-May-2023 | 1:00:00 PM
                              </td>
                              <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                              </td>
                              <td class="pr-0 text-right">
                                <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!--end::Table-->
                    </div>
                    <!--end::Body-->
                  </div>
                  <!--end::Base Table Widget 3-->
                </div>
                <div class="col-xl-6">
                  <!--begin::Base Table Widget 5-->
                  <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                      <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Booking Summary</span>
                      </h3>
                      <div class="card-toolbar">
                        <form class="form row mb-3">
                          <div class="col-md-6"> 
                            <label>From</label>
                            <input class="form-control mr-1" type="date" value="2011-08-19" id="example-date-input" />
                          </div>
                          <div class="col-md-6">
                            <label>To</label>
                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input" />
                          </div>
                        </form>
                      </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">
                      <div class="row m-0 mb-7">
                        <div class="col bg-light px-6 py-8 rounded-xl mr-7">
                          <h3 class="total-number">100</h3>
                          <a href="#" class="text-total font-weight-bold font-size-h6">Total Bookings</a>
                        </div>
                        <div class="col bg-light px-6 py-8 rounded-xl ">
                          <h3 class="total-number">80</h3>
                          <a href="#" class="text-total font-weight-bold font-size-h6">Completed Bookings</a>
                        </div>
                      </div>
                      <div class="row m-0">
                        <div class="col bg-light px-6 py-8 rounded-xl mr-7">
                          <h3 class="total-number">10</h3>
                          <a href="#" class="text-total font-weight-bold font-size-h6">Upcoming Bookings</a>
                        </div>
                        <div class="col bg-light px-6 py-8 rounded-xl">
                          <h3 class="total-number">20</h3>
                          <a href="#" class="text-total font-weight-bold font-size-h6">Pending Bookings</a>
                        </div>
                      </div>
                    </div>
                    <!--end::Body-->
                  </div>
                  <!--end::Base Table Widget 5-->
                </div>
              </div>
              <!--end::Row-->
              <!--begin::Row-->
              <div class="row">
                <div class="col-xl-6">
                  <!--begin::Charts Widget 1-->
                  <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header h-auto border-0">
                      <!--begin::Title-->
                      <div class="card-title py-5">
                        <h3 class="card-label">
                          <span class="d-block text-dark font-weight-bolder">Duration Breakdown</span>
                        </h3>
                      </div>
                      <!--end::Title-->
                      <!--begin::Toolbar-->
                      <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                          <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="ki ki-bold-more-hor"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <!--begin::Naviigation-->
                            <ul class="navi">
                              <li class="navi-header font-weight-bold py-5">
                                <span class="font-size-lg">Add New:</span>
                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                              </li>
                              <li class="navi-separator mb-3 opacity-70"></li>
                              <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-icon">
                                <i class="flaticon2-shopping-cart-1"></i>
                                </span>
                                <span class="navi-text">Booking</span>
                                </a>
                              </li>
                              <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-icon">
                                <i class="navi-icon flaticon2-calendar-8"></i>
                                </span>
                                <span class="navi-text">Members</span>
                                <span class="navi-label">
                                <span class="label label-light-danger label-rounded font-weight-bold">3</span>
                                </span>
                                </a>
                              </li>
                              <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-icon">
                                <i class="navi-icon flaticon2-telegram-logo"></i>
                                </span>
                                <span class="navi-text">Project</span>
                                </a>
                              </li>
                              <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-icon">
                                <i class="navi-icon flaticon2-new-email"></i>
                                </span>
                                <span class="navi-text">Record</span>
                                <span class="navi-label">
                                <span class="label label-light-success label-rounded font-weight-bold">5</span>
                                </span>
                                </a>
                              </li>
                              <li class="navi-separator mt-3 opacity-70"></li>
                              <li class="navi-footer pt-5 pb-4">
                                <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                                <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                              </li>
                            </ul>
                            <!--end::Naviigation-->
                          </div>
                        </div>
                      </div>
                      <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                      <!--begin::Chart-->
                      <div id="kt_charts_widget_1_chart"></div>
                      <!--end::Chart-->
                    </div>
                    <!--end::Body-->
                  </div>
                  <!--end::Charts Widget 1-->
                </div>
                <div class="col-xl-6">
                  <!--begin::Charts Widget 1-->
                  <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header h-auto border-0">
                      <!--begin::Title-->
                      <div class="card-title py-5">
                        <h3 class="card-label">
                          <span class="d-block text-dark font-weight-bolder">Number of Bookings</span>
                        </h3>
                      </div>
                      <!--end::Title-->
                      <!--begin::Toolbar-->
                      <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                      <!--begin::Chart-->
                      <div id="chart_1"></div>
                      <!--end::Chart-->
                    </div>
                    <!--end::Body-->
                  </div>
                  <!--end::Charts Widget 1-->
                </div>
              </div>
              <!--end::Row-->
              <!--end::Row-->
              <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                  <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark mb-2">Request sent to Moderator</span>
                    <form class="form-inline">
                      <span class="mr-4">Show</span>
                      <div class="form-group">
                        <select class="form-control " id="show">
                          <option>Select</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <span class="mr-4 ml-4">Entries</span>
                      <div class="form-group">
                        <select class="form-control mr-2 " id="exampleSelectl">
                          <option>Booking</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="form-control mr-2" id="kt_select2_1">
                          <option>Booking1ff</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </form>
                  </h3>
                  <div class="card-toolbar">
                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add New</a>
                    <a href="#" class="btn btn-success font-weight-bolder font-size-sm">Export to Excel</a>
                  </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                  <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                      <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                        <thead>
                          <tr class="text-left text-uppercase">
                            <th style="min-width: 30px">S.No.</th>
                            <th style="min-width: 200px">Name</th>
                            <th style="min-width: 100px">Date & Time</th>
                            <th style="min-width: 100px">Booked For</th>
                            <th style="min-width: 150px">Booked By</th>
                            <th style="min-width: 80px"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>2.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>3.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>4.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>5.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--end::Table-->
                  </div>
                </div>
                <!--end::Body-->
              </div>
              <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                  <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark mb-2">Request to be moderated</span>
                    <form class="form-inline">
                      <span class="mr-4">Show</span>
                      <div class="form-group">
                        <select class="form-control " id="show">
                          <option>Select</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <span class="mr-4 ml-4">Entries</span>
                      <div class="form-group">
                        <select class="form-control mr-2 " id="exampleSelectl">
                          <option>Booking</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="form-control " id="kt_select2_1">
                          <option>Booking1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </form>
                  </h3>
                  <div class="card-toolbar">
                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add New</a>
                    <a href="#" class="btn btn-success font-weight-bolder font-size-sm">Export to Excel</a>
                  </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                  <div class="tab-content">
                    <!--begin::Table-->
                    <div class="table-responsive">
                      <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                        <thead>
                          <tr class="text-left text-uppercase">
                            <th style="min-width: 30px">S.No.</th>
                            <th style="min-width: 200px">Name</th>
                            <th style="min-width: 100px">Date & Time</th>
                            <th style="min-width: 100px">Booked For</th>
                            <th style="min-width: 150px">Booked By</th>
                            <th style="min-width: 80px"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-info font-weight-bolder font-size-sm">Accept </a>
                              <a href="#" class="btn btn-light-warning font-weight-bolder font-size-sm">Reject </a>
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>2.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-info font-weight-bolder font-size-sm">Accept </a>
                              <a href="#" class="btn btn-light-warning font-weight-bolder font-size-sm">Reject </a>
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>3.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-info font-weight-bolder font-size-sm">Accept </a>
                              <a href="#" class="btn btn-light-warning font-weight-bolder font-size-sm">Reject </a>
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>4.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-info font-weight-bolder font-size-sm">Accept </a>
                              <a href="#" class="btn btn-light-warning font-weight-bolder font-size-sm">Reject </a>
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                          <tr>
                            <td>5.</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brad Simmons</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">12-May-2023</span></span>
                              <span class="text-muted font-weight-bold">4:07:00 PM</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Lorem Ipsum</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                            </td>
                            <td class="pr-0 text-right">
                              <a href="#" class="btn btn-light-info font-weight-bolder font-size-sm">Accept </a>
                              <a href="#" class="btn btn-light-warning font-weight-bolder font-size-sm">Reject </a>
                              <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!--end::Table-->
                  </div>
                </div>
                <!--end::Body-->
              </div>
              <!--end::Dashboard-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Entry-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
          <!--begin::Container-->
          <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
              <span class=" font-weight-bold mr-2">©</span>
              <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Rucir Canada Ltd.</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Nav-->
            <div class="nav nav-dark order-1 order-md-2">
              <a href="#" target="_blank" class="nav-link pr-3 pl-0">Legal</a>
              <a href="#" target="_blank" class="nav-link px-3">Privacy</a>
              <a href="#" target="_blank" class="nav-link pl-3 pr-0">Terms</a>
            </div>
            <!--end::Nav-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Footer-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
  </div>
  <!--end::Main-->
  <!-- begin::User Panel-->
  @include('sidebar')
  <!-- end::User Panel-->
  <!--begin::Scrolltop-->
  <div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon">
      <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24" />
          <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
          <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
        </g>
      </svg>
      <!--end::Svg Icon-->
    </span>
  </div>
  <!--end::Scrolltop-->
  <div class="modal fade" id="addnew" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Listing</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form">
            <div class="form-group">
              <label>Booked For</label>
              <input type="text" class="form-control form-control-lg" placeholder="" />
            </div>
            <div class="form-group">
              <label>Booked By</label>
              <input type="text" class="form-control form-control-lg" placeholder="" />
            </div>
            <div class="form-group">
              <label>Date and Time</label>
              <input type="datetime-local" class="form-control form-control-lg" placeholder="" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Add</button>
        </div>
      </div>
    </div>
  </div>
  <!--end::Demo Panel-->
  @include('footer')
</body>
<!--end::Body-->
</html>