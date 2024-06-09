<x-layouts.app title="Tambah Kandidat">
    @push('after-style')
        <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
    @endpush
    <main id="main-container">
        <div class="content">
            <!-- Labels on top -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Kandidat</h3>
                    <a href="{{ route('election.show', request()->election_id) }}"
                        class="btn btn-sm btn-warning me-1 justify-content-center"><i
                            class="fa fa-fw fa-arrow-left-long me-1"></i> Kembali</a>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-lg-12 space-y-5">
                            <!-- Form Labels on top - Default Style -->
                            <form action="{{ route('candidate.store', ['election_id' => request()->election_id]) }}" method="POST" enctype="multipart/form-data">
                                @method('post')
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label" for="name">Nama Kandidat</label>
                                    <input type="text"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        id="name" name="name" placeholder="ex: Nama Ketua dan Wakil Ketua"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="foto">Foto Kandidat</label>
                                    <input
                                        class="form-control @error('foto')
                                        is-invalid
                                    @enderror"
                                        type="file" id="foto" name="foto">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea
                                        class="js-maxlength form-control js-maxlength-enabled @error('description')
                                        is-invalid
                                    @enderror"
                                        id="description" name="description" rows="5" maxlength="100" placeholder="Masukkan Visi Misi dan lain lain"
                                        data-always-show="true">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-success"><i
                                            class="fa fa-fw fa-circle-plus me-1"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Labels on top -->
        </div>
    </main>
    @include('sweetalert::alert')
    @push('after-script')
        <script src={{ asset('js/plugins/flatpickr/flatpickr.min.js') }}></script>



        <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
        <script>
            One.helpersOnLoad(['js-flatpickr']);
        </script>
    @endpush
</x-layouts.app>
