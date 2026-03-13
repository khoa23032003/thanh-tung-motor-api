<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'full_name',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'deleted_flg',
        'deleted_by',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'password'   => 'hashed',
            'is_active'  => 'boolean',
            'deleted_at' => 'datetime',
        ];
    }

    public function softDelete(string $deletedBy): bool
    {
        return $this->forceFill([
            'deleted_flg' => 1,
            'deleted_by'  => $deletedBy,
            'deleted_at'  => now(),
        ])->save();
    }

    public function scopeNotDeleted($query)
    {
        return $query->where('deleted_flg', 0);
    }
}
