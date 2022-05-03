<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title_pdf; ?></title>
	
	<style type="text/css">

		body{
			font-family: 'Arial', sans-serif;
		}

        .head{
            text-align: center;
        }

		.title-laporan{
			text-align: center;
			color: black;
		}

        .detail-title{
            border: 1px solid #E7E7E7;
            text-align: center;
            
        }

        .detail-list{
            border: 1px solid #E7E9E7;
            margin-top: 10px;
        }

        table{
            border-collapse: collapse;
            text-align: center;
        }

        th{
            padding: 10px 0px;
        }

        td{
            padding: 10px 0px;
        }

        th{
            background-color: #007BFF;
            color: #fff;
        }


	</style>
</head>
<body>
    <form>
        <input type="hidden" name="id" value="<?= $barang_msk->id ?>">   
    </form>
    
	<div class="head">
        <h3>Laporan Detail Transaksi Masuk</h3>
    </div>
	<hr style="border: 1px solid black;">

        <div class="detail-title">
            <h4>Detail Transaksi Masuk</h4>
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
        </div>

</body>
</html>