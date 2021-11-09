<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Test extends WebTestCase
{
    /**test routes without login access */
    public function testPublicAccess(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();

        // $client->request('GET', '/register');
        // $this->assertResponseIsSuccessful();
    }

    public function testRestrictedAccessAsUser(): void
    {
        $client = static::createClient();

        /** @var UserRepository $userRepository */
        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneBy(['email' => 'user@avdl.fr']);

        $client->loginUser($testUser);

        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/logout');
        $this->assertResponseIsSuccessful();

    }
}
