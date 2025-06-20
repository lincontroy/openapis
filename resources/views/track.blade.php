<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Track</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      padding: 1rem;
    }

    .tracking-container {
      background: white;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .tracking-container h2 {
      margin-bottom: 1.5rem;
      font-size: 1.5rem;
      color: #333;
    }

    .tracking-container form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .tracking-container input[type="text"] {
      padding: 0.8rem 1rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: border 0.2s;
    }

    .tracking-container input[type="text"]:focus {
      border-color: #007bff;
    }

    .tracking-container button {
      background-color: #007bff;
      color: white;
      padding: 0.8rem;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .tracking-container button:hover {
      background-color: #0056b3;
    }

    .tracking-container .icon {
      font-size: 2rem;
      color: #007bff;
      margin-bottom: 0.5rem;
    }
  </style>
</head>
<body>

  <div class="tracking-container">
    <div class="icon">
      <i class="fas fa-search-location"></i>
    </div>
    <h2>TRACKING VERIFICATION</h2>
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    <form action="/track" method="POST">
        @csrf
      <input type="text" name="tracking_number" placeholder="Enter Tracking Number" required />
      <button type="submit">Track</button>
    </form>
  </div>

</body>
</html>
