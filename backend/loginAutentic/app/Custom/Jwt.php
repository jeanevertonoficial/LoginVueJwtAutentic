<?php

namespace App\Custom;

use App\Models\User;
use Firebase\JWT\JWT as JWTFirebase;
use Firebase\JWT\Key;

class Jwt
{
    public static function validate()
    {
        $authorization = $_SERVER['HTTP_AUTHORIZATION'];
        $key = $_ENV['JWT_KEY'];
        $token = str_replace('Bearer ', '', $authorization);
        try {
            $decoded = JWTFirebase::decode($token, new key($key, 'HS256'));
            return response()->json($decoded, 200);
        }  catch (\Throwable $e) {
            return response()->json($e->getMessage(), 401);
        }
    }

    public static function create(User $data)
    {
        $key = $_ENV['JWT_KEY'];

        $payload = [
            'exp' => time() + 1800,
            'iat' => time(),
            'data' => $data
        ];
        // bate no jwt e cria o token
        return JWTFirebase::encode($payload, $key, 'HS256');
    }
}
