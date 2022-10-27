<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'news',
      'description',
      'photo',
      'photo_new',
      'category_id',
      'status_id',
      'user_id',
    ];

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id')->first()->name;
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->first()->name;
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first()->login;
    }
}
