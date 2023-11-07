
@extends('layouts.app')
@section('pageTitle', 'Site Setting :: EzBook')

@section('content')
<x-layouts.page-default heading="Site Setting">
    {{-- <x-slot:heading>Site Setting</x-slot:heading> --}}
    @php
        extract($data);
        $timezones = collect(Config('timezone'))->mapWithKeys(function (array $item, int $key) {
            $tz[$item['UTCoffset']] = "{$item['location']} ({$item['UTCoffset']}) {$item['name']}";
            return $tz;
        })->all();
        $timezone = null;
        $timezones = ['0' => 'Select Timezone']+$timezones;
        // dd($timezones);
    @endphp
 <x-layouts.message />
    <x-layouts.goto>
        <x-forms.button class="ml-3 btn-success" value="Site Settings" />
        <x-forms.button class="ml-3" value="Subscription" />
    </x-layouts.goto>
<x-layouts.form heading="Site Setting">

    <x-forms.form enctype="multipart/form-data" method="put" action="{{ route('setting.update', ['setting' => $id]) }}">
        <x-forms.input value="{{ old( 'id', $id??'' ) }}" name="id" type="hidden" />
        {{-- <x-forms.input value="{{ old( 'IsBusinessProfileUpdated', $IsBusinessProfileUpdated??'' ) }}" name="IsBusinessProfileUpdated" type="hidden" /> --}}
        <x-forms.input design="1" value="{{ old( 'Name', $Name??'' ) }}" name="Name" label="Company Name" />
        {{-- <x-forms.input design="1" value="{{ old( 'file', $file??'' ) }}" type="file" name="file" label="Company Logo" desc="Max file size is 1MB." /> --}}
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label">Company Logo</label>
            <div class="col-lg-9 col-xl-9">
              <div class="uppy" id="kt_uppy_5">
                <div class="uppy-wrapper">
                  <div class="uppy-Root uppy-FileInput-container">
                    <input class="uppy-FileInput-input uppy-input-control" type="file" name="file" id="kt_uppy_5_input_control" style="">
                    <label class="uppy-input-label btn btn-light-primary btn-sm btn-bold" for="kt_uppy_5_input_control">Attach files</label>
                    @error('file')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                  </div>
                </div>
              </div>
              <span class="form-text text-muted">Max file size is 1MB.</span>
            </div>
          </div>
        <x-forms.input design="1" value="{{ old( 'HomeURL', $HomeURL??'' ) }}" name="HomeURL" label="Site ID" />
        <x-forms.input design="1" value="{{ old( 'OrgUrl', $OrgUrl??'' ) }}" name="OrgUrl" label="Company Site" />
        <x-forms.input design="1" value="{{ old( 'ContactName', $ContactName??'' ) }}" name="ContactName" label="Contact Name" />
        <x-forms.input design="1" value="{{ old( 'ContactEmail', $ContactEmail??'' ) }}" name="ContactEmail" label="Contact Email" />
        <x-forms.input design="1" value="{{ old( 'ContactNumber', $ContactNumber??'' ) }}" name="ContactNumber" label="Mobile Number" type="tel" />
        <x-forms.input design="1" value="{{ old( 'ContactAddress1', $ContactAddress1??'' ) }}" name="ContactAddress1" label="Address 1" />
        <x-forms.input design="1" value="{{ old( 'ContactAddress2', $ContactAddress2??'' ) }}" name="ContactAddress2" label="Address 2" />
        <x-forms.input design="1" value="{{ old( 'ContactCity', $ContactCity??'' ) }}" name="ContactCity" label="City" />
        <x-forms.input design="1" value="{{ old( 'ContactCountry', $ContactCountry??'' ) }}" name="ContactCountry" label="Country" />
        <x-forms.input design="1" value="{{ old( 'ContactZip', $ContactZip??'' ) }}" name="ContactZip" label="Zip" />
        <x-forms.input design="1" disabled value="{{ old( 'registrationDate', $registrationDate??'' ) }}" name="registrationDate" label="Registration Date" />
        <x-forms.select selected="{{ $timezone }}" design="1" class="select2" name="timezone" label="Timezone" :options="$timezones" />

        <!--begin::Actions-->
        <div class="d-flex justify-content-end border-top mt-5 pt-10">
            <div>
              <x-forms.button design="1" onclick="window.history.go(-1); return false;" value="Cancel" name="" class="btn-exit" />
              <x-forms.button design="1" value="Save" name="" type="submit" class="btn-save" />
            </div>
          </div>
          <!--end::Actions-->
    </x-forms.form>
</x-layouts.form>
</x-layouts.page-default>
@endsection

@pushOnce('scripts')
    <script>
        // Your custom JavaScript...
        $(document).ready(function() {

            $('.select2').select2();

            // END::DOCUMENT READY
        });
    </script>
@endPushOnce
