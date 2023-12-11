@extends('layouts.app')

@section('pageTitle', 'Subscriptions :: EzBook')

@section('content')
    <x-layouts.page-default heading="Subscriptions">
        <x-layouts.message />
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-8">
                <div class="card rounded-3 pb-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h3 class="p-5">Make a secure payment</h3>
                            <h6></h6>
                        </div>

                        <form action="{{ route('processPayment', [$product, $price]) }}" method="POST" id="subscribe-form">
                            @csrf
                            <h6 class="mb-0">Notes</h6>
                            <ul>
                                <li>Payment can only be made using those credit cards listed below.</li>
                                <li>All fields in <span class="text-danger"> RED</span> are required fields.</li>
                                <li>Credit card companies have become increasingly security conscious about online payments.
                                    Please contact your credit card company and advise them of your purchase prior to
                                    submitting this billing request.</li>
                                <li>As soon as the order is processed successfully, a payment confirmation email will be
                                    sent to the email address entered below.</li>
                            </ul>
                            <h6 class="mb-0 mt-10">Pricing</h6>
                            <p>The current introductory price for using EZbook is ${{$plan}} per group of 10 resource calendars
                                per year.</p>
                            <h6 class="mb-0 mt-10">Billing for additional resources</h6>
                            <p>If you exceed the first 10 resource calendars at any time during the contract period, the
                                pricing increases by $299 for each increment of 10 resource calendars. There is no
                                adjustment to the orginal start date. You may add resource calendars at any time to take you
                                to the next increment of 10. You will be advised of additional costs by email.</p>

                            <p>For account queries please contact <a href="MAILTO:support@ezbook.com?Subject=Account Queries">support@ezbook.com</a></p>
                            <h6 class="mb-0 mt-10">Refund Policy</h6>
                            <p>Please ensure that you carefully read and understand the pricing and service offering as
                                contained on the home page under the section "ABOUT EZbook". Your card will be charged for
                                services as per the cost and description below. If for some reason you decide to discontinue
                                the use of the EZBook services and would like to request a pro-rated refund please contact
                                us at <a href="MAILTO:support@ezbook.com?Subject=Account Queries">support@ezbook.com</a> We will evaluate the request and if it is deemed valid we will
                                refund your request (minus processing and administration cost) by issuing and mailing a
                                check for the balance remaining.</p>
                            <h6 class="mt-10">Payment</h6>


                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="">Number of Resources</label>
                                        <input readonly type="text" id="number-of-resources" name="number-of-resources"
                                            class="form-control form-control-lg" value="{{ $product }}" />

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="">Amount (in $)</label>
                                        <input readonly type="text" id="price" name="price"
                                            class="form-control form-control-lg" value="{{ $price }}" />

                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="">Cardholder's Name</label>
                                <input type="text" id="card-holder-name" class="form-control form-control-lg"
                                    placeholder="Cardholder's Name" value="" />

                            </div>


                            <div class="row mb-4">
                                <div class="col">
                                    <div class="">
                                        <label for="card-element">Credit or Debit Card</label>
                                        <div id="card-element" class="form-control"> </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert" class="text-danger"></div>
                                    </div>
                                    <div class="stripe-errors"></div>
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}<br>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}"
                                class="btn btn-lg btn-success btn-block button">Make a payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{--
        <x-layouts.form heading="Subscriptions">
            <form action="{{ route('processPayment', [$product, $price]) }}" method="POST" id="subscribe-form">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="subscription-option">
                                <label for="plan-silver">
                                    <span class="plan-price">${{ $price }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="card-holder-name">Card Holder Name</label>
                <input id="card-holder-name" type="text" value="{{ $user->Name }}" disabled>
                @csrf
                <div class="form-row">
                    <label for="card-element">Credit or debit card</label>
                    <div id="card-element" class="form-control"> </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <div class="stripe-errors"></div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="form-group text-center">
                    <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}"
                        class="btn btn-lg btn-success btn-block">SUBMIT</button>
                </div>
            </form>
        </x-layouts.form>
        --}}


    </x-layouts.page-default>

@endsection

@pushOnce('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        /*
        const numberOfResources = document.getElementById('number-of-resources');
        const price = document.getElementById('price');
        const priceValue = price.value;
        numberOfResources.addEventListener('keyup', function() {
            var numberOfResourcesValue = numberOfResources.value;
            var nRound = Math.round(numberOfResourcesValue / 10) * 10;
            var multiplier = nRound / 10;
            if (nRound < numberOfResourcesValue) {
                multiplier = multiplier + 1;
            }
            price.value = priceValue * multiplier;
            // alert('priceValue:'+priceValue+' numberOfResourcesValue:'+numberOfResourcesValue+' nRound:'+nRound+' multiplier:'+multiplier);
        });
        */


        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {
            hidePostalCode: true,
            style: style
        });
        card.mount('#card-element');
        console.log(document.getElementById('card-element'));
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {
            cardButton.classList.add('spinning');
            var errorElement = document.getElementById('card-errors');
            if (cardHolderName.value == '') {
                errorElement.textContent = "Enter Cardholder Name."
                cardButton.classList.remove('spinning');
                return false;
            }
            console.log("attempting");
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            if (error) {
                errorElement.textContent = error.message;
                cardButton.classList.remove('spinning');
            } else {
                paymentMethodHandler(setupIntent.payment_method);
            }
        });

        function paymentMethodHandler(payment_method) {
            var form = document.getElementById('subscribe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
@endPushOnce

@push('styles')
    <style>
        .button {
            display: inline-block;
            outline: none;
            padding: 10px 20px;
            background: #444;
            border-radius: 4px;
            color: #fff;
            border: 0;
            position: relative;
            transition: padding-right 0.3s ease;
            box-shadow: 0 1px 0 #6e6e6e inset, 0px 1px 0 #3b3b3b;
        }

        .button.spinning {
            /* padding-right: 40px; */
        }

        .button.spinning:after {
            content: "";
            right: 60%;
            top: 50%;
            width: 0;
            height: 0;
            position: absolute;
            border-radius: 50%;
            -webkit-animation: rotate360 0.5s infinite linear, exist 0.1s forwards ease;
            animation: rotate360 0.5s infinite linear, exist 0.1s forwards ease;
        }

        .button.spinning:before {
            content: "";
            width: 0px;
            height: 0px;
            border-radius: 50%;
            right: 60%;
            top: 50%;
            position: absolute;
            border: 2px solid #000000;
            border-right: 3px solid #27ae60;
            -webkit-animation: rotate360 0.5s infinite linear, exist 0.1s forwards ease;
            animation: rotate360 0.5s infinite linear, exist 0.1s forwards ease;
        }

        @-webkit-keyframes rotate360 {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes rotate360 {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-webkit-keyframes exist {
            100% {
                width: 15px;
                height: 15px;
                margin: -8px 5px 0 0;
            }
        }

        @keyframes exist {
            100% {
                width: 15px;
                height: 15px;
                margin: -8px 5px 0 0;
            }
        }
    </style>
@endpush
