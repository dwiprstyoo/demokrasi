<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengaduan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
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

                        <form enctype="multipart/form-data" action="{{ route('post.index') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama Pengadu</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" required>

                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="num" class="form-control @error('nik') is-invalid @enderror"
                                    name="nik" value="{{ old('nik') }}" required>

                                @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="num" class="form-control @error('no_telp') is-invalid @enderror"
                                    name="no_telp" value="{{ old('no_telp') }}" required>

                                @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="isi_laporan">Isi Laporan</label>
                                <textarea
                                    name="isi_laporan" id="isi_laporan"
                                    class="form-control @error('isi_laporan') is-invalid @enderror"
                                    rows="5"
                                    required>{{ old('isi_laporan') }}</textarea>

                                <!-- error message untuk content -->
                                @error('isi_laporan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- {{  csrf_field()  }}
                            <div class="form-group">
                                <label for="file">Gambar</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" value="{{ old('file') }}" required>
                            
                                <-- error message untuk title -->
                                <!-- @error('file')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> -->

                            <div>
                            <input type="hidden" class="form-control @error('status') is-invalid @enderror"
                                    name="status">

                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('post.index') }}" class="btn btn-md btn-secondary">back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('#alamat').summernote({
                height: 250, //set editable area's height
            });
        })
    </script> -->
</body>

</html>