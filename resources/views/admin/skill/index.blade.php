<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Skill</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.csss">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>

    <style>
        h3 {
            width: 100%;
            text-align: center;
        }

        #create {
            width: 100%;
        }

        .show {
            display: flex;
            padding: 100px;
            flex-wrap: wrap;
        }

        #Table {
            width: 100%;
            display: table;
            justify-content: space-around
        }
    </style>
    <x-head_admin></x-head_admin>
    @vite('resources/css/app.css')
</head>

<body class="sb-nav-fixed">
    {{-- <x-navbar_admin></x-navbar_admin> --}}
    <x-nav-admin></x-nav-admin>
    <section class="show">
        <h3>Data Skill</h3>
        <a href="{{ route('skill.create') }}" class="btn btn-primary" id="create">Create</a>
        <table class="table mt-3" id="Table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skill as $row)
                    <tr>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->description }}</td>
                        <td>
                            <a href="{{ route('skill.show', $row) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('skill.edit', $row) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form id="delete-form-{{ $row->id }}" action="{{ route('skill.destroy', $row) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                    data-id="{{ $row->id }}">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <x-script_admin></x-script_admin>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                var skillId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + skillId).submit();
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#Table').DataTable({
                "paging": true // Mengaktifkan pagination
            });
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>
