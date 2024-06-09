<x-layouts.app title="Perbarui Pemilihan">
    @push('after-style')
        <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
    @endpush
    <main id="main-container">
        <div class="content">
            <!-- Labels on top -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Perbarui Pemilihan</h3>
                    <a href="{{ route('election.index') }}" class="btn btn-sm btn-warning me-1 justify-content-center"><i
                            class="fa fa-fw fa-arrow-left-long me-1"></i> Kembali</a>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-lg-12 space-y-5">
                            <!-- Form Labels on top - Default Style -->
                            <form action="{{ route('election.update', $election) }}" method="POST" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label" for="title">Judul</label>
                                    <input type="text"
                                        class="form-control @error('title')
                                        is-invalid
                                    @enderror"
                                        id="title" name="title" placeholder="Masukkan Judul . . ."
                                        value="{{ $election->title }}" @readonly(now()->greaterThanOrEqualTo($election->start_time))>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="cover">Gambar Pemilihan</label>
                                    <input
                                        class="form-control @error('cover')
                                        is-invalid
                                    @enderror"
                                        type="file" id="cover" name="cover" @disabled(now()->greaterThanOrEqualTo($election->start_time))>
                                    @error('cover')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea
                                        class="js-maxlength form-control js-maxlength-enabled @error('description')
                                        is-invalid
                                    @enderror"
                                        id="description" name="description" rows="5" maxlength="100" placeholder="Masukkan Deskripsi Pemilihan . . ."
                                        data-always-show="true" @readonly(now()->greaterThanOrEqualTo($election->start_time))>{{ $election->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="example-flatpickr-default">Tanggal Mulai</label>
                                        <input type="datetime-local"
                                            class="js-flatpickr form-control js-flatpickr-enabled flatpickr-input active @error('start_time')
                                                is-invalid
                                            @enderror"
                                            name="start_time" placeholder="Y-m-d" value="{{ $election->start_time }}" @readonly(now()->greaterThanOrEqualTo($election->start_time))>
                                        @error('start_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="example-flatpickr-default">Tanggal
                                            Selesai</label>
                                        <input type="datetime-local"
                                            class="js-flatpickr form-control js-flatpickr-enabled flatpickr-input active @error('end_time')
                                                is-invalid
                                            @enderror"
                                            name="end_time" placeholder="Y-m-d" value="{{ $election->end_time }}" @readonly(now()->greaterThanOrEqualTo($election->start_time))>
                                        @error('end_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="example-flatpickr-default">Status Pemilihan</label>
                                    <div class="space-x-2">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input @error('status')
                                                is-invalid
                                            @enderror"
                                                type="radio" id="status" name="status" value="active" @checked($election->status == 'active')>
                                            <label class="form-check-label" for="status" >Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input @error('status')
                                                is-invalid
                                            @enderror"
                                                type="radio" id="status" name="status" value="inactive" @checked($election->status == 'inactive')>
                                            <label class="form-check-label" for="status" >Selesai</label>
                                        </div>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
