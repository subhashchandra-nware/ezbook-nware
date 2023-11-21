@extends('layouts.app')

@section('pageTitle', 'Subscriptions :: EzBook')

@section('content')
    <x-layouts.page-default heading="Subscriptions">
        <x-layouts.message />

        <x-layouts.form heading="Subscriptions">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{-- {{ __('You are logged in!') }} <br><br> --}}
                            <h3>Products</h3>
                            {{-- <a href="{{ route('goToPayment', ['search list', 25]) }}"><button>In Recommended Search List for
                                    $25</button></a> &nbsp;
                            <a href="{{ route('goToPayment', ['update information', 10]) }}"><button>Update Information for
                                    $10</button></a> --}}

                            @foreach ($data as $v)
                                    <x-forms.button class="fa fa-dollar-sign font-size-h1"
                                        href="{{ route('goToPayment', [$v['product']->name, $v['price']->unit_amount / 100]) }}"
                                        title="{{ $v['product']->description }}" value=" {{$v['price']->unit_amount / 100}} {{ $v['product']->name }}" />
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </x-layouts.form>

    </x-layouts.page-default>

@endsection

@pushOnce('scripts')
@endPushOnce
