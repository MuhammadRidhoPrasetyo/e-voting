<x-layouts.app title="User List">
    @push('after-style')
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href={{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}>
        <link rel="stylesheet" href={{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}>
        <link rel="stylesheet" href={{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}>
    @endpush
    <main id="main-container">
        <div class="content">
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Daftar Siswa</h3>
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary me-1 justify-content-center"><i
                            class="fa fa-fw fa-plus me-1"></i> Tambah Siswa</a>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">ID</th>
                                <th>Nama</th>
                                <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">NIS</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Roles</th>
                                <th style="width: 15%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-center fs-sm">{{ $loop->iteration }}</td>
                                    <td class="fw-semibold fs-sm">{{ $user->name }}</td>
                                    <td class="d-none d-sm-table-cell fs-sm">
                                        {{ $user->email }}
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span
                                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{ $user->nis }}</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <span
                                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{ $user->roles->first()->name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                            <i class="far fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('user.destroy', $user) }}" class="btn btn-sm btn-danger"
                                            data-confirm-delete="true" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus">
                                            <i class="far fa-trash-can"></i>
                                        </a>

                                    </td>
                                    {{-- <td>
                                        <span class="text-muted fs-sm">6 days ago</span>
                                    </td> --}}
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
    </main>
    @include('sweetalert::alert')
    @push('after-script')
        <!-- Page JS Plugins -->
        <script src={{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}></script>
        <script src={{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}></script>
        <script src={{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}></script>

        <!-- Page JS Code -->
        <script src={{ asset('js/pages/be_tables_datatables.min.js') }}></script>
    @endpush
</x-layouts.app>
