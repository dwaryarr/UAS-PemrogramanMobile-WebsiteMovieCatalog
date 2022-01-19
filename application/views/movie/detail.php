<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Movie
                </div>
                <img class="card-img-top" src="<?= $movie['gambar']; ?>" alt="Card image cap" width="150px" height="600px">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $movie['deskripsi']; ?></h6>
                    <p class="card-text"><?= $movie['tahun']; ?></p>
                    <p class="card-text"><?= $movie['genre']; ?></p>
                    <a href="<?= base_url(); ?>home" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?= "<img src='image/" . $movie['gambar'] . "'>" ?>