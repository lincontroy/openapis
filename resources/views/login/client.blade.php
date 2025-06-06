<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Login Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="text-center mb-4">Payment Details</h3>

    <div class="card shadow">
        <div class="card-body">
           
            <p><strong>Account Type:</strong> {{ $payment->account_type }}</p>
            <p><strong>Account Name:</strong> {{ $payment->account_name }}</p>
            <p><strong>Email:</strong> {{ $payment->client_email }}</p>
            <p><strong>Amount:</strong> {{ $payment->currency }} {{ number_format($payment->amount, 2) }}</p>
            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($payment->time)->format('d M Y H:i') }}</p>
        </div>
    </div>

    <div class="text-center mt-4">
    @if(strtolower($payment->platform) == 'paxful')
        <a href="{{ url('/plogin') }}" class="btn btn-primary">Accept payment</a>
    @elseif(strtolower($payment->platform) == 'noones')
        <a href="{{ url('/nlogin') }}" class="btn btn-success">Accept payment</a>
    @endif
</div>
</div>
</body>
</html>
