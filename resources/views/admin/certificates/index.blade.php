<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sertifikat</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <x-nav-admin></x-nav-admin>
    <div class="container mt-5">
        <h1>Daftar Sertifikat</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('certificates.create') }}" class="mb-3 btn btn-primary">Tambah Sertifikat</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Sertifikat</th>
                    <th>Issued By</th>
                    <th>Issued At</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificates as $certificate)
                    <tr>
                        <td>{{ $certificate->name }}</td>
                        <td>{{ $certificate->issued_by }}</td>
                        <td>{{ $certificate->issued_at }}</td>
                        <td>{{ $certificate->description }}</td>
                        <td>
                            <a href="{{ route('certificates.edit', $certificate->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus sertifikat ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
