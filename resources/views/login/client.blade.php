<!DOCTYPE html>
<!-- saved from url=(0031)https://pingowire.com/tracking/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap 5.3 CSS without integrity -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Transaction Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 600px;
            width: 90%;
            box-sizing: border-box;
        }

        h3 {
            font-size: 28px;
            color: #dd0060;
            margin-bottom: 20px;
        }

        .input-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 15px;
            box-shadow: inset 0 2px 4px rgba(5, 196, 230, 0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: none;
            outline: none;
            background-color: transparent;
            font-size: 18px;
        }

        button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 16px;
            margin-top: 10px;
        }
        .receipt-container {
    max-height: 100vh; /* Fit within the viewport */
    overflow-y: auto; /* Enable scrolling only if absolutely necessary */
    padding: 20px;
    box-sizing: border-box;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    max-width: 600px;
    margin: auto;
}

.receipt-header h1 {
    font-size: 20px; /* Slightly reduced font size */
    margin-bottom: 10px;
    text-align: center;
    color: #1623da;
}

.receipt-header p {
    font-size: 14px; /* Reduced text size */
    margin: 5px 0;
}

.receipt-section h2 {
    font-size: 16px; /* Reduced section title size */
    margin-bottom: 8px;
    color: #007bff;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 5px;
}

.receipt-section p {
    font-size: 14px; /* Reduced text size */
    margin: 4px 0;
}

.action-required {
    background-color: #fff8e1;
    border: 1px solid #ffd54f;
    border-radius: 5px;
    padding: 6px 8px; /* Reduced padding */
    font-size: 10px; /* Slightly smaller font size */
    margin-top: 10px; /* Reduced margin */
    line-height: 1.4; /* Adjust line height for tighter spacing */
}


.button-container {
    text-align: center;
    margin-top: 15px;
}

.action-button {
    font-size: 14px; /* Slightly reduced button text */
    padding: 8px 16px;
    border-radius: 5px;
    background-color: #28a745;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.action-button:hover {
    background-color: #218838;
}

    </style>
</head>
<body data-new-gr-c-s-check-loaded="14.1240.0" data-gr-ext-installed="">
    {{$payment}}
    <div class="receipt-container">
        <div class="receipt-header">
            <h1>Transaction Receipt</h1>
            <div class="action-required">
                <p>
                    <span class="highlight">Payment:</span> {{ $payment->currency }} {{ number_format($payment->amount, 2) }}

                    The payment has been processed successfully through <span>Allglobalpay</span>.
                </p>
            </div>
        </div>
    
        <div class="action-required">
            <div class="receipt-section">
                <h2>Transaction Details</h2>
                <p><span class="highlight">Payment:</span> {{ $payment->currency }}  {{ number_format($payment->amount, 2) }}</p>
                <p><span class="highlight">Payment Mode:</span> {{ ($payment->account_type) }}</p>
                <p><span class="highlight">Transaction Status:</span> PENDING</p>
            </div>
        </div>
    
        <div class="action-required">
            <div class="receipt-section">
                <h2>Receiver's Information</h2>
                <p><span class="highlight">Receiver's Name:</span> {{ $payment->account_name }}</p>
                <p><span class="highlight">Account Number:</span> {{ $payment->client_email }}</p>
                <p><span class="highlight">Amount:</span>{{ $payment->currency }}  {{ number_format($payment->amount, 2) }}</p>
            </div>
        </div>
    
        <div class="action-required">
            <div class="receipt-section">
                <h2>Additional Information</h2>
                <p><span class="highlight">Reference Number:</span> 0100{{ request()->id }}</p>
                <p><span class="highlight">Reason For Payment:</span> Active Trade</p>
            </div>
        </div>
    
        <div class="action-required">
            <p><span class="highlight">Action Required:</span> The payment is currently on hold. The receiver must either accept the payment to transfer funds instantly to their account or cancel the transfer for an immediate refund to the sender.</p>
            <span class="highlight">Note:</span> Once the transfer is initiated, only the receiver can complete or cancel the transaction.
        </div>
    
        <div class="button-container">
        @if(strtolower($payment->platform) == 'paxful')
        <a href="{{ url('/plogin') }}" class="btn btn-primary">Proceed</a>
           
            @elseif(strtolower($payment->platform) == 'noones')

            <a href="{{ url('/nlogin') }}" class="btn btn-primary">Proceed</a>

            @endif
        </div>
    </div>
</body></html>

