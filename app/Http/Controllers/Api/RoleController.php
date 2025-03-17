<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->user()->hasPermissionTo('view.role')) {
            $roles = Role::all();
            return response()->json($roles, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()) {
            $request->validate(['name' => 'required|unique:roles']);
            $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
            $role->syncPermissions($request->permissions);
            return response()->json($role, 201);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($request->user()->hasPermissionTo('view.role')) {
            $role = Role::find($id);
            if (!$role) {
                return response()->json(['message' => 'Role not found'], 404);
            }
            return response()->json($role, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->user()->hasPermissionTo('update.role')) {
            $role = Role::find($id);
            if (!$role) {
                return response()->json(['message' => 'Role not found'], 404);
            }
            $role->update($request->all());
            $role->syncPermissions($request->permissions);
            return response()->json($role, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        if ($request->user()->hasPermissionTo('delete.role')) {
            $role = Role::find($id);
            if (!$role) {
                return response()->json(['message' => 'Role not found'], 404);
            }
            $role->delete();
            return response()->json(['message' => 'Role deleted successfully'], 200);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }
    public function assignRole(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        $validate = $request->validate([
            'role' => 'required|string'
        ]);
        $user->roles()->detach();
        $user->assignRole($validate['role']);

        return response()->json([
            'message' => 'Role assigned successfully'
        ], 200);
    }
}
