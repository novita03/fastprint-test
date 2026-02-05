<?php ob_start(); ?>

<h1 class="title">Produk Bisa Dijual</h1>

<div class="buttons">
    <form class="mr-4" action="<?= site_url('import') ?>" method="post"
        onsubmit="return confirm('Import data produk dari API?')">
        <button type="submit" class="button is-warning">
            Import Produk dari API
        </button>
    </form>


    <a href="<?= site_url('products/create') ?>" class="button is-primary">
        + Tambah Produk
    </a>
</div>

<div class="table-container">
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th class="col-nama">Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td class="col-nama"><?= $p->nama_produk ?></td>
                    <td>Rp <?= number_format($p->harga) ?></td>
                    <td><?= $p->nama_kategori ?></td>
                    <td>
                        <span class="tag is-success">
                            <?= $p->nama_status ?>
                        </span>
                    </td>
                    <td>
                        <a class="button is-small is-info"
                            href="<?= site_url('products/edit/' . $p->id_produk) ?>">
                            Edit
                        </a>
                        <a class="button is-small is-danger"
                            href="<?= site_url('products/delete/' . $p->id_produk) ?>"
                            onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>
<?php $this->load->view('layouts/main', compact('content')); ?>