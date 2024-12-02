<?php

namespace Tests\Feature\Entry;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function 選手一覧が表示されていること(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/entry');
        $response->assertStatus(200);
    }
}
