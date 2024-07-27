<div class="container" style="margin-top: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="background:rgb(202, 202, 211);">
                <div class="vertical-align-middle">
                    <div class="m-2">
                        <div class="d-flex justify-content-between">
                            <h6 id="buttons" class="mt-2">
                                Main Wallet:
                                {{-- <i class="fa-solid fa-arrows-rotate fa-lg mx-1"></i> --}}
                                <i class="fa-regular fa-eye fa-lg mx-1" onclick="toggleBalance()"></i>
                            </h6>
                            <h6 id="balance"><b style="font-size:30px">৳</b> <span id="actualBalance"> {{ number_format(auth()->user()->wallet->balance, 2) }}</span></h6>

                            <script>
                                function toggleBalance() {
                                    var balanceElement = document.getElementById('balance');
                                    var actualBalanceElement = document.getElementById('actualBalance');
                                    if (actualBalanceElement.textContent === '*****') {
                                        actualBalanceElement.textContent = actualBalanceElement.dataset.balance;
                                    } else {
                                        actualBalanceElement.dataset.balance = actualBalanceElement.textContent;
                                        actualBalanceElement.textContent = '*****';
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
