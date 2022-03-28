<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>testing</title>
        
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="my-4">Data Yang Di Input : </h5>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td style="width:150px">Nama</td>
                                    <td>{{ $data->nama }}</td>
                                </tr>
                                
                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $data->nik }}</td>
                                </tr>
                                
                                <tr>
                                    <td>No Telepon</td>
                                    <td>{{ $data->no_telp }}</td>
                                </tr>
                                <tr>
                                    <td>Isi Laporan</td>
                                    <td>{{ $data->isi_laporan }}</td>
                                </tr>
                            </table>
                            
                            <a href="/create" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>