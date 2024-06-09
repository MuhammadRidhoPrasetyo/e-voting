<x-layouts.app title="Detail Pemilihan">
    @push('after-style')
    @endpush
    <main id="main-container">
        <div class="content">
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Detail Pemilihan</h3>
                    <a href="{{ route('election.index') }}" class="btn btn-sm btn-warning me-1 justify-content-center"><i
                            class="fa fa-fw fa-arrow-left-long me-1"></i> Kembali</a>
                            <a href="{{ route('candidate.create', ['election_id' => $election->id]) }}" class="btn btn-sm btn-success mb-0">Tambah Kandidat</a>
                </div>
                <div class="block-content block-content-full">
                    <!-- Product -->
                    <div class="block block-rounded">
                        <div class="block-content">
                            <!-- Vitals -->
                            <div class="row items-push">
                                <div class="col-md-6">
                                    <!-- Images -->
                                    <!-- Magnific Popup (.js-gallery class is initialized in Helpers.jqMagnific()) -->
                                    <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                                    <div class="row g-sm js-gallery img-fluid-100">
                                        <div class="col-12 mb-3">
                                            <a class="img-link img-link-zoom-in img-lightbox"
                                                href="{{ Storage::url($election->cover) }}">
                                                <img class="img-fluid" src="{{ Storage::url($election->cover) }}"
                                                    alt="" @style([
                                                        'object-fit:cover'
                                                    ])>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- END Images -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Info -->
                                    <div class="d-flex justify-content-between align-items-center border-bottom my-3">
                                        <div>
                                            <div class="fs-5 fw-semibold text-success">{{ $election->title }}</div>
                                            <div class="fs-xs text-muted">
                                                {{ $election->start_time->isoFormat('D MMMM Y HH:mm') }} -
                                                {{ $election->end_time->isoFormat('D MMMM Y HH:mm') }}</div>
                                        </div>
                                        <div class="fs-sm fw-bold">
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-{{ $election->status == 'active' ? 'primary' : 'danger' }} text-white">{{ $election->status }}</span>
                                        </div>
                                    </div>

                                    <p>{{ $election->description }}</p>
                                    <!-- END Info -->
                                </div>
                            </div>
                            <!-- END Vitals -->

                            <!-- Author -->
                            <div class="block block-rounded block-bordered bg-light">
                                <div
                                    class="block-content block-content-full d-flex justify-content-center align-items-center">
                                    <!-- Products -->
                                    <div class="row items-push">
                                        @forelse ($election->candidates as $candidate)
                                        <div class="col-md-6 col-xl-4">
                                            <div class="block block-rounded h-100 mb-0">
                                                <div class="block-content p-1">
                                                    <div class="options-container">
                                                        <img class="img-fluid options-item"
                                                            src={{ Storage::url($candidate->foto) }} alt="">
                                                        <div class="options-overlay bg-black-75">
                                                            <div class="options-overlay-content">
                                                                <a class="btn btn-sm btn-alt-primary"
                                                                    href="be_pages_ecom_store_product.html">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-alt-warning"
                                                                    href="be_pages_ecom_store_product.html">
                                                                    <i class="far fa-pen-to-square"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-alt-danger"
                                                                    href="{{ route('candidate.destroy', $candidate) }}" data-confirm-delete="true">
                                                                    <i class="far fa-trash-can"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="block-content">
                                                    <div class="mb-1">
                                                        <h6 class="text-primary mb-0">{{ $candidate->name }}</h6>
                                                    </div>
                                                    <p class="fs-sm text-muted">{{ Str::limit($candidate->description, 50) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <div class="col-xl-12 col-md-12 mb-0">
                                                <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger text-white">Belum Ada Kandidat!</span>
                                            </div>
                                        @endforelse

                                    </div>

                                    <!-- END Products -->
                                </div>
                            </div>
                            <!-- END Author -->
                        </div>
                    </div>
                    <!-- END Product -->
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->
        </div>
    </main>
    @include('sweetalert::alert')
    @push('after-script')
    @endpush
</x-layouts.app>
