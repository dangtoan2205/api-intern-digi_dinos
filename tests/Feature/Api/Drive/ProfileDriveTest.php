<?php

namespace Tests\Feature\Api\Drive;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Tests\Utils\AuthTestUtil;

class ProfileDriveTest extends TestCase
{
    use WithoutMiddleware;
    use AuthTestUtil;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostProfileDriveSuccess(): void
    {
        $user = $this->fakeDriveAuthUser();


        $response = $this->post(
            "api/drivers/post-profile",
            [
                'address' => 'namnn',
            ]
        );

        $drive = $user->fresh();

        $response->assertStatus(200);
        $this->assertEquals($drive->address, 'namnn');
    }
}
