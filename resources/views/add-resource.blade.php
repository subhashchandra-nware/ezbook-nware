@include('header')
<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
  <!--begin::Main-->
  <!--begin::Header Mobile-->
  <div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
    <!--begin::Logo-->
    <a href="index.html">
    <img alt="Logo" src="{{ asset('media/logos/logo-1.png') }}" class="max-h-30px" />
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
                      <form class="form" id="" method="post">
                        @csrf
                        @method('post')
                        <!--begin::Step 1-->
                        <div class="pb-5">
                          <h3 class="font-weight-bold text-dark pb-5">New Resources</h3>
                          <div class="mb-10 ">
                            <ul class="nav nav-pills" id="myTab1" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" href="#general">
                                <span class="nav-text">General Details</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#booking-rights" >
                                <span class="nav-text">Booking Rights</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#viewing-rights" >
                                <span class="nav-text">Viewing Rights</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#booking-moderate" >
                                <span class="nav-text">Booking Moderate</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#operation-time" >
                                <span class="nav-text">Operation Hours & Time Slots</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#custom-rights" >
                                <span class="nav-text">Custom Attribuet</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="row" id="#general">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mb-5">
                                <h6 class="mb-0"><strong>General Details</strong></h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Resource Name</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input class="form-control form-control-lg form-control-solid" name="Name" type="text" value="EZ Book" />
                                  @error('Name') <span class="form-text text-danger">{{ $message }}</span> @enderror
                                  <span class="form-text text-muted">Enter a name or title for your resource here.</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                <div class="col-lg-9 col-xl-9">
                                  <textarea class="form-control form-control-lg form-control-solid" name="Description"></textarea>
                                  @error('Description') <span class="form-text text-danger">{{ $message }}</span> @enderror
                                  <span class="form-text text-muted">Enter a descriptive paragraph about your resource here. This will be seen as its tooltip where the resource is listed.</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Resource Type</label>
                                <div class="col-lg-9 col-xl-9">
                                  <select name="resourceType" class="form-control " id="show">
                                    <option value="0">Select</option>
                                    @foreach ($resourceType as $key => $val)
                                    <option value="{{ $val['id'] }}">{{ $val['Name'] }}</option>
                                    @endforeach
                                  </select>
                                  <span class="form-text text-muted">From the list, selecr the type of resource this is. You may also define your own Types if none of these seem applicable.</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Resource Gruop (Location)</label>
                                <div class="col-lg-9 col-xl-9">
                                  <select name="resourceLocation" class="form-control " id="show">
                                    <option value="0">Select</option>
                                    @foreach ($resourceLocation as $k => $v )
                                    <option value="{{ $v['id'] }}">{{ $v['Name'] }}</option>
                                    @endforeach
                                  </select>
                                  <span class="form-text text-muted">Choose the TITLE to which thia resource shuld belong.</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Image URL</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input class="form-control form-control-lg form-control-solid" name="FacURL" type="text"  />
                                  <span class="form-text text-muted">Enter the URL of a .htm, .gif or .jpg file here.</span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Public View</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input type="checkbox" name="PublicView" value="1">
                                  <span class="form-text text-muted dis">Visible on a public calendar. Copy the following to embed this calendar:</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id="booking-rights">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Booking Rights</strong> </h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Who can Book the Resource?</label>
                                <div class="col-lg-9 col-xl-9">
                                  <select name="BookingRights" class="form-control " id="show">
                                    <option value="0">Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">5</option>
                                  </select>
                                  <span class="form-text text-muted">Select the users and/or user group who allowed to book this resource.</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id="viewing-rights">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Viewing Rights</strong> </h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Who can view the Schedules?</label>
                                <div class="col-lg-9 col-xl-9">
                                  <select name="ViewingRights" class="form-control " id="show">
                                    <option value="0">Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">5</option>
                                  </select>
                                  <span class="form-text text-muted">Select the users and/or user group who allowed to book this resource.</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id=booking-moderate >
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Booking Moderate</strong> </h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Moderator Feature Enabled</label>
                                <div class="col-lg-9 col-xl-9">
                                  <input type="checkbox" name="ModRights" value="1">
                                  <span class="form-text text-muted dis">Specify, if you would like the moderator feature enabled.</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id="operation-time">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Operation Hours & Time Slots</strong> </h6>
                              </div>
                              <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Slot Length</label>
                                <div class="col-lg-9 col-xl-9">
                                  <select name="SlotLength" class="form-control " id="show">
                                    <option value="0">Select</option>
                                    <option value="5">5 minutes</option>
                                    <option value="6">6 minutes</option>
                                    <option value="10">10 minutes</option>
                                    <option value="15">15 minutes</option>
                                    <option value="20">20 minutes</option>
                                    <option value="30">30 minutes</option>
                                    <option value="60">1 hour</option>
                                    <option value="120">2 hours</option>
                                    <option value="180">3 hours</option>
                                    <option value="240">4 hours</option>
                                    <option value="360">6 hours</option>
                                    <option value="720">12 hours</option>
                                    <option value="1440">1 day</option>
                                  </select>
                                  <span class="form-text text-muted">Select the length of booking slot.</span>
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center">
                                <div class="col-lg-2 col-xl-2 bg-light  pt-2">
                                  <h6>Day</h6>
                                </div>
                                <div class="col-lg-2 col-xl-2 bg-light pt-2">
                                  <h6>Availiable</h6>
                                </div>
                                <div class="col-lg-2 col-xl-2 bg-light pt-2">
                                  <h6>From</h6>
                                </div>
                                <div class="col-lg-2 col-xl-2 bg-light pt-2">
                                  <h6>To</h6>
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mb-1">
                                <div class="col-lg-2 col-xl-2">
                                  <h5>Monday</h5>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="checkbox" name="Checkboxes1">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mb-1">
                                <div class="col-lg-2 col-xl-2">
                                  <h5>Tuesday</h5>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="checkbox" name="Checkboxes1">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mb-1">
                                <div class="col-lg-2 col-xl-2">
                                  <h5>Wednesday</h5>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="checkbox" name="Checkboxes1">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mb-1">
                                <div class="col-lg-2 col-xl-2">
                                  <h5>Thursday</h5>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="checkbox" name="Checkboxes1">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mb-1">
                                <div class="col-lg-2 col-xl-2">
                                  <h5>Friday</h5>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="checkbox" name="Checkboxes1">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mb-1">
                                <div class="col-lg-2 col-xl-2">
                                  <h5>Saturday</h5>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="checkbox" name="Checkboxes1">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mb-1">
                                <div class="col-lg-2 col-xl-2">
                                  <h5>Sunday</h5>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="checkbox" name="Checkboxes1">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input type="time" class="form-control" value="00:00:00">
                                </div>
                              </div>
                              <div class="form-group row align-items-center justify-content-center mt-3">
                                <div class="col-lg-4 col-xl-4 bg-light  pt-4 pb-4 text-right">
                                  <button type="button" class="btn btn-sm btn-dark ml-5 font-weight-bolder text-uppercase " >Copy Monday</button>
                                </div>
                                <div class="col-lg-4 col-xl-4 bg-light pt-4 pb-4 text-left">
                                  <button type="button" class="btn btn-sm btn-dark ml-5 font-weight-bolder text-uppercase " >All Hour</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Auto Email Receipients</strong></h6>
                              </div>
                              <p class="form-text text-muted pl-5">Email address specified here will receive a notification whenever a booking for this resource is created, updated or deleted.</p>
                            </div>
                            <label class="col-xl-3 col-lg-3 col-form-label">Auto Email Receipients</label>
                            <div class="col-lg-9 col-xl-9">
                              <input class="form-control form-control-lg form-control-solid" name="EmailRecipients" type="text"  />
                              <span class="form-text text-muted">Please enter valid email address(es), Seprate multiple addresses with a comma</span>
                            </div>
                          </div>
                          <div class="row" id="custom-rights">
                            <div class="col-xl-12">
                              <div class="bg-light p-4 w-100 mt-5 mb-5">
                                <h6 class="mb-0"><strong>Custom Booking Info</strong> <button type="button" class="btn btn-sm btn-success ml-5 font-weight-bolder text-uppercase " >Add</button></h6>
                              </div>
                              <div class="form-group row">
                                <p class="form-text text-muted pl-5">This feature allow you to specify information fields that should be entered when making a booking for this resource. Click on Add button above to specify a new field. TO change the name or description of an existing Booking Field, click on its Name.</p>
                                <div class="col-lg-3 col-xl-3">
                                  <input class="form-control form-control-lg form-control-solid" name="" type="text" placeholder="name"  />
                                </div>
                                <div class="col-lg-3 col-xl-3">
                                  <input class="form-control form-control-lg form-control-solid" name="" type="text" placeholder="type"  />
                                </div>
                                <div class="col-lg-3 col-xl-3">
                                  <textarea class="form-control form-control-lg form-control-solid" name="" placeholder="description"></textarea>
                                </div>
                                <div class="col-lg-2 col-xl-2">
                                  <input class="form-control form-control-lg form-control-solid" name="" type="text" placeholder="Mandatory"  />
                                </div>
                                <button type="button" class="btn btn-delete btn-exit font-weight-bolder text-uppercase " >Delete</button>
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
  @include('footer')
</body>
<!--end::Body-->
</html>
