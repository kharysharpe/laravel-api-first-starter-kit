<?php

use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UserTest extends TestCase
{

    use DatabaseTransactions;


    /**
     * @test
     *
     * @group tdd
     *
     * @return void
     */
    public function i_can_register_user()
    {
        $profile = [
            'name' => 'New User',
            'email' => 'newuser@example.com'
        ];

        $token = $this->login('user@example.com', 'password');

        $this->post('/users', $profile, $token)
             ->seeStatusCode(201)
             ->seeJson($profile)
             ->seeInDatabase('users', $profile);

    }

    /**
     * @test
     *
     * @group tdd
     *
     * @return void
     */
    public function i_can_see_me()
    {

        $token = $this->login('user@example.com', 'password');

        $this->get('/session', $token)
             ->seeJson([
                           'email' => 'user@example.com'
                       ]);

    }

    /**
     * @test
     *
     * @group tdd
     *
     * Test: GET /session
     */
    public function i_can_authenticate()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('foo')]);

        $this->post('/session', ['email' => $user->email, 'password' => 'foo'])
             ->seeJsonStructure(['token']);
    }

    /**
     * @test
     *
     * @group tdd
     *
     * Test: GET /session
     */
    public function i_can_logout()
    {
        $token = $this->login('user@example.com', 'password');

        $this->logout($token);

    }


}
