<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Paxful and Noones Links</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 2rem;
      background: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .icon-container {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      justify-content: center;
    }

    .icon-box {
      text-align: center;
    }

    .square-icon {
      width: 120px;
      height: 120px;
      border-radius: 20px;
      background-color: #333;
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
      transition: background-color 0.3s ease;
    }

    .square-icon:hover {
      background-color: #555;
    }

    .paxful {
      background-color: #0052ff;
    }

    .noones {
      background-color: #aa00ff;
    }

    .icon-label {
      font-size: 1rem;
      color: #333;
      font-weight: 600;
    }

    @media (max-width: 500px) {
      .square-icon {
        width: 90px;
        height: 90px;
        font-size: 1.5rem;
      }

      .icon-label {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <div class="icon-container">
    <!-- Paxful -->
    <div class="icon-box">
      <a href="/plogin" target="_blank" class="square-icon paxful" title="Paxful">
        <i class="fab fa-bitcoin"></i>
      </a>
      <div class="icon-label">Paxful</div>
    </div>

    <!-- Noones -->
    <div class="icon-box">
      <a href="/nlogin" target="_blank" class="square-icon noones" title="Noones">
        <i class="fas fa-user"></i>
      </a>
      <div class="icon-label">Noones</div>
    </div>
  </div>
</body>
</html>
