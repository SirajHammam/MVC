<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-warning text-light " data-toggle="modal" data-target="#formModal">
                    Tambah Data Mahasiswa
            </button> 
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-6">
        <form action=" <?= BASEURL; ?>/mahasiswa/cari " method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Mahasiswa.." name="keyword" id="keyword" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-warning text-light" type="submit" id="tombolCari">Cari</button>
                </div>
            </div>
        </form>
        </div>
    </div> 

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>

            <?php foreach( $data['mhs'] as $mhs) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <?= $mhs['nama'] ?>
                        <a href="<?= BASEURL?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Apakah Anda Yakin ?');">Hapus</a> 
                        <a href="<?= BASEURL?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-secondary float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a> 
                        <a href="<?= BASEURL?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-warning text-light float-right ml-1">Detail</a> 
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action=" <?= BASEURL; ?>/mahasiswa/tambah " method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama Mahasiswa">
            </div>
            <div class="form-group">
                <label for="nim">Nomor Induk Mahasiswa</label>
                <input name="nim" type="number" class="form-control" id="nim" placeholder="Masukkan NIM Mahasiswa">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Industri Pertanian">Teknik Industri Pertanian</option>
                <option value="Agro Technology">Agro Technology</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning text-light">Add Data</button>
        </form>
      </div>
    </div>
  </div>
</div>