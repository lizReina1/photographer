<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'organizador']);
        $role2 = Role::create(['name' => 'fotografo']);
        $role3 = Role::create(['name' => 'cliente']);
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
