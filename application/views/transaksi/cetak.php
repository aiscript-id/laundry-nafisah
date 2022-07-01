<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstap -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- struk transaksi -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Struk Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <!-- nama, tgl_transaksi, paket_transaksi, jenis_paket, berat_jumlah, total_transaksi, nama_d, jumlah_d -->
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?=$transaksi->nama?></td>
                                </tr>
                                <tr>
                                    <td>Tgl Transaksi</td>
                                    <td>:</td>
                                    <td><?=$transaksi->tgl_transaksi?></td>
                                </tr>
                                <tr>
                                    <td>Paket Transaksi</td>
                                    <td>:</td>
                                    <td><?=$transaksi->paket_transaksi?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Paket</td>
                                    <td>:</td>
                                    <td><?=$transaksi->nama_d?></td>
                                </tr>
                                <tr>
                                    <td>Berat Jumlah</td>
                                    <td>:</td>
                                    <td><?=$transaksi->berat_jumlah?></td>
                                </tr>
                                <tr>
                                    <td>Total Transaksi</td>
                                    <td>:</td>
                                    <td><?=$transaksi->total_transaksi?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    window.print();
  </script>
    
</body>
</html>