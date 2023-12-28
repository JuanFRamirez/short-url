<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'url',
        'name',
        'formated_name'
    ];

    public function getRandomString()
    {
        return Str::random(8);
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (Url $url) {
            $serverName = request()->getSchemeAndHttpHost();
            $randomString = $url->getRandomString();
            $url->name = $randomString;
            $url->formated_name = "{$serverName}/srt/{$randomString}";
        });
    }
}
