<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku — BookStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('buku.index') }}">
            <i class="bi bi-book-half me-2"></i>BookStore
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buku.index') }}">
                        <i class="bi bi-grid me-1"></i>Katalog Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('buku.create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Buku
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<div class="container py-4">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('buku.index') }}" class="text-decoration-none">Daftar Buku</a>
            </li>
            <li class="breadcrumb-item active">Tambah Buku</li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Buku Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold">Judul Buku <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                           id="judul" name="judul" value="{{ old('judul') }}"
                           placeholder="Masukkan judul buku">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Penulis & Penerbit --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="penulis" class="form-label fw-semibold">Penulis <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                               id="penulis" name="penulis" value="{{ old('penulis') }}"
                               placeholder="Nama penulis">
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="penerbit" class="form-label fw-semibold">Penerbit <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                               id="penerbit" name="penerbit" value="{{ old('penerbit') }}"
                               placeholder="Nama penerbit">
                        @error('penerbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Kategori & Tahun Terbit --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach(['Novel','Fiksi Ilmiah','Non-Fiksi','Biografi','Sejarah','Pendidikan','Teknologi','Agama','Anak-anak','Komik / Manga','Lainnya'] as $kat)
                                <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>
                                    {{ $kat }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tahun_terbit" class="form-label fw-semibold">Tahun Terbit <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror"
                               id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}"
                               placeholder="{{ date('Y') }}" min="1900" max="{{ date('Y') }}">
                        @error('tahun_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Harga & Stok --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga" class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                   id="harga" name="harga" value="{{ old('harga') }}"
                                   placeholder="0" min="0" step="500">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label fw-semibold">Stok <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror"
                               id="stok" name="stok" value="{{ old('stok', 0) }}" min="0">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                              id="deskripsi" name="deskripsi" rows="3"
                              placeholder="Sinopsis singkat buku...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Cover --}}
                <div class="mb-4">
                    <label for="cover" class="form-label fw-semibold">Cover Buku</label>
                    <input type="file" class="form-control @error('cover') is-invalid @enderror"
                           id="cover" name="cover" accept="image/*">
                    <div class="form-text">Format: JPG, PNG, WEBP. Maks. 2MB.</div>
                    @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-lg me-1"></i>Batal
                    </a>
                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
