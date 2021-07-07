<div class="container">
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url(); ?>kegiatan/tambah" class="btn btn-info mb-2">Tambah Mahasiswa</a></div>

        <table class="table table-stripped">
            <thead>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Prioritas</th>
                <th scope="col">PIC</th>
                <th scope="col">Waktu</th>
                <th scope="col">Status</th>
            </thead>

            <tbody>
                <tr>
                    <td><?= $kegiatan['kegiatan'] ?></td>
                    <td><?= $kegiatan['prioritas'] ?></td>
                    <td><?= $kegiatan['penanggung_jawab'] ?></td>
                    <td><?= $kegiatan['waktu'] ?></td>
                    <td><?php if ($kegiatan['status'] == 1) {
                            echo 'Approved';
                        } else {
                            echo 'Menunggu';
                        } ?></td>
                </tr>
            </tbody>
        </table>
    </div>