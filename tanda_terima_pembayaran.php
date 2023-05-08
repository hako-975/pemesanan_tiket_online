<?php 
	function kodeTujuan($kode='')
	{
		// ambil 2 digit kode
		$kode = substr($kode, 0, 2);

		$tujuan = '';
		
		if ($kode == 'AB') {
			$tujuan = 'Jogja';			
		} else if ($kode == 'AD') {
			$tujuan = 'Solo';
		} else if ($kode == 'AA') {
			$tujuan = 'Kedu';
		} else if ($kode == 'AG') {
			$tujuan = 'Kediri';
		} else {
			$tujuan = 'Tujuan tidak tersedia';
		}

		return $tujuan;
	}
		
	function kodeNoPolisi($kode='')
	{
		// ambil 6 digit kode
		$noPolisi = substr($kode, 0, 6);
		return $noPolisi;
	}

	function kodeKelas($kode='')
	{
		// ambil 3 digit akhir kode
		$kode = substr($kode, 6, 3);
		$kelas = '';

		if ($kode == 'EXE') {
			$kelas = 'Eksekutif';
		} else if ($kode == 'BIS') {
			$kelas = 'Bisnis';
		} else if ($kode == 'EKO') {
			$kelas = 'Ekonomi';
		} else {
			$kelas = 'Kelas tidak tersedia';
		}

		return $kelas;	
	}

	function hargaTiket($tujuan='', $kelas='')
	{
		$hargaTiket = 0;
		
		if ($tujuan == 'Jogja' && $kelas == 'Eksekutif') {
			$hargaTiket = 450000;	
		} else if ($tujuan == 'Jogja' && $kelas == 'Bisnis') {
			$hargaTiket = 400000;
		} else if ($tujuan == 'Solo' && $kelas == 'Bisnis') {
			$hargaTiket = 375000;
		} else if ($tujuan == 'Kedu' && $kelas == 'Ekonomi') {
			$hargaTiket = 350000;
		} else if ($tujuan == 'Kediri' && $kelas == 'Eksekutif') {
			$hargaTiket = 500000;
		} else if ($tujuan == 'Kediri' && $kelas == 'Bisnis') {
			$hargaTiket = 450000;
		} else {
			$hargaTiket = 'Tiket tidak tersedia';
		}

		return $hargaTiket;
	}

	function totalHarga($hargaTiket, $jumlah, $pembayaran)
	{
		$totalHarga = 0;

		$totalHarga = $hargaTiket * $jumlah;

		if ($pembayaran == 'Transfer') {
			$diskon = ($totalHarga * 5) / 100;
			$totalHarga = $totalHarga - $diskon;
		} else if ($pembayaran == 'Kredit') {
			$charge = ($totalHarga * 2) / 100;
			$totalHarga = $totalHarga + $charge;
		}

		return $totalHarga;
	}

	if (isset($_POST['btnKirim'])) {
		$nama = $_POST['nama'];
		$kode = $_POST['kode'];
		$jumlah = $_POST['jumlah'];
		$waktu = $_POST['waktu'];
		$penjemputan = $_POST['penjemputan'];
		$pembayaran = $_POST['pembayaran'];

		$tujuan = kodeTujuan($kode);		
		$noPolisi = kodeNoPolisi($kode);		
		$kelas = kodeKelas($kode);
		$hargaTiket = hargaTiket($tujuan, $kelas);
		$totalHarga = totalHarga($hargaTiket, $jumlah, $pembayaran);
	} else {
		// jika tidak ada tombol yang dikirim
		header("Location: index.php");
		exit;
	}
?>

<html>
<head>
	<title>Tanda Terima Pembayaran</title>
	<style>
		td {
			font-size: 18px;
		}
	</style>
</head>
<body>
	<?php if (isset($_POST['btnKirim'])): ?>
		<div style="text-align: center;">
			<h1>TANDA TERIMA PEMBAYARAN</h1>
			<h2>Kasir: Andri Firman Saputra</h2>
		</div>
		<hr>
		<table cellpadding="10">
			<tr>
				<td>Nama</td>
				<td>: <?= $nama; ?></td>
				<td>Kode</td>
				<td>: <?= $kode; ?></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>: <?= $jumlah; ?> Orang</td>
				<td>Tujuan</td>
				<td>: <?= $tujuan; ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>: <?= $kelas; ?></td>
				<td>No. Polisi</td>
				<td>: <?= $noPolisi; ?></td>
			</tr>
			<tr>
				<td>Jenis Pembayaran</td>
				<td>: <?= $pembayaran; ?></td>
				<td>Harga Tiket/orang</td>
				<td>: <?= $hargaTiket; ?></td>
			</tr>
			<tr>
				<td>Total Bayar</td>
				<td>: <?= $totalHarga; ?></td>
				<td>Waktu Berangkat</td>
				<td>: <?= $waktu; ?></td>
			</tr>
			<tr>
				<td>Penjemputan</td>
				<td>: <?= $penjemputan; ?></td>
			</tr>
		</table>
		<hr>
	<?php endif ?>
</body>
</html>