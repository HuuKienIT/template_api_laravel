<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    private function createRolePermission(Role $role, $name, $description)
    {
        $permission = Permission::create(['name' => $name, 'description' => $description]);
        $role->permissions()->attach($permission->id);
        return $permission;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $superAdminRole = Role::create(['name' => 'Tài khoản quyền lực nhất']);
        $userRole = Role::create(['name' => 'Người dùng']);

        $arrayPermission = [
            'admin.users' => 'Quản lý người dùng',
            'admin.categories' => 'Quản lý danh mục',
            'admin.products' => 'Quản lý sản phẩm',
            'admin.orders' => 'Xử lý đơn hàng',
            'admin.roles' => 'Quản lý vai trò',
            'admin.dashboard' => 'Xem thống kê',

        ];
        foreach ($arrayPermission as $per => $description) {
            $this->createRolePermission($superAdminRole, $per, $description);

//            $perIndex = $this->createRolePermission($superAdminRole, $per . '.index');
//            $perStore = $this->createRolePermission($superAdminRole, $per . '.store');
//            $perShow = $this->createRolePermission($superAdminRole, $per . '.show');
//            $perUpdate = $this->createRolePermission($superAdminRole, $per . '.update');
//            $perDel = $this->createRolePermission($superAdminRole, $per . '.destroy');
        }
//        $this->createRolePermission($superAdminRole, 'admin.setting.index');
//        $this->createRolePermission($superAdminRole, 'admin.general-setting.update');
//        $this->createRolePermission($superAdminRole, 'admin.logo-setting.update');
//        $this->createRolePermission($superAdminRole, 'admin.dashboard.index');
//        $arrayUserPermission=['dashboard.index','order.index','order.show','cod.payment'];
//        foreach ($arrayUserPermission as $per){
//            $perObject=$this->createRolePermission($superAdminRole,'user.'.$per );
//            $userRole->permissions()->attach($perObject->id);
//        }
    }
}
