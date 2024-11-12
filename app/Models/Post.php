<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LineupOrder;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [ //fillableプロパティで、一括で値を保存・更新したいカラムを設定する。カラム数が多いときはguardedプロパティを使用する。
        'title',
        'team',
        'body',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class); //belongsToメソッド=1対1(ひとりの投稿はひとつのユーザーに紐づく)の関係の時に使う
    }

    public function lineupOrders() {
        return $this->hasMany(LineupOrder::class);
    }
}
