@extends('admin.layouts.app')

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <h4 class="fw-semibold mb-8">{{ $title ?? '' }}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('Puskesmas') }}" class="text-muted">{{ $title ?? '' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $subtitle ?? '' }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('admin.puskesmas.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h5 class="mb-3">{{ $subtitle }} Form</h5>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="control-label mb-1">Provinsi<span class="text-danger">*</span></label>
                            <select id="provinsiSelect" name="provinsi" class="form-select form-select-sm">
                                <option value="" disabled selected>Pilih Provinsi</option>
                                @foreach ($provinsi as $kab)
                                    <option value="{{ $kab['id'] }}" {{ $provinsi_id == $kab['id'] ? 'selected' : '' }}>{{ $kab['name'] }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="control-label mb-1">Kabupaten<span class="text-danger">*</span></label>
                            <select id="kabupatenSelect" name="kabupaten" class="form-select form-select-sm">
                                <option value="" disabled selected>Pilih Kabupaten</option>
                                @foreach ($kabupaten as $kab)
                                <option value="{{ $kab['id'] }}" {{ $kabupaten_id == $kab['id'] ? 'selected' : '' }}>{{ $kab['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Kecamatan<span class="text-danger">*</span></label>
                            <select id="kecamatanSelect" name="kecamatan" class="form-select form-select-sm">
                                <option value="" disabled selected>Pilih Kecamatan</option>
                                @foreach ($kecamatan as $kab)
                                <option value="{{ $kab['id'] }}">{{ $kab['name'] }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="mb-3">
                            <label class="control-label mb-1">Nama Puskesmas<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="..." value="{{ old('name') }}" />
                            @error('name')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="card-body border-top">
                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-device-floppy me-1 fs-4"></i>
                            Save
                        </div>
                    </button>
                    <button type="reset" class="btn btn-danger rounded-pill px-4 ms-2 text-white">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
   @push('scripts')
    <script>
        // Add this JavaScript to handle visibility of Kabupaten and Kecamatan dropdowns
        document.addEventListener('DOMContentLoaded', function () {
            const provinsiSelect = document.getElementById('provinsiSelect');
            const kabupatenSelect = document.getElementById('kabupatenSelect');
            const kecamatanSelect = document.getElementById('kecamatanSelect');

            provinsiSelect.addEventListener('change', function () {
                const provinsiId = this.value;

                // Check if provinsiId is not empty
                if (provinsiId) {
                    // You may want to redirect to the create route with the selected provinsi_id
                    window.location.href = `/puskesmas/add/${provinsiId}`;
                }

                // Update visibility of Kabupaten dropdown
                kabupatenSelect.style.display = provinsiId ? 'block' : 'none';

                // Update visibility of Kecamatan dropdown
                kecamatanSelect.style.display = 'none'; // Initially hide Kecamatan dropdown
            });

            kabupatenSelect.addEventListener('change', function () {
                const kabupatenId = this.value;

                // Retrieve the selected provinsiId from provinsiSelect
                const provinsiId = provinsiSelect.value;

                if (kabupatenId && provinsiId) {
                    // You may want to redirect to the create route with the selected provinsi_id and kabupaten_id
                    window.location.href = `/puskesmas/add/${provinsiId}/${kabupatenId}`;
                }

                // Update visibility of Kecamatan dropdown
                kecamatanSelect.style.display = kabupatenId ? 'block' : 'none';
            });
        });
    </script>
@endpush

@endsection
