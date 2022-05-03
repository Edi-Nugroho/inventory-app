            <div class="detail-page">
                <input type="hidden" name="id" value="<?= $barang_klr->id; ?>">
                <div class="detail-title">
                    <h6>Detail Transaksi Keluar</h6>
                </div>
                <div class="detail-list">
                    <table class="table-detail" width="100%">
                        <tbody>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah Keluar</th>
                            </tr>
                            <tr>
                                <td><?= $barang_klr->nama; ?></td>
                                <td><?= nice_date($barang_klr->tgl_keluar,'d-m-Y'); ?></td>
                                <td><?= $barang_klr->kuantitas; ?> <?= $barang_klr->nama_satuan; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h6>
                        Export :
                    </h6>
                    <a href="<?= site_url('barangkeluar/pdf/' . $barang_klr->id) ?>" target="_blank" class="btn btn-primary">PDF</a>
                    <a href="<?= site_url('barangkeluar'); ?>" class="btn btn-danger" style="float: right;">Kembali</a>
                </div>
            </div>