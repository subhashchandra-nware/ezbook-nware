<div class="card card-custom">
    <div class="card-body p-0">
        <!--begin::Wizard Body-->
        <div class="row justify-content-center my-8 px-10">
            <div class="col-xl-12">
                <!--begin::Form Wizard-->
                <h3 class="font-weight-bold text-dark pb-5">{{ $heading }}</h3>
                {{ $slot }}

                <!--end::Form Wizard-->
            </div>
        </div>
        <!--end::Wizard Body-->
    </div>
</div>
