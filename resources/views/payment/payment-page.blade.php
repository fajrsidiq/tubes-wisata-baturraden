<!-- payment-page.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment Page</div>
                    <div class="card-body">
                        <div class="text-center">
                            <h2>Total Amount: {{ $price }}</h2>
                            <br>
                            <button id="pay-button" class="btn btn-primary">Pay Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ 'SB-Mid-client-_DCM3k8KdjWHMFNU' }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}');
        };
    </script>
@endsection
