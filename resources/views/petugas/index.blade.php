<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengaduan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <!-- <a href="/pdf" class="btn btn-primary" target="_blank">CETAK PDF</a> -->

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">No. Pengaduan</th>
                                    <th scope="col">Nama Pengaduan</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Isi Laporan</th>
                                    <th scope="col">No. Telp</th>
                                    <th scope="col">Tanggal Pengaduan</th>
                                    <!-- <th scope="col">Gambar</th> -->
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($generate as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->nama }}</td>
                                    <td>{{ $post->nik }}</td>
                                    <td>{{ $post->isi_laporan }}</td>
                                    <td>{{ $post->no_telp }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <!-- <td>
                                    <img src="/data_file/{{$post->file}}" height="100px" width="100px">
                                    </td> -->
                                    <td>{{ $post->status }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="btn btn-md btn-danger mb-3 float-left">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>