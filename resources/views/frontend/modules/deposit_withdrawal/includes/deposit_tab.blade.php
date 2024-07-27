<form action="" onsubmit="validateForm();return false;">
    <div class="container" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }

                                    .card-button {
                                        cursor: pointer;
                                        transition: transform 0.2s;
                                    }

                                    .card-button:hover {
                                        transform: scale(1.05);
                                        background-color: rgb(16, 105, 51);
                                        cursor: pointer;
                                    }

                                    .card-button.active {
                                        border: 2px solid #007bff;
                                        background-color: rgb(16, 105, 51) !important;
                                    }
                                </style>
                                <h6 class="mt-2">Payment Methods</h6>
                                <hr class="thick-hr">
                                <div class="row text-center">
                                    <div class="col-md-2 col-lg-2 col-4 text-center my-2">
                                        <div class="card card-button payment-method-button"
                                            style="width:100px;height:100px" data-value="Bkash"
                                            onclick="selectPaymentMethod(this)">
                                            <div class="container p-2">
                                                <img src="{{ asset('assets/deposit/bkash.jpg') }}" width="50px"
                                                    alt="">
                                                <p>Bkash</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-4 text-center my-2">
                                        <div class="card card-button payment-method-button"
                                            style="width:100px;height:100px" data-value="Nagad"
                                            onclick="selectPaymentMethod(this)">
                                            <div class="container p-2">
                                                <img src="{{ asset('assets/deposit/nagad.jpg') }}" width="50px"
                                                    alt="">
                                                <p>Nagad</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-4 text-center my-2">
                                        <div class="card card-button payment-method-button"
                                            style="width:100px;height:100px" data-value="Rocket"
                                            onclick="selectPaymentMethod(this)">
                                            <div class="container p-2">
                                                <img src="{{ asset('assets/deposit/rocket.jpg') }}" width="50px"
                                                    alt="">
                                                <p>Rocket</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-4 text-center my-2">
                                        <div class="card card-button payment-method-button"
                                            style="width:100px;height:100px" data-value="Upay"
                                            onclick="selectPaymentMethod(this)">
                                            <div class="container p-2">
                                                <img src="{{ asset('assets/deposit/upay.png') }}" width="50px"
                                                    alt="">
                                                <p>Upay</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-4 text-center my-2">
                                        <div class="card card-button payment-method-button"
                                            style="width:100px;height:100px" data-value="BTC"
                                            onclick="selectPaymentMethod(this)">
                                            <div class="container p-2">
                                                <img src="{{ asset('assets/deposit/btc.webp') }}" width="50px"
                                                    alt="">
                                                <p>BTC</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-4 text-center my-2">
                                        <div class="card card-button payment-method-button"
                                            style="width:100px;height:100px" data-value="Paypal"
                                            onclick="selectPaymentMethod(this)">
                                            <div class="container p-2">
                                                <img src="{{ asset('assets/deposit/paypal.jpeg') }}" width="50px"
                                                    alt="">
                                                <p>Paypal</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="payment_method" id="payment_method">

                                <script>
                                    function selectPaymentMethod(card) {
                                        // Remove active class from all payment method cards
                                        var cards = document.getElementsByClassName('payment-method-button');
                                        for (var i = 0; i < cards.length; i++) {
                                            cards[i].classList.remove('active');
                                        }

                                        // Add active class to the selected card
                                        card.classList.add('active');

                                        // Set the hidden input value to the data-value of the selected card
                                        var paymentMethodInput = document.getElementById('payment_method');
                                        paymentMethodInput.value = card.getAttribute('data-value');
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Deposit Channel</h6>
                                <hr class="thick-hr">
                                <div class="d-flex justify-content-start">
                                    <div class="text-center my-2 mx-4">
                                        <div class="card card-button deposit-channel-button"
                                            style="width:150px;height:50px" data-value="Cash Out"
                                            onclick="selectDepositChannel(this)">
                                            <div class="container p-2">
                                                <p>Cash Out</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center my-2">
                                        <div class="card card-button deposit-channel-button"
                                            style="width:150px;height:50px" data-value="Send Money"
                                            onclick="selectDepositChannel(this)">
                                            <div class="container p-2">
                                                <p>Send Money</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="deposit_channel" id="deposit_channel">


                                <style>
                                    .card-button:hover {
                                        background-color: rgb(16, 105, 51);
                                        cursor: pointer;
                                    }

                                    .card-button.active {
                                        border: 2px solid #007bff;
                                    }
                                </style>

                                <script>
                                    function selectDepositChannel(card) {
                                        // Remove active class from all deposit channel cards
                                        var cards = document.getElementsByClassName('deposit-channel-button');
                                        for (var i = 0; i < cards.length; i++) {
                                            cards[i].classList.remove('active');
                                        }

                                        // Add active class to the selected card
                                        card.classList.add('active');

                                        // Set the hidden input value to the data-value of the selected card
                                        var depositChannelInput = document.getElementById('deposit_channel');
                                        depositChannelInput.value = card.getAttribute('data-value');
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Amount</h6>
                                <hr class="thick-hr">
                                <div class="row justify-content-center mx-1">
                                    <div class="col-md-2 col-5">
                                        <div class="text-center my-2">
                                            <div class="card card-button amount-button" data-value="200"
                                                onclick="selectAmount(this)">
                                                <div class="p-2">
                                                    <h5>200</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="text-center my-2">
                                            <div class="card card-button amount-button" data-value="500"
                                                onclick="selectAmount(this)">
                                                <div class="p-2">
                                                    <h5>500</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="text-center my-2">
                                            <div class="card card-button amount-button" data-value="1000"
                                                onclick="selectAmount(this)">
                                                <div class="p-2">
                                                    <h5>1000</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="text-center my-2">
                                            <div class="card card-button amount-button" data-value="2000"
                                                onclick="selectAmount(this)">
                                                <div class="p-2">
                                                    <h5>2000</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="text-center my-2">
                                            <div class="card card-button amount-button" data-value="5000"
                                                onclick="selectAmount(this)">
                                                <div class="p-2">
                                                    <h5>5000</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="text-center my-2">
                                            <div class="card card-button amount-button" data-value="25000"
                                                onclick="selectAmount(this)">
                                                <div class="p-2">
                                                    <h5>25000</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input class="form-control mx-4 mt-1" placeholder="Min ৳ 200 - Max ৳ 25,000"
                                        type="number" id="amount" name="amount" required>
                                </div>

                                <script>
                                    function selectAmount(card) {
                                        // Remove active class from all amount cards
                                        var cards = document.getElementsByClassName('amount-button');
                                        for (var i = 0; i < cards.length; i++) {
                                            cards[i].classList.remove('active');
                                        }

                                        // Add active class to the selected card
                                        card.classList.add('active');

                                        // Set the input value to the data-value of the selected card
                                        var amountInput = document.getElementById('amount');
                                        amountInput.value = card.getAttribute('data-value');
                                    }
                                </script>

                                <style>
                                    .card-button {
                                        cursor: pointer;
                                        transition: transform 0.2s;
                                    }

                                    .card-button:hover {
                                        transform: scale(1.05);
                                    }

                                    .card-button.active {
                                        border: 2px solid #007bff;
                                    }
                                </style>

                                <style>
                                    .card-button:hover {
                                        background-color: rgb(16, 105, 51);
                                        cursor: pointer;
                                    }
                                </style>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 0px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="m-2">
                            <div class="">
                                <style>
                                    .thick-hr {
                                        border: none;
                                        border-top: 2px solid black;
                                        margin: 0;
                                    }
                                </style>
                                <h6 class="mt-2">Deposit Bonus</h6>
                                <hr class="thick-hr">
                                <div class="col-md-5">
                                    <select class="form-select m-1 mt-2" name="bonus" id="bonus">
                                        <option value="" selected>No Bonus</option>
                                        <option value="20">20% Weekly Reload Bonus up to ৳ 25000 (live
                                            Casino)
                                        </option>
                                        <option value="20">20% Weekly Reload Bonus up to ৳ 25000 (Slot &
                                            Cash
                                            Game)
                                        </option>
                                        <option value="10">10% Weekly Reload Bonus up to ৳ 25000 (Sports)
                                        </option>
                                        <option value="200">JILI Slot Weekly 200% Reload Bonus</option>
                                    </select>
                                </div>
                                <script>
                                    // Update hidden input field with selected bonus value
                                    document.getElementById('bonus').addEventListener('change', function() {
                                        var bonusValue = this.value;
                                        document.getElementById('bonus_input').value = bonusValue;
                                    });
                                </script>

                                <input type="hidden" name="turnover" id="turnover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 5px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="">
                            <div class="">

                                <button type="button" onclick="validateForm()" id="depositButton"
                                    class="form-control btn btn-lg btn-success confirm">Deposit</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-3">
                    <img id="modalPaymentImage" class="rounded-circle img-thumbnail" width="80px" alt="">


                </div>
                <p>নীচে দেখানো বর্তমান এজেন্ট নম্বরে আপনার টাকা ট্রান্সফার করুন। নিশ্চিত করুন যে আপনি সঠিক ট্রানসাকশান
                    আইডি প্রবেশ করেছেন।
                </p>
                <table class="table table-striped">
                    <tr>
                        <th>Amount:</th>
                        <td><b><span id="modalAmount"></span> ৳</b></td>
                    </tr>
                    <tr>
                        <th id="modalNagadAgent">Nagad Agent:</th>
                        <td>
                            <strong id="agentNumber">{{$paymentNumbers->bkash_payment ?? null}}</strong>
                            {{-- <strong >{{$paymentNumbers->bkash_payment ?? null}}</strong> --}}
                            <button id="copy-btn" class="btn btn-success mx-3 btn-sm"><i
                                    class="fa-solid fa-copy"></i></button>
                        </td>
                    </tr>
                </table>
                <form class="mt-4" action="{{ route('deposit.store') }}" method="post">
                    @csrf
                    <label for="">Payment Number</label>
                    <input class="form-control" type="number" name="payment_number" required>
                    <label for="">Transaction Id</label>
                    <input class="form-control" type="text" name="transaction_id" required>

                    <input type="hidden" name="payment_method" id="payment_method_input">
                    <input type="hidden" name="deposit_channel" id="deposit_channel_input">
                    <input type="hidden" name="amount" id="amount_input">
                    <input type="hidden" name="bonus" id="bonus_input">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null }}">


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    // Copy agent number to clipboard
    document.getElementById('copy-btn').addEventListener('click', function() {
        var agentNumber = document.getElementById('agentNumber').innerText;
        navigator.clipboard.writeText(agentNumber).then(function() {
            alert('Agent number copied to clipboard');
        }, function() {
            alert('Failed to copy agent number');
        });
    });
</script>
