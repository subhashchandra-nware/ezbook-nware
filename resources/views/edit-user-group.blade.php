@php
    $users = collect($data)->get('users')->toArray();
    $users = array_combine(array_column($users, 'id'), array_column($users, 'Name'));
    $UserID = collect($userGroup->UsersInGroups->toArray())->pluck('UserID')->all();
    // dd($users, $userGroup, $userGroup->UsersInGroups->toArray(), $UserID);
@endphp


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
              <!--begin::Card-->
              <div class="card card-custom gutter-b">
              </div>
              <div class="card card-custom">
                <div class="card-body p-0">
                  <!--begin::Wizard Body-->
                  <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                    <div class="col-xl-12">
                      <!--begin::Form Wizard-->
                      <form class="form" id="" method="post" action="{{ url('/edit-user-group')}}">
                        @csrf
                        <!--begin::Step 1-->
                        <div class="pb-5">
                          <h3 class="font-weight-bold text-dark pb-5">User Group</h3>
                          <div class="row" id="general">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mb-5">
                                <h6 class="mb-0"><strong>General Details</strong></h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input class="" type="hidden" name="id" type="text" value="{{ $userGroup->id }}" />
                                  <input class="form-control form-control-lg form-control-solid" name="Name" type="text" value="{{ $userGroup->Name }}" />
                                  <span class="form-text text-muted">Enter the name of your User Group in this box. The name can be up to 250 caracters long.</span>
                                  <span class="text-danger">@error('Name') {{ $message }} @enderror</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Supplementary Info</label>
                                <div class="col-lg-9 col-xl-9">
                                  <textarea class="form-control form-control-lg form-control-solid" name="Description">{{ $userGroup->Description }}</textarea>
                                  <span class="form-text text-muted pl-5"><span style="color:red">
                                  (optional)
                                  </span> Enter descriptive information about your User Group here</span>
                                  <span class="text-danger">@error('Description') {{ $message }} @enderror</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id="group-member" >
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong> Membership  </strong> </h6>
                              </div>
                              <div class="form-group row">
                                <p class="form-text text-muted">A user can belong to one or more Iser Groups. This section below enables you to assign users to this group.</p>
                                <p class="form-text text-muted">From the "Available" list, select the user Group(s) to which the user shuold belong. Move each selected group across to the "Member of" list using the right arrow button or by double-clicking.</p>
                              </div>
                              <x-forms.select class="multiple-select2" multiple="multiple" :selected="$UserID" design="1" name="UserID[]"
                            label="Additional Group" :options="$users" />


                            </div>
                          </div>
                        </div>
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end border-top mt-5 pt-10">
                    <div>
                    <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-exit font-weight-bolder text-uppercase px-9 py-4" >Back</button>
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
  @include('footer')

  <script>
    // Your custom JavaScript...
    $(document).ready(function() {

        $(".multiple-select2").select2();

        // END::DOCUMENT READY
    });
</script>
</body>
<!--end::Body-->
</html>
