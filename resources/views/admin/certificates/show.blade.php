<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sertifikat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Detail Sertifikat</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $certificate->name }}</h5>
            <p class="card-text"><strong>Issued By:</strong> {{ $certificate->issued_by }}</p>
            <p class="card-text"><strong>Issued At:</strong> {{ $certificate->issued_at }}</p>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $certificate->description }}</p>
            <p class="card-text"><strong>File:</strong> <a href="{{ Storage::url($certificate->file) }}" target="_blank">Lihat File</a></p>
        </div>
    </div>

    <a href="{{ route('certificates.index') }}" class="mt-3 btn btn-secondary">Kembali ke Daftar Sertifikat</a>
</div>

</body>
</html>
