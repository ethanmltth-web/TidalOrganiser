<?php
session_start();

if (!empty($_SESSION['user'])) {
    header('Location: app.php');
    exit;
}

$config = require __DIR__ . '/config.php';
$client_id = $config['client_id'];

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
    . '://' . $_SERVER['HTTP_HOST']
    . rtrim(dirname($_SERVER['REQUEST_URI']), '/');
$redirect_uri = $base_url . '/callback.php';

$state = bin2hex(random_bytes(16));
$_SESSION['oauth_state'] = $state;

$auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?'
    . http_build_query([
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code',
        'scope'         => 'openid email profile',
        'state'         => $state,
    ]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in – TIDAL ORGANISER</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    .login-wrap { min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2rem; text-align: center; }
    .login-wrap .brand { margin-bottom: 0.5rem; }
    .login-wrap .tagline { margin-bottom: 2rem; }
    .btn-google { display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; padding: 0.9rem 1.75rem; font-family: var(--font-body); font-size: 1rem; font-weight: 600; color: #1e293b; background: #fff; border: 2px solid var(--tidal-border); border-radius: 10px; text-decoration: none; cursor: pointer; transition: border-color 0.2s, box-shadow 0.2s; }
    .btn-google:hover { border-color: var(--tidal-accent); box-shadow: 0 4px 16px rgba(56, 189, 248, 0.25); }
    .btn-google svg { width: 20px; height: 20px; }
  </style>
</head>
<body>
  <div class="wave-bg" aria-hidden="true"></div>
  <div class="login-wrap slide-up">
    <h1 class="brand">Tidal Organiser</h1>
    <p class="tagline">Organise your apps and schedule cleanly by Tidal Organising with Tidal Organiser</p>
    <a href="<?php echo htmlspecialchars($auth_url); ?>" class="btn-google" id="google-btn">
      <svg viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
      Sign in with Google
    </a>
  </div>
  <script>
    document.querySelector('.login-wrap').classList.add('visible');
  </script>
</body>
</html>
