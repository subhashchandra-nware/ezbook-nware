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
                        <div class="card-body text-center">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{-- <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
<stripe-pricing-table pricing-table-id="prctbl_1OFDyiSAKhfg1xl3gDAnySxf"
publishable-key="pk_test_51O9ldESAKhfg1xl3NL5iXzG4bpN3eWumdgnUsQsMSbfeg7MfK97PKYuZD4JSXbuuBBYwFbzaZ9tCv4joxiwnBnYm00qF8rZvEJ">
</stripe-pricing-table> --}}
                            {{-- {{ __('You are logged in!') }} <br><br> --}}
                            {{-- <h3>Products</h3> --}}
                            {{-- <a href="{{ route('goToPayment', ['search list', 25]) }}"><button>In Recommended Search List for
                                    $25</button></a> &nbsp;
                            <a href="{{ route('goToPayment', ['update information', 10]) }}"><button>Update Information for
                                    $10</button></a> --}}

                            {{-- @foreach ($data as $v)
                                    <x-forms.button class="fa fa-dollar-sign font-size-h1"
                                        href="{{ route('goToPayment', [$v['product']->name, $v['price']->unit_amount / 100]) }}"
                                        title="{{ $v['product']->description }}" value=" {{$v['price']->unit_amount / 100}} {{ $v['product']->name }}" />
                            @endforeach --}}

                            <h3><span class="text-primary">Ezbook</span> Subscription Information</h3>

                            <p>Your EZbook Free Trial Period expires on <span class="text-danger h6">{{ $ExpiryDate }}</span></p>

                            <p class="mb-0">Subscribe now!</p>
                            <p class="mb-0">This will allow full use of your EZbook site until</p>
                            <h6 class="text-danger"> {{ $UntilDate }}</h6>
                            <p>Pay now by credit card with <span class="h6"> secure on-line transaction</span></p>

                            <p class="mb-0"><a href="{{ route('goToPayment', ['subscription', 299]) }}" target="_blank">Proceed to secure online payment.</a></p>
                            <p>(Will open a new window)</p>

                            <p>The billing history for this organization can be viewed <a href="#">here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </x-layouts.form>

    </x-layouts.page-default>

@endsection

@pushOnce('scripts')
@endPushOnce
