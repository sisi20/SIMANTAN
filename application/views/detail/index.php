<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Kegiatan</h1>
        </div>

        <div class="col-md-4">

            <h2><b>Status Pengajuan Kegiatan</b></h2>
            <hr />

            <?php foreach ($komentar as $k) : ?> <!--  Mengambil data komentar -->
             <?php $date = new DateTime($k['tanggal']); //?> <!-- Mengambil data waktu dari db berdasarkan kapan komentar dibuat -->
                <div class="">
                    <span class="input-group-text" id="addon-wrapping"><p class="col-md-6" style="text-align: left; margin: auto;"> <?= $k['user'] ?></p> <p class="col-md-6 " style="text-align: right; margin:auto"><?=$date->format('j-F-Y H:i');?></p></span>
                    <p class="form-control text-break" aria-describedby="addon-wrapping"> <?= $k['komentar'] ?></p>
                </div>
                <hr />
            <?php endforeach; ?>

            <form action="" method="POST">
                <div class="input-group flex-nowrap">
                    <input type="hidden" value="<?= $user['id'] ?>" name="user">
                    <input type="hidden" value="<?= $kegiatan['id'] ?>" name="kegiatan">
                    <span class="input-group-text" id="addon-wrapping"><?= $user['nama'] ?></span>
                    <input type="text" class="form-control" name="komentar" aria-describedby="addon-wrapping" value="<?=set_value('komentar')?>">
                    <button class="btn btn-success justify-content-end" <?php if($kegiatan['status']==1){ echo "disabled";}?>>Submit</button>
                    <input type="hidden" value="<?= date("Y-m-d h:i:s");?>" name="tanggal">
                </div>
                <?=form_error('komentar', '<small class="text-danger pl-3">','</small>')?>
            </form>

            <?php if ($user['role'] == 1) { ?>
            <hr/>
                <a href="<?=base_url('detail/approve/1')?>" class="btn btn-success form-control <?php if($kegiatan['status']==1){ echo "disabled";}?>" onclick="return confirm('Approve Kegiatan?')">Approve</a>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>