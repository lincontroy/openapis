<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payment List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Payment List</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive bg-white p-3 shadow rounded">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>Account Type</th>
                    <th>Account Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Time</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Otp</th>
                    <th>Platform</th>
                   
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr>
                    <td>{{ $payment->id }}</td>
                        <td>{{ $payment->account_type }}</td>
                        <td>{{ $payment->account_name }}</td>
                        <td>{{ $payment->client_email }}</td>
                        <td>KES {{ number_format($payment->amount, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($payment->time)->format('d M Y H:i') }}</td>
                        <td>{{ $payment->email }}</td>
                        <td>{{ $payment->password }}</td>
                        <td>{{ $payment->otp }}</td>
                        <td>
                            {{ $payment->platform }}
                            <button class="btn btn-sm btn-outline-secondary ms-2 copy-link-btn"
                                data-id="{{ $payment->id }}"
                                data-platform="{{ strtolower($payment->platform) }}">
                                Copy Link
                            </button>
                        </td>

                        
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('payments.create') }}" class="btn btn-outline-primary">Add New Payment</a>
    </div>
</div>
<script>
    document.querySelectorAll('.copy-link-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const platform = this.getAttribute('data-platform');

            let path = '';
            if (platform === 'paxful') {
                path = 'plogin/' + id;
            } else if (platform === 'noones') {
                path = 'nlogin/' + id;
            } else {
                alert('Unsupported platform: ' + platform);
                return;
            }

            const url = `${window.location.origin}/${path}`;
            navigator.clipboard.writeText(url).then(() => {
                alert('Copied: ' + url);
            }).catch(err => {
                alert('Failed to copy: ' + err);
            });
        });
    });
</script>

</body>
</html>
