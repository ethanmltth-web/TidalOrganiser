<?php
session_start();

$config = require __DIR__ . '/config.php';

$code = isset($_GET['code']) ? trim($_GET['code']) : '';
$state = isset($_GET['state']) ? trim($_GET['state']) : '';
$stored = isset($_SESSION['oauth_state']) ? $_SESSION['oauth_state'] : '';

if ($code === '' || $state === '' || $stored === '' || !hash_equals($stored, $state)) {
    header('Location: login.php?error=invalid_state');
    exit;
}

unset($_SESSION['oauth_state']);

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')
    . '://' . $_SERVER['HTTP_HOST']
    . rtrim(dirname($_SERVER['REQUEST_URI']), '/');
$redirect_uri = $base_url . '/callback.php';

$token_url = 'https://oauth2.googleapis.com/token';
$body = http_build_query([
    'code'          => $code,
    'client_id'     => $config['client_id'],
    'client_secret' => $config['client_secret'],
    'redirect_uri'  => $redirect_uri,
    'grant_type'    => 'authorization_code',
]);

$ctx = stream_context_create([
    'http' => [
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $body,
    ],
]);

$response = @file_get_contents($token_url, false, $ctx);
if ($response === false) {
    header('Location: login.php?error=token_exchange');
    exit;
}

$data = json_decode($response, true);
if (empty($data['id_token'])) {
    header('Location: login.php?error=no_id_token');
    exit;
}

$id_token = $data['id_token'];
$parts = explode('.', $id_token);
if (count($parts) !== 3) {
    header('Location: login.php?error=invalid_token');
    exit;
}

$payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/')), true);
if (!$payload) {
    header('Location: login.php?error=invalid_token');
    exit;
}

$email = isset($payload['email']) ? $payload['email'] : '';
$name  = isset($payload['name']) ? $payload['name'] : (isset($payload['given_name']) ? $payload['given_name'] : '');

$_SESSION['user'] = [
    'email' => $email,
    'name'  => $name,
];

header('Location: app.php');
exit;
