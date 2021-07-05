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
                <th scope="col">Aksi</th>
            </thead>

            <tbody>
                <?php foreach ($kegiatan as $k) : ?>
                    <tr>
                        <td><?= $k['kegiatan'] ?></td>
                        <td><?= $k['prioritas'] ?></td>
                        <td><?= $k['penanggung_jawab'] ?></td>
                        <td><?= $k['waktu'] ?></td>
                        <td><?php if ($k['status'] == 1) {
                                echo 'Approved';
                            } else {
                                echo 'Menunggu';
                            } ?></td>
                        <td><a href="<?= base_url('detail/komentar/') . $k['id'] ?>">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="" method="post">
            <input type="submit" name="hello" value="Lihat User">
        </form>
        <article>
            <?php
            if (isset($_POST['hello'])) {
                echo "<script>alert('".$user->nama."')</script>";
            }
            ?>
        </article>
    </div>