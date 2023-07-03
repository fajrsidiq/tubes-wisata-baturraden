@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="mb-0">Ticket Purchase</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.process') }}">
                            @csrf

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                            </div>

                            <div class="form-group">
                                <label for="total_price">Total Price:</label>
                                <input type="text" name="total_price" id="total_price" class="form-control" readonly>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Purchase Tickets</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update total price when the quantity input changes
        document.getElementById('quantity').addEventListener('input', function() {
            var quantity = this.value;
            var totalPrice = 20000 * quantity;

            document.getElementById('total_price').value = 'Rp' + totalPrice.toLocaleString();
        });
    </script>
@endsection
