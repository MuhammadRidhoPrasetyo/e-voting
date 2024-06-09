<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Http\Requests\StoreElectionRequest;
use App\Http\Requests\UpdateElectionRequest;
use Illuminate\Support\Facades\Storage;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::all();
        $title = 'Hapus Pemilihan!';
        $text = "Anda Yakin Ingin Menghapus?";
        confirmDelete($title, $text);
        return view('election.index', compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('election.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreElectionRequest $request)
    {
        $validated = $request->validated();
        $validated['cover'] = $request->file('cover')->store('assets/Covers', 'public');
        $election = Election::create($validated);

        return to_route('election.index')->with('toast_success', "Pemilihan {$election->title} Berhasil Ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Election $election)
    {
        $title = 'Hapus Kandidat!';
        $text = "Anda Yakin Ingin Menghapus?";
        confirmDelete($title, $text);
        return view('election.show', compact('election'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
    {
        // if (now()->greaterThanOrEqualTo($election->start_time)) {
        //     return back()->with('errors', 'Tidak Bisa Memperbarui Pemilihan Yang Sedang Dimulai Atau Sudah Berakhir!');
        // } else {
            return view('election.edit', compact('election'));
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElectionRequest $request, Election $election)
    {
        $validated = $request->validated();
        if($request->has('cover'))
        {
            Storage::delete($election->cover);
            $validated['cover'] = $request->file('cover')->store('assets/Covers', 'public');
        }
        $election->update($validated);
        return to_route('election.show', $election->id)->with('toast_success',"{$election->title} Berhasil Diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
    {
        if (now()->greaterThanOrEqualTo($election->start_time)) {
            return back()->with('errors', 'Tidak Bisa Menghapus Yang Sedang Dimulai Atau Sudah Berakhir!');
        } else {
            $election->delete();
            Storage::delete($election->cover);
            return back()->with('toast_success', "{$election->title} Berhasil Dihapus!");
        }
    }
}
