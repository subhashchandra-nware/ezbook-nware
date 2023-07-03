@include('header')
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
              @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>	
                      <strong>{{ $message }}</strong>
                    </div>
              @endif
              <!--begin::Dashboard-->
              <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                  <h3 class="card-title align-items-start flex-column"></h3>
                  <div class="card-toolbar">
                    <a href="{{ url('/resource-location')}}" class="btn btn-success font-weight-bolder font-size-sm mr-3">Resource Location</a>
                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Resource Type</a>
                    <a href="#" class="btn btn-primary font-weight-bolder font-size-sm">Resources</a>
                  </div>
                </div>
                <!--end::Header-->
              </div>
              <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                  <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark mb-4">Resource Location</span>
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
                        <select class="form-control mr-2" id="exampleSelectl">
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
                    <a href="{{ url ('/add-new-resource-location') }}" class="btn btn-primary font-weight-bolder font-size-sm mr-3">Add New</a>
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
                            <th style="min-width: 100px">Address</th>
                            <th style="min-width: 80px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @isset($data)
                        @foreach($data as $res)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="pl-0 py-8">
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $res['Name'] }}</span>
                            </td>
                            <td>
                              <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $res['Address1'] }}</span></span>
                            </td>
                            <td class="pr-0">
                              <a href="{{ url('/edit-resource-location')}}/{{ $res['id'] }}" class="btn btn-light-success font-weight-bolder font-size-sm">View </a>
                              <a href="#" onclick="deleteResourceLocation({{ $res['id'] }})" class="btn btn-light-danger font-weight-bolder font-size-sm">Delete </a>
                            </td>
                          </tr>
                          @endforeach
                          @endisset
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
              <span class="text-muted font-weight-bold mr-2">2023©</span>
              <a href="#" target="_blank" class="text-dark-75 text-hover-primary">EZ-Book</a>
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
  <div class="modal fade" id="upcomingbooking" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Listing</h4>
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
              <label>Date and Gime</label>
              <input type="datetime-local" class="form-control form-control-lg" placeholder="" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Update</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
  <!--end::Page Scripts-->
  <script>
  function deleteResourceLocation(id){
  Swal.fire({
  title: 'Do you want to delete the resource location?',
  showCancelButton: true,
  denyButtonText: `Delete`,
  }).then((result) => {
    if (result.isConfirmed) {
    var data = { "id" : id}
      $.ajax({
        url : "{{ url('/api/delete-resource-location') }}",
        data : data,
        type:'post',
        success:function(result){
            console.log(result);
            var status = result['status'];
            if(status == 'success'){
              window.location.href="{{ url('/resource-location') }}";
            }
        }
      });
    } 
   })
  }
    </script>
</body>
<!--end::Body-->
</html>