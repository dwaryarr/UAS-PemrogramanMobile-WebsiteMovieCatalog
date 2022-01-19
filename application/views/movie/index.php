<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <?= $this->session->flashdata('flash'); ?>.

    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>movie/tambah" class="btn btn-primary">Tambah
                Data Movie</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data movie.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Movie List</h3>
            <?php if (empty($movie)) : ?>
                <div class="alert alert-danger" role="alert">
                    data movie tidak ditemukan.
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($movie as $mve) : ?>
                    <li class="list-group-item">
                        <?= $mve['nama']; ?>
                        <a href="<?= base_url(); ?>movie/hapus/<?= $mve['id']; ?>" class="badge badge-danger float-right tombol-hapus">Hapus</a>
                        <a href="<?= base_url(); ?>movie/ubah/<?= $mve['id']; ?>" class="badge badge-success float-right">Ubah</a>
                        <a href="<?= base_url(); ?>movie/detail/<?= $mve['id']; ?>" class="badge badge-primary float-right">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>