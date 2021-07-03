<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Kegiatan</h1>
        </div>

        <div class="col-md-4">

            <h2><b>Status Pengajuan Kegiatan</b></h2>
            <hr />

            <?php foreach ($komentar as $k) : ?>
                <div class="">
                    <span class="input-group-text" id="addon-wrapping"><?= $k['user'] ?></span>
                    <p class="form-control text-break" aria-describedby="addon-wrapping"> <?= $k['komentar'] ?></p>
                </div>
                <hr />
            <?php endforeach; ?>

            <form action="<?= base_url('Detail/input') ?>" method="POST">
                <div class="input-group flex-nowrap">
                    <input type="hidden" value="<?= $user['id'] ?>" name="user">
                    <span class="input-group-text" id="addon-wrapping"><?= $user['nama'] ?></span>
                    <input type="text" class="form-control" name="komentar" aria-describedby="addon-wrapping">
                    <button class="btn btn-success justify-content-end">Submit</button>
                </div>
            </form>

            <?php if ($user['role'] == 1) { ?>
            <hr/>
                <a href="<?=base_url()?>" class="btn btn-success form-control" onclick="return confirm('Approve Kegiatan?')">Approve</a>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>