<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $election = Election::find(request()->election_id);
        if (now()->greaterThanOrEqualTo($election->start_time)) {
            return back()->with('errors', 'Tidak Bisa Menambahkan Kandidat Saat Pemilihan Sedang Dimulai Atau Sudah Berakhir!');
        } else {
            return view('candidate.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $validated = $request->validated();
        $validated['foto'] = $request->file('foto')->store('assets/foto_kandidat', 'public');
        $candidate = Candidate::create($validated);

        return to_route('election.show', $validated['election_id'])->with('toast_success','Kandidat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        $election = Election::find($candidate->election_id);
        if (now()->greaterThanOrEqualTo($election->start_time)) {
            return back()->with('errors', 'Tidak Bisa Menghapus Kandidat Saat Pemilihan Sedang Dimulai Atau Sudah Berakhir!');
        } else {
            $candidate->delete();
            Storage::url($candidate->foto);
            return back()->with('toast_success','Kandidat Berhasil Dihapus!');
        }
    }
}
