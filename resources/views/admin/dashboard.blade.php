<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="p-[100px]">
        <h1 class="font-mono text-3xl font-bold text-center">Welcome Admin</h1>
    </header>
    <x-nav-admin></x-nav-admin>
    <main class="flex flex-wrap items-center justify-around text-center">
        <section class="w-1/2 p-[100px] flex justify-center">
            <table class="border-[1px] border-black border-separate border-spacing-[20px]" id="myTable">
                <thead class="">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Link</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->link }}</td>
                            <td>{{ $row->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <section class="w-1/2 p-[100px] flex justify-center">
            <table class="border-[1px] border-black border-separate border-spacing-[20px]" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contact as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->comment }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <section class="w-1/2 p-[100px] flex justify-center">
            <table class="border-[1px] border-black border-separate border-spacing-[20px]">
                <thead>
                    <tr>
                        <th>Nama Sertifikat</th>
                        <th>Issued By</th>
                        <th>Issued At</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $certificate)
                        <tr>
                            <td>{{ $certificate->name }}</td>
                            <td>{{ $certificate->issued_by }}</td>
                            <td>{{ $certificate->issued_at }}</td>
                            <td>{{ $certificate->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <section class="w-1/2 p-[100px] flex justify-center">
            <table class="border-[1px] border-black border-separate border-spacing-[20px]" id="Table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skill as $row)
                        <tr>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    @vite('resources/js/app.js')
</body>

</html>
