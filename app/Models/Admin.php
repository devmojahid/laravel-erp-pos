<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
    use Notifiable,HasFactory,HasRoles;

    protected $guarded = [];

    protected $guard = 'admin';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAllAdmins()
    {
        return self::all();
    }

    public static function createAdmin($data)
    {
        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password'=>Hash::make($data['password'])
        ]);
    }

    public static function updateAdmin($data, $id)
    {
        return self::find($id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password'=>Hash::make($data['password'])
        ]);
    }

    public static function getAdminById($id)
    {
        return self::find($id);
    }

    public static function deleteAdmin($id)
    {
        return self::find($id)->delete();
    }
}
