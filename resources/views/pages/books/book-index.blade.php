@extends('layouts.app')
@section('pageTitle', 'Books :: EzBook')

@section('content')
    <x-layouts.page>
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <!--Side Col Sidebar Start-->
                <div class="col-md-2">
                    <div id="kt_aside_menu" class="aside-menu " data-menu-vertical="1" data-menu-scroll="1"
                        data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        @php
                            // dd($data);
                            extract($data);
                            $LocationOptions = ['0' => 'Select Location'] + array_combine(array_column($ResourceLocation, 'id'), array_column($ResourceLocation, 'Name'));
                        @endphp
                        <ul class="menu-nav ">
                            <li class="menu-section">
                                <h4 class="menu-text">Location</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            <li>
                                <x-forms.form class="form p-5">
                                    <div class="form-group">
                                        <x-forms.select name="resourceLocation" :options="$LocationOptions"
                                            class="form-control form-control-md location-select2" id="show" />
                                    </div>
                                    <div class="form-group">
                                        <x-forms.input name="searchResources" placeholder="Search Resources" type="text"
                                            class="form-control form-control-md" />
                                    </div>
                                    {{-- <div class="form-group">
                                        <x-forms.button design="2" name="submit" type="submit" value="Search"/>
                                    </div> --}}
                                </x-forms.form>
                            </li>
                        </ul>

                        <x-layouts.menu-vertical name="Choose A Resource" :menus="$ResourceTypes" childkey="resource" />

                        <!--end::Menu Nav-->
                    </div>
                </div>
                <!--Side Col Sidebar End-->

                <div class="col-md-10">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Resource Name</h3>
                            </div>
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-primary font-weight-bold">
                                    <i class="ki ki-plus icon-md mr-2"></i>Add Event</a>

                                <form class="form p-5">
                                    <div class="form-group mb-0">
                                        <select class="form-control form-control-md " id="show">
                                            <option>Select Option</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="kt_calendar"></div>
                        </div>
                    </div>
                    <!--end::Card-->

                </div>
            </div>
        </div>
        <!--end::Container-->
    </x-layouts.page>
@endsection
@pushOnce('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/pages/features/calendar/google.js') }}"></script>
    <!--end::Page Scripts-->

    <script>
        $(document).ready(function() {
            $('.location-select2').select2();
        });
    </script>
@endPushOnce
