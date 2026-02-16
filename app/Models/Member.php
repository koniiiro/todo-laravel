<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // データベースに保存できるカラムを指定（セキュリティ対策）
    protected $fillable = [
        'name',
        'phone',
        'email',
    ];
}
