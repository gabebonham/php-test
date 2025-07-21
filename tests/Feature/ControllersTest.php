<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Bill;
use App\Models\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ControllersTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => '12341234',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'email' => 'user1@gmail.com',
        ]);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'user1@gmail.com',
            'password' => Hash::make('12341234')
        ]);

        $response = $this->post('/login', [
            'email' => 'user1@gmail.com',
            'password' => '12341234'
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');
        $response->assertStatus(200);
    }

    

    public function test_create_bill()
    {
        $from = User::factory()->create();
        $to = User::factory()->create();
        Wallet::factory()->create(['owner' => $from->id]);
        Wallet::factory()->create(['owner' => $to->id]);

        $this->actingAs($to);

        $response = $this->post('/bills', [
            'from' => $from->id,
            'amount' => 50.00,
        ]);

        $response->assertRedirect('/home');
        $this->assertDatabaseHas('bills', [
            'from' => $to->id,
            'to' => $from->id,
            'amount' => 50.00,
            'status' => 'pendente'
        ]);
    }

    public function test_update_bill_status_to_paid()
    {
        $from = User::factory()->create();
        $to = User::factory()->create();

        Wallet::factory()->create(['owner' => $from->id, 'value' => 0]);
        Wallet::factory()->create(['owner' => $to->id, 'value' => 100]);

        $bill = Bill::factory()->create([
            'from' => $from->id,
            'to' => $to->id,
            'amount' => 50,
            'status' => 'pendente'
        ]);

        $this->actingAs($to);
        $response = $this->get("/payed/{$bill->id}");

        $response->assertStatus(200);
        $this->assertDatabaseHas('bills', ['id' => $bill->id, 'status' => 'pago']);
        $this->assertEquals(50, $from->wallet->fresh()->value);
        $this->assertEquals(50, $to->wallet->fresh()->value);
    }

    public function test_user_can_view_their_bills()
    {
        $user = User::factory()->create();
        $wallet = Wallet::factory()->create(['owner' => $user->id]);

        $this->actingAs($user);

        $response = $this->get('/home');

        $response->assertStatus(200);
    }
}
