<?php

namespace Tests\Feature\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function 投稿作成画面が表示されていること(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/post/create');
        $response->assertStatus(200);
    }
}
