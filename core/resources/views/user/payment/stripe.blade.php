@extends('userlayout')
@section('content')
<div class="container-fluid mt--6">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="mb-0">{{__('Stripe payment')}}</h3>
            </div>

            <div class="card-body">
                <form accept-charset="UTF-8" class="require-validation" data-cc-on-file="false"
                    data-stripe-publishable-key="{{$stripe['value1']}}" action="{{route('ipn.stripe')}}" method="post"
                    id="payment-form">
                    @csrf
                    <input type="hidden" value="{{$stripe['track']}}" name="track">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Card Holder Name')}}</label>
                        <div class="col-lg-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control input-lg custom-input" name="name"
                                    placeholder="Card Holder Name" autocomplete="on" autofocus />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Card Number')}}</label>
                        <div class="col-lg-10">
                            <div class="input-group input-group-merge">
                                <input type="tel" class="form-control input-lg custom-input card-number"
                                    name="cardNumber" placeholder="Valid Card Number" autocomplete="on" required
                                    autofocus />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Expiration Date')}}</label>
                        <div class="col-lg-10">
                            <div class="input-group input-group-merge">
                                <input type="tel" class="form-control input-lg input-sz custom-input " name="cardExpiry"
                                    placeholder="MM / YYYY" autocomplete="on" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('CVC')}}</label>
                        <div class="col-lg-10">
                            <div class="input-group input-group-merge">
                                <input type="tel" class="form-control input-lg input-sz custom-input card-cvc"
                                    name="cardCVC" placeholder="CVC" autocomplete="on" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">{{__('Billing Address (USA Only)')}}</label>
                        <div class="col-lg-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control input-lg custom-input" name="address"
                                    placeholder="Billing Address" autocomplete="on" />
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm">{{__('Pay now')}}</button>
                    </div>
                </form>
            </div>
        </div>
        @stop


        @section('script')
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>
        <script>
        (function($) {
            $(document).ready(function() {
                var card = new Card({
                    form: '#payment-form',
                    container: '.card-wrapper',
                    formSelectors: {
                        numberInput: 'input[name="cardNumber"]',
                        expiryInput: 'input[name="cardExpiry"]',
                        cvcInput: 'input[name="cardCVC"]',
                        nameInput: 'input[name="name"]',
                        addressInput: 'input[name="address"]'
                    }
                });
            });
        })(jQuery);
        </script>
        @endsection