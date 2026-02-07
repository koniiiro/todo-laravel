<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $table = 'quizzes';  // テーブル名を明示的に指定

    // fillableを追加
    protected $fillable = [
        'name',
        'type',
    ];
    }