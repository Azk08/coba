<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sertifikat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Edit Sertifikat</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nama Sertifikat</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $certificate->name) }}" required>
        </div>

        <div class="form-group">
            <label for="issued_by">Issued By</label>
            <input type="text" name="issued_by" class="form-control" id="issued_by" value="{{ old('issued_by', $certificate->issued_by) }}" required>
        </div>

        <div class="form-group">
            <label for="issued_at">Issued At</label>
            <input type="text" name="issued_at" class="form-control" id="issued_at" value="{{ old('issued_at', $certificate->issued_at) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" id="description" rows="4" required>{{ old('description', $certificate->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="file">File Sertifikat (PDF)</label>
            <input type="file" name="file" class="form-control" id="file">
            @if($certificate->file)
                <p><strong>File saat ini:</strong> {{ $certificate->file }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Sertifikat</button>
    </form>
</div>

</body>
</html>
