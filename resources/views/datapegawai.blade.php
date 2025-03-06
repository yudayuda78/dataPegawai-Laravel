<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai</title>

    <!-- jQuery (Wajib untuk DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">List Data Pegawai</h1>

        <!-- Tombol Tambah Data -->
        <div class="mb-4">
            <a href="{{ route('tambahdata') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                + Tambah Data Pegawai
            </a>
        </div>

        <!-- Tabel Data Pegawai -->
        <div class="overflow-x-auto">
            <table id="myTable" class="w-full border-collapse bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Position</th>
                        <th class="px-4 py-2 text-left">Kantor</th>
                        <th class="px-4 py-2 text-left">Umur</th>
                        <th class="px-4 py-2 text-left">Photo</th>
                        <th class="px-4 py-2 text-left">Document</th>
                        <th class="px-4 py-2 text-left">Start Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $p)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $p->nama }}</td>
                        <td class="px-4 py-2">{{ $p->position }}</td>
                        <td class="px-4 py-2">{{ $p->kantor }}</td>
                        <td class="px-4 py-2">{{ $p->umur }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ $p->photo }}" alt="Photo" class="w-12 h-12 rounded-full border">
                        </td>
                        <td class="px-4 py-2">{{ $p->document }}</td>
                        <td class="px-4 py-2">{{ $p->start_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

</body>
</html>
