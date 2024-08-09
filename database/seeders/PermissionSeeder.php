<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

// Importing all models
use App\Models\Account;
use App\Models\AccountGallery;
use App\Models\AccountGun;
use App\Models\AccountOrder;
use App\Models\BuyAccount;
use App\Models\CP;
use App\Models\CPOrder;
use App\Models\Deposit;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\Gun;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Otp;
use App\Models\Payment;
use App\Models\Player;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Withdraw;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Account Permissions
            [
                'description' => 'مشاهده لیست حساب‌ها',
                'name' => Account::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد حساب',
                'name' => Account::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش حساب',
                'name' => Account::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف حساب',
                'name' => Account::DESTROY_PERMISSION_KEY,
            ],


            // AccountOrder Permissions
            [
                'description' => 'مشاهده لیست سفارش‌های حساب‌ها',
                'name' => AccountOrder::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش سفارش حساب',
                'name' => AccountOrder::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف سفارش حساب',
                'name' => AccountOrder::DESTROY_PERMISSION_KEY,
            ],

            // BuyAccount Permissions
            [
                'description' => 'مشاهده لیست خرید حساب‌ها',
                'name' => BuyAccount::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش خرید حساب',
                'name' => BuyAccount::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف خرید حساب',
                'name' => BuyAccount::DESTROY_PERMISSION_KEY,
            ],

            // CP Permissions
            [
                'description' => 'مشاهده لیست CP',
                'name' => CP::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد CP',
                'name' => CP::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش CP',
                'name' => CP::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف CP',
                'name' => CP::DESTROY_PERMISSION_KEY,
            ],

            // CPOrder Permissions
            [
                'description' => 'مشاهده لیست سفارش‌های CP',
                'name' => CPOrder::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش سفارش CP',
                'name' => CPOrder::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف سفارش CP',
                'name' => CPOrder::DESTROY_PERMISSION_KEY,
            ],

            // Deposit Permissions
            [
                'description' => 'مشاهده لیست سپرده‌ها',
                'name' => Deposit::VIEW_ANY_PERMISSION_KEY,
            ],


            // FAQ Permissions
            [
                'description' => 'مشاهده لیست سوالات متداول',
                'name' => FAQ::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد سوال متداول',
                'name' => FAQ::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش سوال متداول',
                'name' => FAQ::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف سوال متداول',
                'name' => FAQ::DESTROY_PERMISSION_KEY,
            ],

            // Gallery Permissions
            [
                'description' => 'مشاهده لیست گالری‌ها',
                'name' => Gallery::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد گالری',
                'name' => Gallery::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف گالری',
                'name' => Gallery::DESTROY_PERMISSION_KEY,
            ],

            // Gun Permissions
            [
                'description' => 'مشاهده لیست اسلحه‌ها',
                'name' => Gun::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد اسلحه',
                'name' => Gun::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش اسلحه',
                'name' => Gun::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف اسلحه',
                'name' => Gun::DESTROY_PERMISSION_KEY,
            ],

           
            // Player Permissions
            [
                'description' => 'مشاهده لیست بازیکنان',
                'name' => Player::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش بازیکن',
                'name' => Player::UPDATE_PERMISSION_KEY,
            ],

            // Room Permissions
            [
                'description' => 'مشاهده لیست اتاق‌ها',
                'name' => Room::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد اتاق',
                'name' => Room::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'ویرایش اتاق',
                'name' => Room::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف اتاق',
                'name' => Room::DESTROY_PERMISSION_KEY,
            ],



            // Ticket Permissions
            [
                'description' => 'مشاهده لیست تیکت‌ها',
                'name' => Ticket::VIEW_ANY_PERMISSION_KEY,
            ],
            [
                'description' => 'ایجاد تیکت',
                'name' => Ticket::CREATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف تیکت',
                'name' => Ticket::DESTROY_PERMISSION_KEY,
            ],

            // User Permissions
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
                'description' => 'تعیین نقش کاربر',
                'name' => User::SYNC_ROLES_PERMISSIONS_KEY,
            ],

            // Withdraw Permissions
            [
                'description' => 'مشاهده لیست برداشت‌ها',
                'name' => Withdraw::VIEW_ANY_PERMISSION_KEY,
            ],

            [
                'description' => 'ویرایش برداشت',
                'name' => Withdraw::UPDATE_PERMISSION_KEY,
            ],
            [
                'description' => 'حذف برداشت',
                'name' => Withdraw::DESTROY_PERMISSION_KEY,
            ]
        ];

        $this->storePermissions($permissions);
    }

    public function storePermissions(array $permissions)
    {
        foreach ($permissions as $permission){
            $permission['guard_name'] = 'web';
            Permission::create($permission);
        }
    }
}
