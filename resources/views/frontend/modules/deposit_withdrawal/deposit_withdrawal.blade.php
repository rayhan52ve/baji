@extends('frontend.layouts.master')
@section('content')
    <div class="container custom-margin">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card position-relative" style="height:50px;">

                    <ul class="nav  mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation" style="width: 50%;">
                            <a class="nav-link form-control active btn btn-warning  w-100" id="pills-deposit-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-deposit" role="tab"
                                aria-controls="pills-deposit" aria-selected="true">Deposit</a>
                        </li>
                        <li class="nav-item" role="presentation" style="width: 50%;">
                            <a class="nav-link btn btn-success  w-100" id="pills-withdrawal-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-withdrawal" role="tab" aria-controls="pills-withdrawal"
                                aria-selected="false">Withdrawal</a>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript code -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const withdrawalBtn = document.getElementById("withdrawalBtn");
            withdrawalBtn.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent the default behavior of the link

                // Switch to the deposit tab
                const depositTab = document.getElementById("pills-deposit-tab");
                const withdrawalTab = document.getElementById("pills-withdrawal-tab");
                depositTab.classList.remove("active");
                withdrawalTab.classList.add("active");

                // Navigate to the deposit route
                window.location.href = "{{ route('user.deposit') }}";
            });
        });
    </script>

    @include('frontend.modules.deposit_withdrawal.includes.main_wallet')



    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab"
            tabindex="0">

            @include('frontend.modules.deposit_withdrawal.includes.deposit_tab')

        </div>
        <div class="tab-pane fade" id="pills-withdrawal" role="tabpanel" aria-labelledby="pills-withdrawal-tab"
            tabindex="0">

            @include('frontend.modules.deposit_withdrawal.includes.withdrawal_tab')

        </div>
    </div>

    <div style="margin: 50px"></div>
    <!-- SweetAlert2 script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script> --}}
    <script>
        document.getElementById('depositButton').addEventListener('click', function() {
            validateForm();
        });

        function validateForm() {
            // Collect form data
            let formData = {
                payment_method: document.getElementById('payment_method').value,
                deposit_channel: document.getElementById('deposit_channel').value,
                amount: document.getElementById('amount').value,
                bonus: document.getElementById('bonus').value,
            };

            // Send AJAX request to validate form data
            fetch('/validate-deposit-form', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    // Clear previous error messages
                    document.querySelectorAll('.error-message').forEach(el => el.remove());

                    if (data.errors) {
                        // Display error messages
                        for (const [key, messages] of Object.entries(data.errors)) {
                            const inputElement = document.getElementById(key);
                            const errorMessage = document.createElement('div');
                            errorMessage.classList.add('error-message');
                            errorMessage.style.color = 'red';
                            errorMessage.textContent = messages.join(', ');

                            if (inputElement) {
                                inputElement.parentNode.appendChild(errorMessage);
                            }
                        }
                    } else if (data.success) {
                        // Proceed with SweetAlert confirmation
                        let amount = document.getElementById('amount').value;
                        let bonusPercentage = parseFloat(document.getElementById('bonus').value);

                        // Calculate the bonus as a percentage of the amount
                        let bonus = (amount * bonusPercentage) / 100;

                        // Calculate the target turnover
                        let targetTurnover;
                        if (!isNaN(bonus)) {
                            let sumamountbonus = Number(amount) + Number(bonus);
                            targetTurnover = sumamountbonus * 12;
                        } else {
                            targetTurnover = amount;
                        }

                        bonus = isNaN(bonus) ? 0 : bonus;

                        Swal.fire({
                            title: 'Deposit Details',
                            html: `<table class="table table-bordered">
                                <tr>
                                    <td>Deposit Amount:</td>
                                    <td>৳ ${amount}</td>
                                </tr>
                                <tr>
                                    <td>Bonus Amount:</td>
                                    <td>৳ ${bonus}</td>
                                </tr>
                                <tr>
                                    <td>Target Turnover:</td>
                                    <td>৳ ${targetTurnover}</td>
                                </tr>
                            </table>`,
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Call function to populate and show the modal
                                openModal();
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function openModal() {
            // Get selected payment method, deposit channel, and amount
            var paymentMethod = document.getElementById('payment_method').value;
            var depositChannel = document.getElementById('deposit_channel').value;
            var amount = document.getElementById('amount').value;

            // Set the hidden input values
            document.getElementById('payment_method_input').value = paymentMethod;
            document.getElementById('deposit_channel_input').value = depositChannel;
            document.getElementById('amount_input').value = amount;

            // Set the modal content dynamically
            document.getElementById('modalAmount').innerText = amount;
            // document.getElementById('agentNumber').innerText = '{{ $paymentNumbers->bkash_payment ?? null }}'; 

            // Set the modal image dynamically based on payment method
            var agentNumber = '';
            var paymentImageSrc = '';
            var nagadAgent = '';

            switch (paymentMethod) {
                case 'Bkash':
                    paymentImageSrc = "{{ asset('assets/deposit/bkash.jpg') }}";
                    if (depositChannel == 'Cash Out') {
                        agentNumber = '{{ $paymentNumbers->bkash_payment ?? null }}';
                        nagadAgent = 'Bkash Agent';
                    } else if (depositChannel == 'Send Money') {
                        agentNumber = '{{ $paymentNumbers->bkash_personal ?? null }}';
                        nagadAgent = 'Bkash Personal';
                    }
                    break;
                case 'Nagad':
                    paymentImageSrc = "{{ asset('assets/deposit/nagad.jpg') }}";
                    if (depositChannel == 'Cash Out') {
                        agentNumber = '{{ $paymentNumbers->nagad_payment ?? null }}';
                        nagadAgent = 'Nagad Agent';
                    } else if (depositChannel == 'Send Money') {
                        agentNumber = '{{ $paymentNumbers->nagad_personal ?? null }}';
                        nagadAgent = 'Nagad Personal';
                    }
                    break;
                case 'Rocket':
                    paymentImageSrc = "{{ asset('assets/deposit/rocket.jpg') }}";
                    if (depositChannel == 'Cash Out') {
                        agentNumber = '{{ $paymentNumbers->rocket_payment ?? null }}';
                        nagadAgent = 'Rocket Agent';
                    } else if (depositChannel == 'Send Money') {
                        agentNumber = '{{ $paymentNumbers->rocket_personal ?? null }}';
                        nagadAgent = 'Rocket Personal';
                    }
                    break;
                case 'Upay':
                    paymentImageSrc = "{{ asset('assets/deposit/upay.png') }}";
                    if (depositChannel == 'Cash Out') {
                        agentNumber = '{{ $paymentNumbers->upay_payment ?? null }}';
                        nagadAgent = 'Upay Agent';
                    } else if (depositChannel == 'Send Money') {
                        agentNumber = '{{ $paymentNumbers->upay_personal ?? null }}';
                        nagadAgent = 'Upay Personal';
                    }
                    break;
                case 'BTC':
                    paymentImageSrc = "{{ asset('assets/deposit/btc.webp') }}";
                    agentNumber = '{{ $paymentNumbers->btc ?? null }}';
                    nagadAgent = 'BTC';
                    break;
                case 'Paypal':
                    paymentImageSrc = "{{ asset('assets/deposit/paypal.jpeg') }}";
                    agentNumber = '{{ $paymentNumbers->paypal ?? null }}';
                    nagadAgent = 'Paypal';
                    break;
                default:
                    paymentImageSrc = "{{ asset('assets/deposit/default.jpg') }}";
                    agentNumber = '{{ $paymentNumbers->default ?? null }}';
            }

            document.getElementById('modalPaymentImage').src = paymentImageSrc;
            document.getElementById('modalNagadAgent').innerText = nagadAgent;
            document.getElementById('agentNumber').innerText = agentNumber;

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            myModal.show();
        }
    </script>
@endsection
