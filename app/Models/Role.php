<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

    /*
     *
     *
     * */
    public function administrators()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    /**
     * A role belongs to many permissions.
     *
     * @return
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

}
