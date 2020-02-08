<?php

namespace Template\Domain\Users\Observers;

use Illuminate\Support\Str;
use Template\Domain\Users\Models\Role;

class RoleObserver
{
    /**
     * Listen to Role creating event.
     *
     * @param Role $role
     */
    public function creating(Role $role)
    {
        //generate role slug
        $prefix = $role->parent ? $role->parent->name . ' ' : '';
        $role->slug = Str::slug($prefix . $role->name);

        //make children role usable
        $role->usable = $role->parent ? true : false;
    }
}