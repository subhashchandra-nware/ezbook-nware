@props([
    'data' => null,
])
@php
    $checkedArr = array_column($data, 'DayofWeek');
    // $search = array_search($k, $checkedArr);
    // dd($data, $checkedArr, $search);
@endphp
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
@foreach (['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday',] as $k => $v)

<div class="form-group row align-items-center justify-content-center mb-1">
    <div class="col-lg-2 col-xl-2">
        <h5>{{ $v }}</h5>
    </div>
    <div class="col-lg-2 col-xl-2">
        <input id="time-{{$k}}" class="day" type="checkbox" name="DayofWeek[]"  value="{{ $k }}" @checked(old( 'DayofWeek[]', in_array($k, $checkedArr) )) >
    </div>
    <div class="col-lg-2 col-xl-2">
        <input @if(!in_array($k, $checkedArr)) disabled @endif type="time" name="OpenTime[]" class="{{$v}}-time-from time-from time form-control time-{{$k}}" value="{{ old( 'OpenTime[]', (in_array($k, $checkedArr)) ? $data[array_search($k, $checkedArr)]['OpenTime'] : '00:00:00') }}">
    </div>
    <div class="col-lg-2 col-xl-2">
        <input @if(!in_array($k, $checkedArr)) disabled @endif type="time" name="CloseTime[]" class="{{$v}}-time-to time-to time form-control time-{{$k}}" value="{{ old( 'CloseTime[]', (in_array($k, $checkedArr)) ? $data[array_search($k, $checkedArr)]['CloseTime'] : '00:00:00') }}">
    </div>
</div>
@endforeach

<div class="form-group row align-items-center justify-content-center mt-3">
    <div class="col-lg-4 col-xl-4 bg-light  pt-4 pb-4 text-right">
        <button type="button" id="all-day"
            class="all-day btn btn-sm btn-dark ml-5 font-weight-bolder text-uppercase ">Copy
            Monday</button>
    </div>
    <div class="col-lg-4 col-xl-4 bg-light pt-4 pb-4 text-left">
        <button type="button" id="all-hour"
            class="all-hour btn btn-sm btn-dark ml-5 font-weight-bolder text-uppercase ">All
            Hour</button>
    </div>
</div>
