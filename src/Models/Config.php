<?php

namespace Core\Siteconfig\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';

    protected $fillable = [
        'key',
        'value',
        'is_env'
    ];

    protected $casts = [
        'is_env' => 'boolean',
    ];

    public function scopeSaveOption($query, $key, $value)
    {
        return Config::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'is_env' => false,
            ]
        );
    }

    public function scopeGetOption($query, $key)
    {
        return Config::where('key', $key)->first();
    }

    
}
