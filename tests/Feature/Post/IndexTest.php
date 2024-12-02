<?php

namespace Tests\Feature\Post;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function 投稿一覧が表示されていること(): void
    {
        $user = User::factory()->create();

        // actingAs:ヘルパメソッド->認証が必要なページに認証したユーザーとしてリクエストを実行する
        $this->actingAs($user);

        $response = $this->get('/post');
        $response->assertStatus(200);
    }
}
