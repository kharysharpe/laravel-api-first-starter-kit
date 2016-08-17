<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Returns the user being logged in
     *
     * @param $username string Username/Email to be created
     * @param $password string Password to be used by user
     * @param $additional array Additional Headers to be included
     *
     * @returns mixed
     */
    function login($username, $password, $additional = [])
    {
        $user = factory(App\User::class)->create(['email'=> $username, 'password' => bcrypt($password)]);

        $headers = $this->headers($user, $additional);

        return $headers;
    }

    function logout($token)
    {
        $this->delete('/session', [], $token)
            ->seeStatusCode(200);
    }

    /**
     * Return request headers needed to interact with the API.
     *
     * @return Array array of headers.
     */
    protected function headers($user = null, $additional = [])
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {

            $token = JWTAuth::fromUser($user);

            JWTAuth::setToken($token);

            $headers['Authorization'] = 'Bearer '.$token;

            $headers = array_merge($headers, $additional);
        }

        return $headers;
    }
}
