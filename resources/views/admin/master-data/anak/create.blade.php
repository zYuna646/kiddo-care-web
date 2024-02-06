@extends('admin.layouts.app')

@push('styles')
    <style>
        .shbtn-group {
            position: relative;
            overflow: hidden;
        }

        .shbtn {
            cursor: pointer;
            position: absolute;
            right: 0;
            top: 0;
            transform: translate(-50%, 50%);
            background: transparent;
            padding: 0 5px;
            z-index: 99;
            border: none;
        }

        .shbtn i {
            font-size: 18px;
            color: #333;
        }
    </style>
@endpush

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
                        <a href="{{ route('Admin') }}" class="text-muted">{{ $title ?? '' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $subtitle ?? '' }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <form action="{{ route('admin.admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h5 class="mb-3">{{ $subtitle }} Form</h5>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="control-label mb-1">Puskesmas<span class="text-danger">*</span></label>
                            <select id="kecamatanSelect" name="puskesmas" class="form-select form-select-sm">
                                <option value="" disabled selected>Pilih Orang Tua</option>
                                @foreach ($masyarakat as $item)
                                    <option value="{{ $item->id }}">{{ $item->nkk }} - {{ $item->user->username }}</option>
                                @endforeach
                            </select>
                        </div>




                        <div class="mb-3">
                            <label class="control-label mb-1">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="..." value="{{ old('name') }}" />
                            @error('name')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Jenis Kelamin<span class="text-danger">*</span></label>
                            <select id="kecamatanSelect" name="jenis_kelamin" class="form-select form-select-sm">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Laki-Laki">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Nomor Induk Keluarga<span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                placeholder="..." value="{{ old('nik') }}" />
                            @error('nik')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                placeholder="..." value="{{ old('nik') }}" />
                            @error('nik')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="control-label mb-1">Berat Saat Lahir<span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                placeholder="..." value="{{ old('nik') }}" />
                            @error('nik')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Tinggi Saat Lahir<span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                placeholder="..." value="{{ old('nik') }}" />
                            @error('nik')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Anak Ke<span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                placeholder="..." value="{{ old('nik') }}" />
                            @error('nik')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Apakah Menyusui<span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                placeholder="..." value="{{ old('nik') }}" />
                            @error('nik')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Apakah Memiliki Buku Kia<span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                placeholder="..." value="{{ old('nik') }}" />
                            @error('nik')
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


@endsection

@push('scripts')

<script>
    $(document).ready(function() {
        $(".toggle-password").on('click', function(event) {
            event.preventDefault();
            var target = $(this).data("target");
            var input = $("input[name=" + target + "]");
            var icon = $(this).find("i");

            if (input.attr("type") === "text") {
                input.attr('type', 'password');
                icon.removeClass("ti-eye").addClass("ti-eye-off");
            } else if (input.attr("type") === "password") {
                input.attr('type', 'text');
                icon.removeClass("ti-eye-off").addClass("ti-eye");
            }
        });

        $('input[name="new_passwordd"], input[name="confirm_new_password"]').on('keyup', function() {
            var password = $('input[name="new_password"]').val();
            var confirmPassword = $('input[name="confirm_new_password"]').val();

            if (password === confirmPassword) {
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#submitBtn').prop('disabled', true);
            }
        });
    });
</script>
@endpush
