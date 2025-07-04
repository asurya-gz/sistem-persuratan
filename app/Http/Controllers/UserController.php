<?php

namespace App\Http\Controllers;

use App\Models\resident;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function account_request_view() 
    {
        $users = User::where('status', 'submitted')->paginate(5);
        $residents = resident::where('user_id', null)->get();

        return view ('pages.account-request.index', [
            'users' => $users,
            'residents' => $residents,
        ]);
    }

    public function account_approval(Request $request, $userId)
    {
        $request->validate([
            'for' => ['required', Rule::in(['approve', 'reject', 'activate', 'deactivate'])],
            'resident_id' => ['nullable', 'exists:users,id']
        ]);

        $for = $request->input('for');

        $user = User::findOrFail($userId);
        $user->status = ($for == 'approve' || $for == 'activate') ? 'approved' : 'rejected';
        $user->save();

        $residentId = $request->input('resident_id');

        if ($request->has('resident_id') && isset( $residentId )) {
            resident::where('id', $residentId )->update([
                'user_id' => $user->id,
            ]);
        }

        if ($for == 'activate') {
            return back()->with('success', 'Berhasil mengkatfikan akun');
        } elseif($for == 'deactivate') {
            return back()->with('success', 'Berhasil menonaktifkan akun');
        }

        return back()->with('success', $for == 'approve' ? 'Berhasil menyetujui akun' : 'Berhasil menolak akun');
    }

    public function account_list_view()
    {
        $users = User::where('role_id', 2)->where('status', '!=', 'submitted')->paginate(5);

        return view('pages.account-list.index',[
            'users' => $users,
        ]);
    }



    public function profile_view()
    {
        return view('pages.profile.index');
    }

    public function update_profile(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $user = User::findOrFail($userId);
        $user->name = $request->input('name');
        $user->save();

        return back()->with('success', 'Berhasil mengubah nama profil');
    }

    public function change_password_view()
    {
        return view('pages.profile.change-password');
    }

    public function change_password(Request $request, $userId)
    {
        $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|min:8',
        ]);

        $user = User::findOrFail($userId);

        $currentPasswordIsValid = Hash::check($request->input('old_password'), $user->password);

        if ($currentPasswordIsValid) {
        $user->password = $request->input('new_password');
        $user->save();

        return back()->with('success', 'Berhasil mengubah password');
    }

    return back()->with('error', 'Gagal mengubah password, password lama tidak valid');
    }

}
         