<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userPermissions = [
            [
                'description' => 'مشاهده لیست کاربران',
                'name' => User::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد کاربر',
                'name' => User::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش کاربر',
                'name' => User::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف کاربر',
                'name' => User::DESTROY_PERMISSION_KEY,
            ],
            [
                'description' => 'همگام سازی نقش های کاربر',
                'name' => User::SYNC_ROLES_PERMISSIONS_KEY,
            ],
            [
                'description' => "مشاهده کاربر",
                'name' => User::VIEW_PERMISSION_KEY,
            ]
        ];
        $this->storePermissions($userPermissions);
    }

    public function storePermissions(array $permissions)
    {
        foreach ($permissions as $permission){
            Permission::create($permission);
        }
    }
}
