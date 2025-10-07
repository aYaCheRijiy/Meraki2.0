<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar', 'bio', 'location', 'website'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin(); // Только админы
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permissions' => 'array',
    ];

    // Отношения с ролями
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    // Проверка роли
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }

    // Проверка на супер-администратора
    public function isSuperAdmin()
    {
        return $this->hasRole('super_admin');
    }

    // Проверка на администратора (включая супер-админа)
    public function isAdmin()
    {
        return $this->hasRole('super_admin') || $this->hasRole('admin');
    }

    // Проверка иерархии (может ли управлять другим пользователем)
    public function canManageUser(User $user)
    {
        $currentUserLevel = $this->roles->max('hierarchy_level');
        $targetUserLevel = $user->roles->max('hierarchy_level');

        return $currentUserLevel > $targetUserLevel;
    }

    // Получить максимальный уровень иерархии
    public function getHierarchyLevel()
    {
        return $this->roles->max('hierarchy_level');
    }

    // Проверка разрешений
    public function hasPermission($permission)
    {
        if ($this->isSuperAdmin()) {
            return true;
        }

        foreach ($this->roles as $role) {
            $permissions = json_decode($role->permissions, true) ?? [];
            if (in_array('*', $permissions) || in_array($permission, $permissions)) {
                return true;
            }
        }

        return false;
    }



        //    временно
    public function getRoleInfo()
    {
        return [
            'email' => $this->email,
            'roles' => $this->roles->pluck('name')->toArray(),
            'isAdmin' => $this->isAdmin(),
            'isSuperAdmin' => $this->isSuperAdmin(),
            'hierarchy_level' => $this->getHierarchyLevel(),
        ];
    }
}
