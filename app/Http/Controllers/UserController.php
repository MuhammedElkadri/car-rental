<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('car_rent.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('car_rent.pages.user.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('car_rent.pages.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('car_rent.pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
   $user->syncRoles($request->role);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
    
        // التحقق من أن المستخدم موجود
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'المستخدم غير موجود');
        }
    
        // حساب عدد المشرفين الحاليين
        $adminCount = User::role('admin')->count();
    
        // التحقق مما إذا كان المستخدم المراد حذفه هو مشرف
        if ($user->hasRole('admin') && $adminCount <= 1) {
            return redirect()->route('users.index')->with('error', 'لا يمكن حذف آخر مشرف متبقي');
        }
    
        // حذف المستخدم إذا لم يكن آخر مشرف
        $user->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }
}