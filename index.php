<?php
/**
 * Landing page: show the introduction (index.html).
 * Sign-in is via the floating button; signed-in users can open app.php directly.
 */
header('Content-Type: text/html; charset=utf-8');
readfile(__DIR__ . '/index.html');
