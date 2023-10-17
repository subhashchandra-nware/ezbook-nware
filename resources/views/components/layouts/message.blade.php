
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{-- @dd($message) --}}
        {{-- {{ gettype($message) }} --}}
        @if ($message == 0)
        <ul>
            @foreach ($message->all() as $msg)
                <li><strong>{{ $msg }}</strong></li>
            @endforeach
        </ul>
        @else
        <strong>{{ $message }}</strong>
        @endif
    </div>
    @elseif ($message = Session::get('fail'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @if (is_object($message))
        <ul>
            @foreach ($message->all() as $msg)
                <li><strong>{{ $msg }}</strong></li>
            @endforeach
        </ul>
        @else
        <strong>{{ $message }}</strong>
        @endif
    </div>
    @elseif ($message = Session::get('failed'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @if (is_object($message))
        <ul>
            @foreach ($message->all() as $msg)
                <li><strong>{{ $msg }}</strong></li>
            @endforeach
        </ul>
        @else
        <strong>{{ $message }}</strong>
        @endif
    </div>
    @elseif ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @if (is_object($message))
        <ul>
            @foreach ($message->all() as $msg)
                <li><strong>{{ $msg }}</strong></li>
            @endforeach
        </ul>
        @else
        <strong>{{ $message }}</strong>
        @endif
    </div>
    {{-- @dd($errors) --}}
    @elseif ($message = Session::get('alert'))
    <div class="alert alert-primary alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @if (is_object($message))
        <ul>
            @foreach ($message->all() as $msg)
                <li><strong>{{ $msg }}</strong></li>
            @endforeach
        </ul>
        @else
        <strong>{{ $message }}</strong>
        @endif

    </div>
    @elseif ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        @if (is_object($message))
        <ul>
            @foreach ($message->all() as $msg)
                <li><strong>{{ $msg }}</strong></li>
            @endforeach
        </ul>
        @else
        <strong>{{ $message }}</strong>
        @endif
    </div>
@endif
