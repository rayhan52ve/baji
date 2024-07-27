
<form id="withdrawalForm" action="{{ route('withdraw.store') }}" method="post">
    @csrf
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
                                <h6 class="mt-2">Payment Methods</h6>
                                <hr class="thick-hr">
                                <div class="row text-center">
                                    <div class="col-md-2 col-lg-2 col-4 text-center my-2">
                                        <div class="card card-button payment-method-button"
                                            style="width:100px;height:100px" data-value="Bkash"
                                            onclick="selectWithdrawalMethod(this)">
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
                                            onclick="selectWithdrawalMethod(this)">
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
                                            onclick="selectWithdrawalMethod(this)">
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
                                            onclick="selectWithdrawalMethod(this)">
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
                                            onclick="selectWithdrawalMethod(this)">
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
                                            onclick="selectWithdrawalMethod(this)">
                                            <div class="container p-2">
                                                <img src="{{ asset('assets/deposit/paypal.jpeg') }}" width="50px"
                                                    alt="">
                                                <p>Paypal</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="withdraw_method" id="withdraw_method" required>

                                <style>
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
                                    }
                                </style>

                                <script>
                                    function selectWithdrawalMethod(card) {
                                        // Remove active class from all payment method cards
                                        var cards = document.getElementsByClassName('payment-method-button');
                                        for (var i = 0; i < cards.length; i++) {
                                            cards[i].classList.remove('active');
                                        }

                                        // Add active class to the selected card
                                        card.classList.add('active');

                                        // Set the hidden input value to the data-value of the selected card
                                        var withdrawalMethodInput = document.getElementById('withdraw_method');
                                        withdrawalMethodInput.value = card.getAttribute('data-value');
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
                                <div class="d-flex justify-content-center">
                                    <input class="form-control m-1" placeholder="Min ৳ 800 - Max ৳ 25,000"
                                        min="800" max="25000" id="withdraw_amount" name="withdraw_amount"
                                        type="number" required>

                                </div>

                                <style>
                                    .card-button:hover {
                                        background-color: rgb(16, 105, 51);
                                        /* Change to the desired color */
                                        cursor: pointer;
                                        /* Change cursor to pointer on hover */
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
                                <h6 class="mt-2">Withdraw Number</h6>
                                <hr class="thick-hr">
                                <div class="col-md-5">
                                    <input class="form-control m-1 mt-2" placeholder="Enter your payment number"
                                        type="number" name="withdraw_number" value="{{ auth()->user()->phone }}" readonly>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null }}">


    <div class="container" style="margin-top: 5px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="background:rgb(226, 226, 236);">
                    <div class="vertical-align-middle">
                        <div class="">
                            <div class="">

                                <button type="button" class="form-control btn btn-lg btn-success withdraw"
                                    id="withdrawButton">Withdrawal</button>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Event binding for withdrawal button
        $(document).on('click', '.withdraw', function() {
            // Validate the form before proceeding
            if (!validateWithdrawalForm()) {
                return; // Exit if form is not valid
            }

            let withdraw_amount = document.getElementById('withdraw_amount').value;
            let withdraw_method = document.getElementById('withdraw_method').value; // Fetch selected payment method
            // Display SweetAlert for withdrawal confirmation
            Swal.fire({
                title: 'Withdraw Details',
                html: `<table class="table table-bordered">
                    <tr>
                        <td>Withdraw Amount:</td>
                        <td>৳ ${withdraw_amount}</td>
                    </tr>
                    <tr>
                        <td>Withdraw Method:</td>
                        <td>${withdraw_method}</td>
                    </tr>
                </table>`,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                // If user confirms withdrawal
                if (result.isConfirmed) {
                    // Submit the form
                    $('#withdrawalForm').submit();
                }
            });
        });
    });

    function validateWithdrawalForm() {
        // Collect form data
        let withdraw_amount = document.getElementById('withdraw_amount').value;
        let withdraw_method = document.getElementById('withdraw_method').value;

        // Your validation logic here
        if (withdraw_amount < 800 || withdraw_amount > 25000) {
            // Show error message
            Swal.fire({
                icon: 'error',
                title: 'Invalid Amount',
                text: 'Withdraw amount must be between ৳ 800 and ৳ 25,000.',
            });
            return false; // Form is not valid
        }

        if (!withdraw_method) {
            // Show error message
            Swal.fire({
                icon: 'error',
                title: 'No Payment Method Selected',
                text: 'Please select a payment method for withdrawal.',
            });
            return false; // Form is not valid
        }

        // Form is valid
        return true;
    }
</script>

