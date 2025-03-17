<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if ($request->user()->can('view-permission')) {
            $permissions = Permission::all();
            return response()->json($permissions, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->hasPermissionTo('create-permission')) {
            $request->validate(['name' => 'required|unique:permissions']);

            $permission = Permission::create(['name' => $request->name, 'guard_name' => 'web']);
            return response()->json($permission, 201);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        if ($request->user()->hasPermissionTo('view-permission')) {
            $permission = Permission::find($id);
            if (!$permission) {
                return response()->json(['message' => 'Permission not found'], 404);
            }
            return response()->json($permission, 200);
        }
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)    
    {
            if ($request->user()->hasPermissionTo('update-permission')) {
            $permission = Permission::find($id);
            if (!$permission) {
                return response()->json(['message' => 'Permission not found'], 404);
            }
            $permission->update($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        if ($request->user()->can('delete.permission')) {
            $permission = Permission::find($id);
    
            if (!$permission) {
                return response()->json(['message' => 'Permission not found'], 404);
            }
          
            $permission->delete();
    
            return response()->json(['message' => 'Permission deleted successfully'], 200);
        }
    
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
