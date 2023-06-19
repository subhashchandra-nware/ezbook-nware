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
              <!--begin::Card-->
              <div class="card card-custom gutter-b">
              </div>
              <div class="card card-custom">
                <div class="card-body p-0">
                  <!--begin::Wizard Body-->
                  <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                    <div class="col-xl-12">
                      <!--begin::Form Wizard-->
                      <form class="form" id="" method="post" action="{{ url('/add-user')}}">
                        @csrf
                        <!--begin::Step 1-->
                        <div class="pb-5">
                          <h3 class="font-weight-bold text-dark pb-5">User</h3>
                          <div class="mb-10 ">
                            <ul class="nav nav-pills" id="myTab1" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" href="#general">
                                <span class="nav-text">General Details</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#permissions" >
                                <span class="nav-text">Permissions</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#group-member" >
                                <span class="nav-text">Group Membership</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="row" id="general">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mb-5">
                                <h6 class="mb-0"><strong>General Details</strong></h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">User Name</label>
                                <div class="col-lg-9 col-xl-9">
                                <input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="text" name="siteId" hidden value="{{ session('siteId') }}" />
                                  <input class="form-control form-control-lg form-control-solid" name="Name" type="text" value="" />
                                  <span class="form-text text-muted">Enter the full name of user here.</span>
                                  <span class="text-danger">@error('Name') {{ $message }} @enderror</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Logon Name</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input class="form-control form-control-lg form-control-solid" name="LogonName" type="text" value="" />
                                  <span class="form-text text-muted">This Logon Name uniquely identifies users when they log on to your system.( Up to 20 Characters)</span>
                                  <span class="text-danger">@error('LogonName') {{ $message }} @enderror</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Logon Password</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input class="form-control form-control-lg form-control-solid" name="LogonPassword" type="password" value="" />
                                  <span class="form-text text-muted">
                                  <span style="color:red">
                                  (optional, 20 character limit)
                                  </span>
                                  if entered here the user will be required to supply this password to gain access when logging on to system, Passwords are restricted to 10 alphabetic characters and/or  numerals and are case-senstive.</span>
                                  <span class="text-danger">@error('LogonPassword') {{ $message }} @enderror</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">e-Mail Address</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input class="form-control form-control-lg form-control-solid" name="EmailAddress" type="text" value="" />
                                  <span class="form-text text-muted">
                                  <span style="color:red">
                                  (optional)
                                  </span>
                                  Supply user's email address here if they are to be able to receive system or user messages.</span>
                                  <span class="text-danger">@error('EmailAddress') {{ $message }} @enderror</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Phone Number(s)</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input class="form-control form-control-lg form-control-solid" name="PhoneNumbers" type="tel" value="" />
                                  <span class="form-text text-muted">
                                  <span style="color:red">
                                  (optional)
                                  </span>
                                  Enter contact phone or extension numbers here. </span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Supplementary Info</label>
                                <div class="col-lg-9 col-xl-9">
                                  <textarea class="form-control form-control-lg form-control-solid" name="Description"></textarea>
                                  <span class="form-text text-muted pl-5"><span style="color:red">
                                  (optional)
                                  </span> Enter any user notes here.</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id="permissions">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Permissions</h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Admin Level</label>
                                <div class="col-lg-9 col-xl-9">
                                  <select class="form-control " id="show" name="AdminLevel">
                                    @foreach($allUserType as $singleRecord)
                                    <option value="{{ $singleRecord['id'] }}">{{ $singleRecord['userType'] }}</option>
                                    @endforeach
                                  </select>
                                  <span class="form-text text-muted">You may choose to grant the user any management rights that you have been granted, A "Administrator" has all of the rights mentioned below. Assign rights individually to " General Users"</span>
                                </div>
                              </div>
                              <h6>This User May:</h6>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Manage Users</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input type="checkbox" name="ManageUsers">
                                  <span class="form-text text-muted dis d-inline ml-5">
                                    This option allows the user to:
                                    <ul>
                                      <li>Create new user accounts</li>
                                      <li>Delete existing users</li>
                                      <li>Change user details</li>
                                    </ul>
                                  </span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Manage Facilities</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input type="checkbox" name="ManageFacilities">
                                  <span class="form-text text-muted dis d-inline ml-5">
                                    This option allows the user to:
                                    <ul>
                                      <li>Create new facilties to be booked</li>
                                      <li>Delete existing facilties </li>
                                      <li>Update configuration and other details for existing facilties </li>
                                    </ul>
                                  </span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Manage Sysytem Setting</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input type="checkbox" name="ManageSysSettings">
                                  <span class="form-text text-muted dis d-inline ml-5">	This option allows the user to update the system preference and settings. </span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Cancel Bookings</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input type="checkbox" name="CancelBookings">
                                  <span class="form-text text-muted dis d-inline ml-5">	This option allows the user to cancel booking made by others. </span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Make all Collective Bookings</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input type="checkbox" name="CollectiveBookings">
                                  <span class="form-text text-muted dis d-inline ml-5">This option allows the user to book ALL the sub-resources of a COLLECTIVE resource type simultaneously.
                                  <span style="color:red">
                                  Please Note: Bookings made using this feature will automatically delete any booking made for the indiviual sub-resource at the same time.
                                  </span> </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id="group-member" >
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Group Membership  (optional) </strong> </h6>
                              </div>
                              <div class="form-group row">
                                <p class="form-text text-muted">A user can belong to one or more User Groups. This section below enables yout to assign users to their groups.</p>
                                <p class="form-text text-muted">From the "Available" list, select the user Group(s) to which the user shuold belong. Move each selected group across to the "Member of" list using the right arrow button or by double-clicking.</p>
                              </div>
                              <div class="form-group row justify-content-center">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                  <label class="col-form-label text-right ">Additional Group</label>
                                  <select class="form-control" id="kt_multipleselectsplitter_1">
                                    <optgroup label="Category 1">
                                      <option value="1">Choice 1</option>
                                      <option value="2">Choice 2</option>
                                      <option value="3">Choice 3</option>
                                      <option value="4">Choice 4</option>
                                    </optgroup>
                                    <optgroup label="Category 2">
                                      <option value="5">Choice 5</option>
                                      <option value="6" selected="selected">Choice 6</option>
                                      <option value="7">Choice 7</option>
                                      <option value="8">Choice 8</option>
                                    </optgroup>
                                    <optgroup label="Category 3">
                                      <option value="5">Choice 9</option>
                                      <option value="6">Choice 10</option>
                                      <option value="7">Choice 11</option>
                                      <option value="8">Choice 12</option>
                                    </optgroup>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end border-top mt-5 pt-10">
                    <div>
                    <button type="button" class="btn btn-exit font-weight-bolder text-uppercase px-9 py-4" >Back</button>
                    <button type="submit" class="btn btn-save font-weight-bolder text-uppercase px-9 py-4">Save</button>
                    </div>
                    </div>
                    <!--end::Actions-->
                    </form>
                    <!--end::Form Wizard-->
                  </div>
                </div>
                <!--end::Wizard Body-->
              </div>
            </div>
          </div>
          <!--end::Card-->
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
  <!--begin::Demo Panel-->
  <div id="kt_demo_panel" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
      <h4 class="font-weight-bold m-0">Select A Demo</h4>
      <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
      <i class="ki ki-close icon-xs text-muted"></i>
      </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
      <!--begin::Wrapper-->
      <div class="offcanvas-wrapper mb-5 scroll-pull">
        <h5 class="font-weight-bold mb-4 text-center">Demo 1</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo1.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo1/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo1/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 2</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo2.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo2/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo2/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 3</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo3.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo3/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo3/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 4</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo4.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo4/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo4/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 5</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo5.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo5/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo5/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 6</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo6.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo6/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo6/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 7</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo offcanvas-demo-active">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo7.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo7/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo7/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 8</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo8.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo8/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo8/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 9</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo9.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo9/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo9/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 10</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo10.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo10/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo10/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 11</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo11.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo11/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo11/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 12</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo12.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo12/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo12/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 13</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo13.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="../../demo13/dist" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">Default</a>
            <a href="https://preview.keenthemes.com/metronic/demo13/rtl/index.html" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow" target="_blank">RTL Version</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 14</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo14.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 15</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo15.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 16</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo16.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 17</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo17.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 18</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo18.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 19</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo19.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 20</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo20.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 21</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo21.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 22</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo22.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 23</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo23.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 24</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo24.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 25</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo25.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 26</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo26.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 27</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo27.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 28</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo28.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 29</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo29.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
        <h5 class="font-weight-bold mb-4 text-center">Demo 30</h5>
        <div class="overlay rounded-lg mb-8 offcanvas-demo">
          <div class="overlay-wrapper rounded-lg">
            <img src="assets/media/demos/demo30.png" alt="" class="w-100" />
          </div>
          <div class="overlay-layer">
            <a href="#" class="btn btn-white btn-text-primary btn-hover-primary font-weight-boldest text-center min-w-75px shadow disabled opacity-90">Coming soon</a>
          </div>
        </div>
      </div>
      <!--end::Wrapper-->
      <!--begin::Purchase-->
      <div class="offcanvas-footer">
        <a href="https://1.envato.market/EA4JP" target="_blank" class="btn btn-block btn-danger btn-shadow font-weight-bolder text-uppercase">Buy Metronic Now!</a>
      </div>
      <!--end::Purchase-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::Demo Panel-->
  @include('footer')
</body>
<!--end::Body-->
</html>