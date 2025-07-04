<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use App\Notifications\ComplaintStatusChanged;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ComplaintController extends Controller
{
    public function index()
    {
        $residentId = Auth::user()->resident->id ?? null;
        $complaints = Complaint::when(Auth::user()->role_id == \App\Models\Role::ROLE_USER, function ($query) use ($residentId) { $query->where('resident_id', $residentId);
        })    
        ->paginate(5);

        return view('pages.complaint.index', compact(
            'complaints',
        ));
    }

    public function create()
    {
        $resident = Auth::user()->resident;
        if (!$resident) {
            return redirect('/complaint')->with('error', 'Akun anda belum terhubung dengan data penduduk');
        }

        return view('pages.complaint.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'content' => ['required', 'min:3', 'max:2000'],
            'photo_proof' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        $resident = Auth::user()->resident;

        if (!$resident) {
             return redirect('/complaint')->with('error', 'Akun ada belum terhubung dengan data penduduk');
        }

        $complaint = new Complaint();
        $complaint->resident_id = $resident->id;
        $complaint->title = $request->input('title');
        $complaint->content = $request->input('content');

        if($request->hasFile('photo_proof')) {
            $filePath = $request->file('photo_proof')->store('public/uploads');
            $complaint->photo_proof = $filePath;
        }

        $complaint->save();

        return redirect('/complaint')->with('success', 'Berhasil membuat pengaduan');
    }

    public function edit($id)
    {
        $resident = Auth::user()->resident;
        if (!$resident) {
            return redirect('/complaint')->with('error', 'Akun ada belum terhubung dengan data penduduk');
        }
        $complaint = Complaint::findOrFail($id);

        return view('pages.complaint.edit', compact('complaint'));
    }

    // UPDATE //
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'content' => ['required', 'min:3', 'max:2000'],
            'photo_proof' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        $resident = Auth::user()->resident;
        if (!$resident) {
            return redirect('/complaint')->with('error', 'Akun ada belum terhubung dengan data penduduk');
        }

        $complaint = Complaint::findOrFail($id);

        if ($complaint->status != 'new') {
             return redirect('/complaint')->with('error', "Gagal mengubah aduan, status anda saat ini adalah $complaint->status_label");
        }

        $complaint->resident_id = $resident->id;
        $complaint->title = $request->input('title');
        $complaint->content = $request->input('content');

        if($request->hasFile('photo_proof')) {
            if (isset($complaint->photo_proof)) {
                storage::delete($complaint->photo_proof);
            }

            $filePath = $request->file('photo_proof')->store('public/uploads');
            $complaint->photo_proof = $filePath;
        }

        $complaint->save();

        return redirect('/complaint')->with('success', 'Berhasil mengubah pengaduan');
    }

    // DELETE //
    public function delete($id)
    {
        $resident = Auth::user()->resident;
        if (!$resident) {
            return redirect('/complaint')->with('error', 'Akun ada belum terhubung dengan data penduduk');
        }
        $complaint = Complaint::findOrFail($id);

            if ($complaint->status != 'new') {
            return redirect('/complaint')->with('error', "Gagal menghapus aduan, status anda saat ini adalah $complaint->status_label");
        }

        $complaint->delete();

        return redirect('/complaint')->with('success', 'Berhasil menghapus pengaduan');
    }


    // UPDATE STATUS KHUSUS UNTUK ADMIN //
    public function update_status(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', Rule::in(['new', 'processing', 'completed'])],

        ]);

        $resident = Auth::user()->resident;
        if (Auth::user()->role_id == \App\Models\Role::ROLE_USER && !$resident) {
            return redirect('/complaint')->with('error', 'Akun ada belum terhubung dengan data penduduk');
        }

        $complaint = Complaint::findOrFail($id);
        $oldStatus = $complaint->status_label;
        $complaint->status = $request->input('status');
        $complaint->save();

        $newStatus = $complaint->status_label;

        User::where('id', $complaint->resident->user_id)
        ->firstOrFail()
        ->notify(new ComplaintStatusChanged($complaint, $oldStatus, $newStatus));

        return redirect('/complaint')->with('success', 'Berhasil mengubah status');
    }
}
