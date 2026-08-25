<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display roles.
     */
    public function index()
    {
        $roles = Role::with('permissions')
            ->latest()
            ->paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store role.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        if ($request->has('permissions')) {

            $permissions = Permission::whereIn(
                'id',
                $request->permissions
            )->get();

            $role->syncPermissions($permissions);
        }

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display role.
     */
    public function show(Role $role)
    {
        $role->load('permissions');

        return view('roles.show', compact('role'));
    }

    /**
     * Show edit form.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();

        $role->load('permissions');

        return view(
            'roles.edit',
            compact('role', 'permissions')
        );
    }

    /**
     * Update role.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $permissions = Permission::whereIn(
            'id',
            $request->permissions ?? []
        )->get();

        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Delete role.
     */
    public function destroy(Role $role)
    {
        $role->syncPermissions([]);

        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role deleted successfully.');
    }
}
