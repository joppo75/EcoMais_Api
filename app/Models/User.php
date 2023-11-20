<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
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

    public function findForPassport(){
        return $this->where('username', $username)->first();
    }

    public function verificarUsuario($username) {
        $usuario = User::where('username', $username)->first();
    
        if ($usuario) {
            // O usuário está cadastrado
            return response()->json(['message' => 'Usuário cadastrado'], 200);
        } else {
            // O usuário não está cadastrado
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
    }
}

