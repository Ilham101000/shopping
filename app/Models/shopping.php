<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class shopping extends Model
{
    use HasApiTokens,HasFactory, Notifiable;

    protected $table = "shopping";
    protected $guarded = ["id"];
}
