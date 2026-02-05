<?php ob_start(); ?>



<div class="columns is-centered">
    <div class="column is-10-tablet is-8-desktop">

        <h1 class="title"><?= isset($product) ? 'Edit Produk' : 'Tambah Produk' ?></h1>

        <form method="post" class="box">

            <div class="columns is-multiline">

                <!-- NAMA PRODUK -->
                <div class="column is-12-mobile is-6-tablet is-6-desktop">
                    <div class="field">
                        <label class="label">Nama Produk</label>
                        <div class="control">
                            <input class="input"
                                type="text"
                                name="nama_produk"
                                value="<?= set_value(
                                            'nama_produk',
                                            $product->nama_produk ?? ''
                                        ) ?>">
                        </div>
                        <div class="help is-danger"><?= form_error('nama_produk') ?></div>
                    </div>
                </div>

                <!-- HARGA -->
                <div class="column is-12-mobile is-6-tablet is-6-desktop">
                    <div class="field">
                        <label class="label">Harga</label>
                        <div class="control">
                            <input class="input"
                                type="text"
                                name="harga"
                                value="<?= set_value(
                                            'harga',
                                            $product->harga ?? ''
                                        ) ?>">
                        </div>
                        <div class="help is-danger"><?= form_error('harga') ?></div>
                    </div>
                </div>

                <!-- KATEGORI -->
                <div class="column is-12-mobile is-6-tablet is-6-desktop">
                    <div class="field">
                        <label class="label">Kategori</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="kategori_id" required>
                                    <option value="">-- pilih kategori --</option>
                                    <?php foreach ($categories as $c): ?>
                                        <option value="<?= $c->id_kategori ?>"
                                            <?= set_select(
                                                'kategori_id',
                                                $c->id_kategori,
                                                isset($product) && $product->kategori_id == $c->id_kategori
                                            ) ?>>
                                            <?= $c->nama_kategori ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STATUS -->
                <div class="column is-12-mobile is-6-tablet is-6-desktop">
                    <div class="field">
                        <label class="label">Status</label>
                        <div class="control">
                            <div class="select is-fullwidth">
                                <select name="status_id" required>
                                    <option value="">-- pilih status --</option>
                                    <?php foreach ($statuses as $s): ?>
                                        <option value="<?= $s->id_status ?>"
                                            <?= set_select(
                                                'status_id',
                                                $s->id_status,
                                                isset($product) && $product->status_id == $s->id_status
                                            ) ?>>
                                            <?= $s->nama_status ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="field is-grouped is-justify-content-flex-end mt-4">
                <div class="control">
                    <button class="button is-primary">
                        <?= isset($product) ? 'Update' : 'Simpan' ?>
                    </button>
                </div>
                <div class="control">
                    <a href="<?= site_url('products') ?>"
                        class="button is-light">
                        Batal
                    </a>
                </div>
            </div>

        </form>

    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php $this->load->view('layouts/main', compact('content')); ?>