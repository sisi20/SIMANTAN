<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List Kegiatan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<body>
  <section class="">
    <div class="container">
      <div class="col-md-6">
        <h3 class="fonts">List Kegiatan</h3>
      </div><br>
      <div class="col-md-6"><a href="<?= base_url(); ?>kegiatan/tambah" class="btn btn-success">Tambah Kegiatan</a></div><br>

      <table class="table is-narrow" id="tabeluser">
        <thead>
          <th scope="col">Nama Kegiatan</th>
          <th scope="col">Prioritas</th>
          <th scope="col">PIC</th>
          <th scope="col">Acara Mulai</th>
          <th scope="col">Akhir Acara</th>
          <th scope="col">Status Satgas</th>
          <th scope="col">Status KaSatGas</th>
          <th scope="col">Aksi</th>
        </thead>
        <tbody>
          <?php foreach ($kegiatan as $k) : ?>
            <tr>
              <td><?= $k['kegiatan'] ?></td>
              <td><?= $k['prioritas'] ?></td>
              <td><?= $k['penanggung_jawab'] ?></td>
              <td><?= $k['acara_mulai'] ?></td>
              <td><?= $k['acara_akhir'] ?></td>
              <td>
                <?php if ($k['satgas'] == "Dibatalkan") { ?>
                  <p class="btn btn-danger">Dibatalkan</p>
                <?php } else if ($k['satgas'] == "Menunggu") { ?>
                  <p class="btn btn-warning">Menunggu</p>
                <?php } else { ?>
                  <p class="btn btn-success"><?= $k['satgas'] ?></p>
                <?php } ?>
              </td>
              <td>
                <?php if ($k['kasatgas'] == "Dibatalkan") { ?>
                  <p class="btn btn-danger">Dibatalkan</p>
                <?php } else if ($k['kasatgas'] == "Menunggu") { ?>
                  <p class="btn btn-warning">Menunggu</p>
                <?php } else { ?>
                  <p class="btn btn-success"><?= $k['kasatgas'] ?></p>
                <?php } ?>
              </td>
              <td>
                <?php if (($k['satgas'] == "Dibatalkan")) { ?>

                <?php } else if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 5) || ($this->session->userdata('email') == $k['pengaju']) || ($this->session->userdata('email') == $k['penanggung_jawab'])) { ?>
                  <?php if ($this->session->userdata('email') == $k['pengaju']) { ?>
                    <?php if ($k['kasatgas'] == "Menunggu") { ?>
                      <a href="<?= base_url('kegiatan/edit/') . $k['id'] ?>" class="linkdetail"><i class="fas fa-edit"></i></a>
                      <br />
                      <a href="<?= base_url('kegiatan/batal/') . $k['id'] ?>" class="linkdetail" onclick="return confirm('Batalkan Kegiatan?')"><i class="fas fa-trash-alt"></i></a>
                      <br />
                    <?php } ?>
                  <?php } ?>
                  <a href="<?= base_url('detail/komentar/') . $k['id'] ?>" class="linkdetail "><i class="fas fa-info-circle"></i></a>
                  <?php if ($k['satgas'] != 'Menunggu' && $k['kasatgas'] != 'Menunggu') { ?>
                    <a href="<?= base_url('detail/cetak/') . $k['id'] ?>" class="linkdetail "><i class="fas fa-print"></i></a>
                  <?php } ?>
                <?php } ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tabeluser').DataTable();
  });
</script>

</html>