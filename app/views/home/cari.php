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
                <td colspan="4">Data Masih Kosong / Tidak di temukan </td>
            </tr>
        </tbody>
    <?php endif ?>
    <?php $i = 1 ?>
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

    <!-- panah kiri -->
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

    <!-- panah kanan -->
    <?php if ($data['halamanAktif'] < $data['jumlahHalaman']) : ?>
        <a href="<?= $data['halamanAktif'] + 1; ?>">&raquo;</a>
    <?php endif ?>
</div>