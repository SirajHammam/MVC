<?php

class Flasher {

    public function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan, // berhasil / tidak
            'aksi' => $aksi, // ditambahkan
            'tipe' => $tipe // warna dasar
        ];
    }

    public static function flash()
    {
        // untuk memunculkan deskripsi tapi hanya sekali
        if ( isset($_SESSION['flash']) ) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Data Mahasiswa <strong> ' . $_SESSION['flash']['pesan'] . ' </strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            unset( $_SESSION['flash'] );
        }
    }
} 