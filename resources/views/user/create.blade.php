<x-layouts.app title="Tambah User">
    @push('after-style')
    <link rel="stylesheet" href={{ asset("js/plugins/select2/css/select2.min.css") }}>
    @endpush
    <main id="main-container">
        <div class="content">
            <!-- Labels on top -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Data Siswa</h3>
                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-warning me-1 justify-content-center"><i
                            class="fa fa-fw fa-arrow-left-long me-1"></i> Kembali</a>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-lg-12 space-y-5">
                            <!-- Form Labels on top - Default Style -->
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan Nama . . ." value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan Email . . ." value="{{ old('email') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="nis">NIS (Nomor Induk Siswa)</label>
                                    <input type="text" class="form-control" id="nis" name="nis"
                                        placeholder="Masukkan Nomor Induk Siswa . . ." value="{{ old('nis') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="nis">Roles</label>
                                    <select class="js-select2 form-select" id="example-select2"
                                        style="width: 100%;" data-placeholder="Choose one.." name="role_id">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-success"><i
                                            class="fa fa-fw fa-circle-plus me-1"></i></button>
                                </div>
                            </form>
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
    <script src={{ asset("js/plugins/select2/js/select2.full.min.js") }}></script>
    <script>One.helpersOnLoad(['jq-select2']);</script>
    @endpush
</x-layouts.app>
