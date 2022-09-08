<?php

namespace Tests\Utils;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Auth;
use Modules\Driver\Models\Driver;

trait AuthTestUtil
{
    private static $faker = null;

    /**
     * GetFaker
     *
     * @return Generator
     */
    private static function getFaker()
    {
        if (self::$faker == null) {
            self::$faker = Factory::create();
        }
        return self::$faker;
    }

    /**
     * FakeDriveAuthUser
     *
     * @return Driver
     */
    protected function fakeDriveAuthUser(): Driver
    {
        $user = new Driver();
        $faker = self::getFaker();

        $user->id = $faker->randomNumber(8);
        $user->email = $faker->email;
        $user->address = 'address';
        $user->save();
        Auth::setUser($user);

        return $user;
    }
}
