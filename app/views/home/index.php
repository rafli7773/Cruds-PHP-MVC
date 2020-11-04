<nav>
    <div class="dropdown">
        <button>Home</button>
        <div class="projects">
            <button>Projects</button>
            <ul>
                <li><a href="#">React App</a></li>
                <li><a href="#">Angular App</a></li>
                <li><a href="#">Vue App</a></li>
                <li><a href="#">Amber App</a></li>
            </ul>
        </div>
        <div class="products">
            <button>Product</button>
            <ul>
                <li><a href="#">Chat App</a></li>
                <li><a href="#">E-commerce App</a></li>
                <li><a href="#">News App</a></li>
                <li><a href="#">SSG App</a></li>
            </ul>
        </div>
    </div>
</nav>



<main>
    <?php Flasher::flash(); ?>
    <div class="content">
        <header>
            <button class="trigger tambah">Tambah</button>
            <form action="" method="post">
                <input type="text" name="keyword" id="keyword" placeholder="cari.." autocomplete="off" value="<?= $_SESSION['cari']; ?>">
            </form>
        </header>
        <div class=" container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barang</th>
                        <th>Posisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php if (empty($data['barang'])) : ?>
                    <tbody>
                        <tr>
                            <td colspan="4">Data Masih Kosong / Tidak Di temukan</td>
                        </tr>
                    </tbody>
                <?php endif ?>
                <?php $i = 1 + $data['awalData'] ?>
                <?php foreach ($data['barang'] as $barang) : ?>
                    <tbody>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $barang['barang']; ?></td>
                            <td><?= $barang['posisi']; ?></td>
                            <td>
                                <a class="hapus" href="<?= BASEURL; ?>/home/hapus/<?= $barang['id']; ?>" onclick="return confirm('yakin')">Hapus</a>
                                <a class="edit trigger" href="<?= BASEURL; ?>/home/edit/<?= $barang['id']; ?>" data-id="<?= $barang['id']; ?>">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
            <div class="pagination">

                <!-- batas page -->
                <?php $jumlahLink = 3;
                ($data['halamanAktif'] > $jumlahLink ? $pageAwal =  $data['halamanAktif'] - $jumlahLink :
                    $pageAwal = 1);

                ($data['halamanAktif'] < ($data['jumlahHalaman'] - $jumlahLink) ? $pageAkhir = $data['halamanAktif'] + $jumlahLink :
                    $pageAkhir = $data['jumlahHalaman']);
                ?>

                <?php if ($data['halamanAktif'] > 1) : ?>
                    <a href="<?= $data['halamanAktif'] - 1; ?>">&laquo;</a>
                <?php endif ?>

                <?php for ($i = $pageAwal; $i <= $pageAkhir; $i++) : ?>
                    <?php if ($i == $data['halamanAktif']) : ?>
                        <a href="<?= $i; ?>" class="text-active"><?= $i; ?></a>
                    <?php else : ?>
                        <a href="<?= $i; ?>"><?= $i; ?></a>
                    <?php endif ?>
                <?php endfor ?>

                <?php if ($data['halamanAktif'] < $data['jumlahHalaman']) : ?>
                    <a href="<?= $data['halamanAktif'] + 1; ?>">&raquo;</a>
                <?php endif ?>


            </div>
        </div>
    </div>


    <!-- modal -->
    <div class="modal">
        <div class="modal-content">
            <div class="close">
                <span class="modal-close">&times;</span>
            </div>
            <h1>Forms Tambah Data</h1>
            <form class="form" action="<?= BASEURL; ?>/home/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <label for="barang">Barang</label>
                <input type="text" name="barang" id="barang">

                <label for="posisi">Posisi</label>
                <input type="text" name="posisi" id="posisi">

                <button class="submit">Tambah</button>
            </form>
        </div>
    </div>

</main>