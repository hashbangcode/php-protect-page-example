<?php

const JWT_KEY = '9r87wde09r80w9ercqw98rcu436o5j4klhkrehjtrethutq2qurwiru';

function base64_url_encode(string $text): string {
  return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
}

function base64_url_decode(string $text): string {
  return base64_decode(str_replace(["-", "_"], ["+", "/"], $text));
}

function jwt_encode(array $payload, $key): string {
  $header = json_encode([
    "alg" => "HS256",
    "typ" => "JWT"
  ]);

  $header = base64_url_encode($header);
  $payload = json_encode($payload);
  $payload = base64_url_encode($payload);

  $signature = hash_hmac("sha256", $header . "." . $payload, $key, true);
  $signature = base64_url_encode($signature);
  return $header . "." . $payload . "." . $signature;
}

function jwt_decode(string $token, $key): array {
  if (preg_match("/^(?<header>.+)\.(?<payload>.+)\.(?<signature>.+)$/", $token, $matches) !== 1) {
    throw new InvalidArgumentException("invalid token format");
  }

  $signature = hash_hmac("sha256", $matches["header"] . "." . $matches["payload"], $key, true);

  $signature_from_token = base64_url_decode($matches["signature"]);

  if (!hash_equals($signature, $signature_from_token)) {
    throw new Exception("signature doesn't match");
  }

  $payload = json_decode(base64_url_decode($matches["payload"]), true);

  return $payload;
}