            <div class="detail-page">
                <input type="hidden" name="id" value="<?= $barang_msk->id; ?>">
                <div class="detail-title">
                    <h6>Detail Transaksi Masuk</h6>
                </div>
                <div class="detail-list">
                    <table class="table-detail" width="100%">
                        <tbody>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah Masuk</th>
                            </tr>
                            <tr>
                                <td><?= $barang_msk->nama; ?></td>
                                <td><?= $barang_msk->nama_supplier; ?></td>
                                <td><?= nice_date($barang_msk->tgl_masuk,'d-m-Y'); ?></td>
                                <td><?= $barang_msk->kuantitas; ?> <?= $barang_msk->nama_satuan; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h6>
                        Export :
                    </h6>
                    <a href="<?= site_url('barangmasuk/pdf/' . $barang_msk->id) ?>" target="_blank" class="btn btn-primary">PDF</a>
                    <a href="<?= site_url('barangmasuk'); ?>" class="btn btn-danger" style="float: right;">Kembali</a>
                </div>
            </div>