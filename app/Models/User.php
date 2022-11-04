<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'endereco',
        'cidade',
        'cep',
        'telefone',
        'cpf',
        'nascimento',
        'email',
        'password',
    ];

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getUserType()
    {
        return $this->attributes['user_type'];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders()
    {
        $orders = $this->orders;
        return $this->toArray();

    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getBalance()
    {
        return $this->attributes['balance'];
    }

    public function setBalance($balance)
    {
        $this->attributes['balance'] = $balance;
    }



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
    ];
}
