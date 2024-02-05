<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'area',
        'no_hp',
        'kelas',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    protected static $enumCache = [];

    public static function getKelasOptions($column)
    {
        $instance = new static;

        if (!isset(self::$enumCache[$column])) {
            $enumValues = [];

            // Menggunakan query langsung untuk mendapatkan nilai-nilai enum
            $type = DB::select("SHOW COLUMNS FROM {$instance->getTable()} WHERE Field = '{$column}'")[0]->Type;

            preg_match('/^enum\((.*)\)$/', $type, $matches);

            $enumValues = array_map(
                'trim',
                explode(',', str_replace("'", '', $matches[1]))
            );

            // Simpan hasil dalam cache
            self::$enumCache[$column] = $enumValues;
        }

        return self::$enumCache[$column];
    }
}
