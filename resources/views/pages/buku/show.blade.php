<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku — {{ $buku->judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">

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
                    <a class="nav-link" href="{{ route('buku.create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Buku
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">

    <nav aria-label="breadcrumb" class="mb-3 d-flex justify-content-between align-items-center">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('buku.index') }}" class="text-decoration-none">Daftar Buku</a>
            </li>
            <li class="breadcrumb-item active">Detail Buku</li>
        </ol>
        <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Informasi Detail Buku</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    @if($buku->cover)
                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul }}" class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex flex-column align-items-center justify-content-center rounded shadow-sm mx-auto" style="width: 100%; max-width: 250px; aspect-ratio: 3/4;">
                            <i class="bi bi-book display-1 mb-3"></i>
                            <span>Tidak ada cover</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h2 class="fw-bold mb-1">{{ $buku->judul }}</h2>
                    <p class="text-muted mb-3">Oleh <span class="fw-semibold text-dark">{{ $buku->penulis }}</span></p>

                    <div class="d-flex gap-2 mb-4">
                        <span class="badge bg-secondary rounded-pill px-3 py-2"><i class="bi bi-tag-fill me-1"></i>{{ $buku->kategori }}</span>
                        @if($buku->stok > 0)
                            <span class="badge bg-success rounded-pill px-3 py-2"><i class="bi bi-check-circle-fill me-1"></i>Stok: {{ $buku->stok }}</span>
                        @else
                            <span class="badge bg-danger rounded-pill px-3 py-2"><i class="bi bi-x-circle-fill me-1"></i>Stok Habis</span>
                        @endif
                    </div>

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 150px;" class="text-muted">Harga</th>
                                <td class="fs-4 fw-bold text-dark">Rp {{ number_format($buku->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Penerbit</th>
                                <td>{{ $buku->penerbit }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Tahun Terbit</th>
                                <td>{{ $buku->tahun_terbit }}</td>
                            </tr>
                            @if($buku->deskripsi)
                            <tr>
                                <th class="text-muted align-top">Deskripsi</th>
                                <td>{{ $buku->deskripsi }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th class="text-muted">Ditambahkan</th>
                                <td>{{ $buku->created_at->format('d M Y, H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>
                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('buku.edit', $buku) }}" class="btn btn-dark">
                            <i class="bi bi-pencil-square me-1"></i>Edit Data
                        </a>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash me-1"></i>Hapus Buku
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus buku <strong>{{ $buku->judul }}</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form action="{{ route('buku.destroy', $buku) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
