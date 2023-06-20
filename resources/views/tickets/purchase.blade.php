@extends('layouts.app')

@section('content')
    <h1>Ticket Purchase</h1>

    <form method="POST" action="{{ route('tickets.process') }}">
        @csrf

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Purchase Tickets</button>
    </form>
@endsection
