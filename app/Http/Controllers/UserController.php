<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // !!! REQUIRED for file deletion

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8',
            'birthdate' => 'nullable|date',
            'photo'     => 'nullable|image|max:2048', // 2MB Max
        ]);

        // 2. Handle File Upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Store the file and get the path (e.g., 'profile_photos/xyz.jpg')
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
        }

        // 3. Save to Database - Ensured $photoPath is passed here
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'status'    => 1, // Active by default
            'birthdate' => $request->birthdate,
            'photo'     => $photoPath, // !!! This line saves the path to DB
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // 1. Validation
        $request->validate([
            'name'      => 'required|string|max:255',
            // Ignore this user's email when checking for uniqueness
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|string|min:8',
            'birthdate' => 'nullable|date',
            'photo'     => 'nullable|image|max:2048', // 2MB Max
        ]);

        // 2. Handle File Upload (Delete old and replace with new)
        if ($request->hasFile('photo')) {
            
            // !!! EFFICIENT HANDLING: Delete the OLD photo if it exists
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            // Store the NEW photo
            $newPhotoPath = $request->file('photo')->store('profile_photos', 'public');
            
            // Update the user model with the new path
            $user->photo = $newPhotoPath;
        }

        // 3. Update standard fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;

        // Only update password if one was typed
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 4. Save Changes
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        // Optionally delete the photo when deleting the user too
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}