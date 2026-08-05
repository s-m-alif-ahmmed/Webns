<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin\Blog\Blog;
use App\Models\Admin\User\Department;
use App\Models\Admin\User\Designation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    protected $guarded = [];


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

    private static $user, $users;

    public static function updateUser($request, $id)
    {
        try {
            self::$user = User::find($id);
            self::saveBasicInfo(self::$user, $request);
            self::$user->save();
        } catch (ModelNotFoundException $e) {
            return view('error');
        }
    }

    private static function saveBasicInfo($user, $request)
    {
        self::$user->name                   = $request->name;
        self::$user->email                   = $request->email;
        self::$user->role                   = $request->role;
        self::$user->officer_id             = $request->officer_id;
        self::$user->number                 = $request->number;
        self::$user->address                = $request->address;
        self::$user->department_id          = $request->department_id;
        self::$user->designation_id         = $request->designation_id;
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
