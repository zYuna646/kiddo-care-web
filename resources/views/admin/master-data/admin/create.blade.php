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
                                <option value="" disabled selected>Pilih Puskesmas</option>
                                @foreach ($puskesmas as $kab)
                                <option value="{{ $kab['id'] }}">{{ $kab->name }}</option>
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
                            <label class="control-label mb-1">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="..." value="{{ old('email') }}" />
                            @error('email')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="control-label mb-1">Nomor Handphone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="..." value="{{ old('phone') }}" />
                            @error('phone')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="control-label mb-1">Password</label>
                            <div class="shbtn-group">
                                <input type="password" name="new_password"
                                    class="form-control @error('new_password') is-invalid @enderror" placeholder="..."
                                    value="{{ old('new_password') }}" />
                                <span class="shbtn toggle-password" data-target="new_password">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                                @error('new_password')
                                    <small class="invalid-feedback">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="control-label mb-1">Confirm Password</label>
                            <div class="shbtn-group">
                                <input type="password" name="confirm_new_password"
                                    class="form-control @error('confirm_new_password') is-invalid @enderror" placeholder="..."
                                    value="{{ old('confirm_new_password') }}" />
                                <span class="shbtn toggle-password" data-target="confirm_new_password">
                                    <i class="ti ti-eye-off"></i>
                                </span>
                                @error('confirm_new_password')
                                    <small class="invalid-feedback">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
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
