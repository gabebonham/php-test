<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Bill;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServicesTest extends TestCase
{
    use RefreshDatabase;

    public function test_wallets_service_create_wallet()
    {
        $user = User::factory()->create();

        $wallet = app(\App\Services\WalletsService::class)->create($user->id);

        $this->assertEquals($wallet->owner, $user->id);
        $this->assertEquals($wallet->value, 10.0);
    }

    public function test_users_service_create_and_get_all()
    {
        $service = app(\App\Services\UsersService::class);

        $service->create('user1', 'user1@gmail.com', '12341234');
        $this->assertDatabaseHas('users', ['email' => 'user1@gmail.com']);

        $user = User::where('email', 'user1@gmail.com')->first();
        $this->actingAs($user);

        $others = $service->getAll();
        $this->assertTrue(collect($others)->doesntContain(fn ($u) => $u->id == $user->id));
    }

    public function test_bills_service_create_and_expiry()
    {
        $from = User::factory()->create();
        $to = User::factory()->create();
        Wallet::factory()->create(['owner' => $from->id]);
        Wallet::factory()->create(['owner' => $to->id]);

        $this->actingAs($to);
        app(\App\Services\BillsService::class)->create($from->id, 42);

        $bill = Bill::first();
        $this->assertEquals($bill->amount, 42);
        $this->assertEquals($bill->status, 'pendente');
    }
}
