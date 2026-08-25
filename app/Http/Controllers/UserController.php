<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();

        return view('users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::whereIn('name', [
            'Student',
            'Instructor'
        ])->get();

        return view('users.create', compact('roles'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Student,Instructor',
        ]);

        $role = $validated['role'];

        unset($validated['role']);

        $user = $this->userRepository->create($validated);

        $user->assignRole($role);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return view('users.show', compact('user'));
    }

     public function edit($id)
    {
        $user = $this->userRepository->find($id);

        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],

            'role' => 'required|exists:roles,name',
        ]);

        // Get selected role
        $role = $validated['role'];

        // Remove role from data before updating users table
        unset($validated['role']);

        // Update user
        $user = $this->userRepository->update($id, $validated);

        // Update user's role
        $user->syncRoles([$role]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }



    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
