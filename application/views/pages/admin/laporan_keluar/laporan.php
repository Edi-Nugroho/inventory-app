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
        }

        th{
            padding: 10px 0px;
            text-align: left;
        }

        td{
            padding: 10px 0px;
            padding-left: 18px;

        }

        th{
            background-color: #007BFF;
            color: #fff;
            padding-left: 15px;
        }


	</style>
</head>
<body>    
	<div class="head">
        <h3>Laporan Transaksi Keluar</h3>
    </div>
	<hr style="border: 1px solid black;">

        <div class="detail-title">
            <h4>Data Transaksi Keluar</h4>
        </div>
        <div class="detail-list">
            <table class="table-detail" width="100%">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Keluar</th>
                        <th>Jumlah Keluar</th>
                    </tr>
                    <?php $i=1; ?>
                    <?php foreach($barang_klr as $b) {?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $b->nama; ?></td>
                        <td style="padding-left: 30px;"><?= nice_date($b->tgl_keluar,'d-m-Y'); ?></td>
                        <td><?= $b->kuantitas; ?> <?= $b->nama_satuan; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>

</body>
</html>