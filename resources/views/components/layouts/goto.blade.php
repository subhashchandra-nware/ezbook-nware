@if ($slot != '' )

<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">

        </h3>
        <div class="card-toolbar">

            {{ $slot }}

        </div>
    </div>
    <!--end::Header-->
</div>
@endif
