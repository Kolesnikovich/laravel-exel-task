<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Tests\TestCase;

class ApiTests extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_put_file(): void
    {
        $stub = __DIR__ . '/stubs/test.xlsx';
        $name = Str::random(8) . '.xlsx';
        $path = sys_get_temp_dir() . '/' . $name;

        copy($stub, $path);
        $login = 'hello';
        $password = 'world';
        $file = new UploadedFile($path, $name, 'image/png', null, true);
        $response = $this->call('POST', route('rows.parse'), [], [], ['file' => $file], [
            'Accept' => 'application/json',
            'HTTP_Authorization' => 'Basic '. base64_encode("{$login}:{$password}"),
            'PHP_AUTH_USER' => $login,
            'PHP_AUTH_PW' => $password
        ]);

        $response->assertJson(['status' => 'ok', 'message' => 'put in queue']);
    }

}
