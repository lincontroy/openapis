<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Add Payment</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Fix the following errors:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.store') }}" method="POST" class="bg-white p-4 shadow rounded">
        @csrf
        <div class="mb-3">
            <label class="form-label">Account Type</label>
            <input type="text" name="account_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Account Name</label>
            <input type="text" name="account_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="client_email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Platform</label>
            <select class="form-control" name="platform" required>
                <option value="paxful">Paxful</option>
                <option value="noones">Noones</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Time</label>
            <input type="datetime-local" name="time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit Payment</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('payments.view') }}" class="btn btn-outline-secondary">View Payments</a>
    </div>
</div>
</body>
</html>
