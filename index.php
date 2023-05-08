<html>
<head>
	<title>Pemesanan Tiket Online</title>
	<style>
		div {
			margin: 10px 0;
		}
	</style>
</head>
<body>
	<h2>Pemesanan Tiket Online</h2>
	<form method="post" action="tanda_terima_pembayaran.php">
		<div>
			<label for="nama">Nama:</label>
			<input type="text" name="nama" required>
		</div>
		<div>
			<label for="kode">Kode:</label>
			<select name="kode" id="kode">
				<option value="AB2341EXE">AB2341EXE</option>
				<option value="AD4321BIS">AD4321BIS</option>
				<option value="AA5432EKO">AA5432EKO</option>
				<option value="AB4325BIS">AB4325BIS</option>
				<option value="AG4532EXE">AG4532EXE</option>
				<option value="AG4321BIS">AG4321BIS</option>
			</select>
		</div>
		<div>
			<label for="jumlah">Jumlah:</label>
			<input type="text" name="jumlah" required> Orang
		</div>
		<div>
			<label for="waktu">Waktu:</label>
			<select name="waktu" id="waktu">
				<option value="15.00">15.00</option>
				<option value="17.00">17.00</option>
				<option value="19.00">19.00</option>
				<option value="21.00">21.00</option>
			</select>
		</div>
		<div>
			<label for="penjemputan">Penjemputan:</label>
			<select name="penjemputan" id="penjemputan">
				<option value="PO Lebak Bulus">PO Lebak Bulus</option>
				<option value="PO Kp.Rambutan">PO Kp.Rambutan</option>
				<option value="PO Pulo Gadung">PO Pulo Gadung</option>
			</select>
		</div>
		<div>
			<label for="pembayaran">Pembayaran:</label>
			<input type="radio" name="pembayaran" id="Transfer" value="Transfer">
			<label for="Transfer">Transfer</label>
			<input type="radio" name="pembayaran" id="Kredit" value="Kredit">
			<label for="Kredit">Kredit</label>
		</div>
		<button type="submit" name="btnKirim">Kirim</button>
	</form>
</body>
</html>