<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            <label class="form-label">Payment mode</label>
            <input type="text" name="account_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Receiver's Name</label>
            <input type="text" name="account_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="client_email" class="form-control" >
        </div>

        <div class="mb-3">
        <label class="form-label">Currency</label>
        <select class="form-control" name="currency" id="currency" required>
  <option value="USD">US Dollar (USD)</option>
  <option value="EUR">Euro (EUR)</option>
  <option value="GBP">British Pound (GBP)</option>
  <option value="JPY">Japanese Yen (JPY)</option>
  <option value="CNY">Chinese Yuan (CNY)</option>
  <option value="INR">Indian Rupee (INR)</option>
  <option value="CAD">Canadian Dollar (CAD)</option>
  <option value="AUD">Australian Dollar (AUD)</option>
  <option value="CHF">Swiss Franc (CHF)</option>
  <option value="ZAR">South African Rand (ZAR)</option>
  <option value="KES">Kenyan Shilling (KES)</option>
  <option value="NGN">Nigerian Naira (NGN)</option>
  <option value="BRL">Brazilian Real (BRL)</option>
  <option value="MXN">Mexican Peso (MXN)</option>
  <option value="RUB">Russian Ruble (RUB)</option>
  <option value="SGD">Singapore Dollar (SGD)</option>
  <option value="NZD">New Zealand Dollar (NZD)</option>
  <option value="SEK">Swedish Krona (SEK)</option>
  <option value="NOK">Norwegian Krone (NOK)</option>
  <option value="DKK">Danish Krone (DKK)</option>
  <option value="HKD">Hong Kong Dollar (HKD)</option>
  <option value="THB">Thai Baht (THB)</option>
  <option value="TWD">Taiwan Dollar (TWD)</option>
  <option value="IDR">Indonesian Rupiah (IDR)</option>
  <option value="MYR">Malaysian Ringgit (MYR)</option>
  <option value="PHP">Philippine Peso (PHP)</option>
  <option value="PKR">Pakistani Rupee (PKR)</option>
  <option value="BDT">Bangladeshi Taka (BDT)</option>
  <option value="VND">Vietnamese Dong (VND)</option>
  <option value="TRY">Turkish Lira (TRY)</option>
  <option value="SAR">Saudi Riyal (SAR)</option>
  <option value="AED">UAE Dirham (AED)</option>
  <option value="QAR">Qatari Riyal (QAR)</option>
  <option value="EGP">Egyptian Pound (EGP)</option>
  <option value="MAD">Moroccan Dirham (MAD)</option>
  <option value="TND">Tunisian Dinar (TND)</option>
  <option value="DZD">Algerian Dinar (DZD)</option>
  <option value="GHS">Ghanaian Cedi (GHS)</option>
  <option value="TZS">Tanzanian Shilling (TZS)</option>
  <option value="UGX">Ugandan Shilling (UGX)</option>
  <option value="ETB">Ethiopian Birr (ETB)</option>
  <option value="XOF">West African CFA Franc (XOF)</option>
  <option value="XAF">Central African CFA Franc (XAF)</option>
  <option value="BWP">Botswana Pula (BWP)</option>
  <option value="MWK">Malawian Kwacha (MWK)</option>
  <option value="ZMW">Zambian Kwacha (ZMW)</option>
  <option value="MZN">Mozambican Metical (MZN)</option>
  <option value="AOA">Angolan Kwanza (AOA)</option>
  <option value="PLN">Polish Zloty (PLN)</option>
  <option value="CZK">Czech Koruna (CZK)</option>
  <option value="HUF">Hungarian Forint (HUF)</option>
  <option value="RON">Romanian Leu (RON)</option>
  <option value="ARS">Argentine Peso (ARS)</option>
  <option value="CLP">Chilean Peso (CLP)</option>
  <option value="PEN">Peruvian Sol (PEN)</option>
  <option value="COP">Colombian Peso (COP)</option>
  <option value="UYU">Uruguayan Peso (UYU)</option>
  <option value="BOB">Bolivian Boliviano (BOB)</option>
  <option value="CRC">Costa Rican Colón (CRC)</option>
  <option value="DOP">Dominican Peso (DOP)</option>
  <option value="GTQ">Guatemalan Quetzal (GTQ)</option>
  <option value="HNL">Honduran Lempira (HNL)</option>
  <option value="JMD">Jamaican Dollar (JMD)</option>
  <option value="NIO">Nicaraguan Córdoba (NIO)</option>
  <option value="PYG">Paraguayan Guarani (PYG)</option>
  <option value="BHD">Bahraini Dinar (BHD)</option>
  <option value="KWD">Kuwaiti Dinar (KWD)</option>
  <option value="OMR">Omani Rial (OMR)</option>
  <option value="LBP">Lebanese Pound (LBP)</option>
  <option value="ILS">Israeli Shekel (ILS)</option>
  <option value="KRW">South Korean Won (KRW)</option>
  <option value="LKR">Sri Lankan Rupee (LKR)</option>
  <option value="MMK">Myanmar Kyat (MMK)</option>
  <option value="KHR">Cambodian Riel (KHR)</option>
  <option value="NPR">Nepalese Rupee (NPR)</option>
  <option value="MVR">Maldivian Rufiyaa (MVR)</option>
  <option value="BND">Brunei Dollar (BND)</option>
  <option value="LAK">Lao Kip (LAK)</option>
  <option value="MOP">Macanese Pataca (MOP)</option>
  <option value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>
  <option value="MKD">Macedonian Denar (MKD)</option>
  <option value="MDL">Moldovan Leu (MDL)</option>
  <option value="GEL">Georgian Lari (GEL)</option>
  <option value="AMD">Armenian Dram (AMD)</option>
  <option value="AZN">Azerbaijani Manat (AZN)</option>
  <option value="UZS">Uzbekistani Som (UZS)</option>
  <option value="KZT">Kazakhstani Tenge (KZT)</option>
  <option value="MNT">Mongolian Tugrik (MNT)</option>
  <option value="TJS">Tajikistani Somoni (TJS)</option>
  <option value="AFN">Afghan Afghani (AFN)</option>
  <option value="IRR">Iranian Rial (IRR)</option>
  <option value="IQD">Iraqi Dinar (IQD)</option>
  <option value="SYP">Syrian Pound (SYP)</option>
  <option value="YER">Yemeni Rial (YER)</option>
</select>


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
