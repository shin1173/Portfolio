<?php

namespace Tests\Feature\Entry;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function 選手作成画面が表示されていること(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/entry/player');
        $response->assertStatus(200);
    }
}
