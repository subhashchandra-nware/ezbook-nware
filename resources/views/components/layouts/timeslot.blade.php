@props([
    'data' => null,
])
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
        <input id="time-{{$k+1}}" class="day" type="checkbox" name="DayofWeek[]"  value="{{ $k+1 }}" @checked(old( 'DayofWeek[]', $data[$k]['DayofWeek']??null)) >
    </div>
    <div class="col-lg-2 col-xl-2">
        <input @if(!isset($data[$k]['OpenTime'])) disabled @endif type="time" name="OpenTime[]" class="{{$v}}-time-from time-from time form-control time-{{$k+1}}" value="{{old( 'OpenTime[]', $data[$k]['OpenTime']??'00:00:00')}}">
    </div>
    <div class="col-lg-2 col-xl-2">
        <input @if(!isset($data[$k]['CloseTime'])) disabled @endif type="time" name="CloseTime[]" class="{{$v}}-time-to time-to time form-control time-{{$k+1}}" value="{{old( 'CloseTime[]', $data[$k]['CloseTime']??'00:00:00')}}">
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
