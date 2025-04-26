<?php

/**
 * The JWT key to use.
 *
 * NOTE: For production use do not commit this key to your repo. It must be
 * included via configuration or environment variables.
 */
const JWT_KEY = '9r87wde09r80w9ercqw98rcu436o5j4klhkrehjtrethutq2qurwiru';

/**
 * Base64 encode a string and remove some special characters from the string.
 *
 * If these special characters aren't removed from the string we can sometimes
 * create invalid JWT payloads that can't be decoded properly.
 *
 * We swap the following values in the string:
 * - "+" -> "-"
 * - "/" -> "_"
 * - "=" -> ""
 *
 * @param string $text
 *   The text to base64 encode.
 *
 * @return string
 *   The encoded string.
 */
function base64_url_encode(string $text): string {
  return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
}

/**
 * Base64 decode a string and replace special characters removed when encoding.
 *
 *  We swap the following values in the string:
 *  - "-" -> "+"
 *  - "_" -> "/"
 *
 * @param string $text
 *   The text to decode.
 *
 * @return string
 *   The decoded string.
 */
function base64_url_decode(string $text): string {
  return base64_decode(str_replace(["-", "_"], ["+", "/"], $text));
}

/**
 * Encode a payload in JWT format.
 *
 * @param array $payload
 *   The payload to encode.
 * @param string $key
 *   The JWT key to encode the payload with.
 *
 * @return string
 *   The resulting encoded string.
 */
function jwt_encode(array $payload, string $key): string {
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

/**
 * Decode the JWT string into the payload.
 *
 * @param string $token
 *   The full JWT token.
 * @param string $key
 *   The JWT key used to encode the payload.
 *
 * @return array
 *   The JWT payload.
 *
 * @throws Exception
 */
function jwt_decode(string $token, string $key): array {
  // Used named matching groups in a regular expression to extract the parts
  // of the JWT token.
  if (preg_match("/^(?<header>.+)\.(?<payload>.+)\.(?<signature>.+)$/", $token, $matches) !== 1) {
    throw new InvalidArgumentException("invalid token format");
  }

  $signature = hash_hmac("sha256", $matches["header"] . "." . $matches["payload"], $key, true);
  $signature_from_token = base64_url_decode($matches["signature"]);

  if (!hash_equals($signature, $signature_from_token)) {
    throw new Exception("signature doesn't match");
  }

  return json_decode(base64_url_decode($matches["payload"]), true);
}