<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku — BookStore</title>
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
                    <a class="nav-link active" href="{{ route('buku.index') }}">
                        <i class="bi bi-grid me-1"></i>Katalog Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buku.create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Harga
                    </a>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('buku.create') }}">
                        <i class="bi bi-plus-circle me-1"></i>Buku
                    </a>
                    
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<div class="container py-4">

    {{-- Judul halaman + tombol tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0 fw-bold">Daftar Buku</h4>
        <a href="{{ route('buku.create') }}" class="btn btn-dark btn-sm">
            <i class="bi bi-plus-lg me-1"></i>Tambah Buku
        </a>
    </div>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width:50px">#</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tahun Terbit</th>
                        <th>Harga</th>
                        <th style="width:180px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($buku as $index => $item)
                        <tr>
                            <td>{{ $buku->firstItem() + $index }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->tahun_terbit }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="text-center">
                                {{-- Detail --}}
                                <a href="{{ route('buku.show', $item) }}"
                                   class="btn btn-sm btn-secondary" title="Detail">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                {{-- Edit --}}
                                <a href="{{ route('buku.edit', $item) }}"
                                   class="btn btn-sm btn-outline-dark" title="Edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                {{-- Hapus --}}
                                <form action="{{ route('buku.destroy', $item) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Belum ada data buku.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    @if($buku->lastPage() > 1)
        <nav class="mt-3 d-flex justify-content-end">
            <ul class="pagination pagination-sm mb-0">
                {{-- Prev --}}
                <li class="page-item {{ $buku->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $buku->previousPageUrl() ?? '#' }}">&laquo;</a>
                </li>
                {{-- Nomor halaman --}}
                @for($i = 1; $i <= $buku->lastPage(); $i++)
                    <li class="page-item {{ $buku->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $buku->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                {{-- Next --}}
                <li class="page-item {{ !$buku->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $buku->nextPageUrl() ?? '#' }}">&raquo;</a>
                </li>
            </ul>
        </nav>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
