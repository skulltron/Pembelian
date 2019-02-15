<br><br>
<hr>
<h1>SURAT ORDER PEMBELIAN</h1>
<br>
<form>
    <div class="form-group">
        <label>Pilih Barang</label><br>
        <select>
            <option>Select</option>
            <option></option>
        </select>
    </div>
    <div class="form-group">
        <label>Nomor Pemesanan</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="NOMOR PEMESANAN OTOMATIS DI ISI OLEH PROGRAM"
            disabled>
    </div>
    <div class="form-group">
        <label>Tanggal Pesanan</label><br>
        <input type="date" id="exampleInputFile">
    </div>
    <div class="form-group">
        <label>Jenis Pemesanan</label><br>
        <label><input type="radio" name="optradio" checked> Biasa</label>
        <label><input type="radio" name="optradio" checked> Segera</label>
        <label><input type="radio" name="optradio" checked> Mendesak</label>
    </div>
    <div class="form-group">
        <label>Jumlah Pemesanan</label><br>
        <input type="number">
    </div>
    <div class="form-group">
        <label>Ukuran</label><br>
        <input type="text" class="form-control" id="exampleInputEmail1">
    </div>
    <div class="form-group">
        <label>Keterangan</label><br>
        <textarea rows="6" cols="50"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
</form>