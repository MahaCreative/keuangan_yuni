  <!-- Logout Modal-->
  <div class="modal fade" id="modalCetakPengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>
                      Silahkan memilih data yang ingin di cetak
                  </p>
                  <div class="flex">
                      <a href="export-pengeluaran.php" class="btn btn-success" id="btnSemuaLaporan" type="button">Semua
                          Laporan</a>
                      <button class="btn btn-primary" id="berdasarkanTahun_Pengeluaran" type="button">Berdasarkan
                          Tahun</button>
                      <button class="btn btn-warning" id="berdasarkanBulan_Pengeluaran" type="button">Berdasarkan
                          Bulan</button>
                  </div>
                  <!-- Form Bulan -->
                  <form name="form_bulan_Pengeluaran" action="export-pengeluaran-bulan.php" id="form_bulan_Pengeluaran"
                      method="get">
                      <div class="form-group">
                          <label>Dari tanggal</label>
                          <input type="date" name="dari_tanggal" class="form-control" value="">
                      </div>
                      <div class="form-group">
                          <label>Sampai Tanggal</label>
                          <input type="date" name="sampai_tanggal" class="form-control" value="">
                      </div>
                      <button class="btn btn-primary">Download</button>
                  </form>
                  <form name="form_tahun_Pengeluaran" onsubmit="return validateFormTahun()"
                      action="export-pengeluaran-tahun.php" id="form_tahun_Pengeluaran" method="get">
                      <div class="form-group">
                          <label>Cetak Tahun</label>
                          <input type="number" min="2010" max="2050" name="tahun" class="form-control" value="">
                      </div>
                      <button class="btn btn-primary">Download</button>
                  </form>
                  <!-- <div class="form-group">
                      <label>Jumlah</label>
                      <input type="date" name="bulan" class="form-control" value="">
                  </div> -->
              </div>

              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

              </div>
          </div>
      </div>
  </div>

  <script>
// Ambil elemen-elemen tombol dan form
var btnSemuaLaporan_Pengeluaran = document.getElementById('btnSemuaLaporan');
var berdasarkanTahun_Pengeluaran = document.getElementById('berdasarkanTahun_Pengeluaran');
var berdasarkanBulan_Pengeluaran = document.getElementById('berdasarkanBulan_Pengeluaran');
var formBulan_Pengeluaran = document.getElementById('form_bulan_Pengeluaran');
var formTahun_Pengeluaran = document.getElementById('form_tahun_Pengeluaran');
formBulan_Pengeluaran.style.display = 'none';
formTahun_Pengeluaran.style.display = 'none';
// Ketika tombol "Berdasarkan Tahun" diklik
berdasarkanTahun_Pengeluaran.addEventListener('click', function() {
    // Tampilkan form berdasarkan tahun dan sembunyikan form berdasarkan bulan
    formTahun_Pengeluaran.style.display = 'block';
    formBulan_Pengeluaran.style.display = 'none';
});

// Ketika tombol "Berdasarkan Bulan" diklik
berdasarkanBulan_Pengeluaran.addEventListener('click', function() {
    // Tampilkan form berdasarkan bulan dan sembunyikan form berdasarkan tahun
    formTahun_Pengeluaran.style.display = 'none';
    formBulan_Pengeluaran.style.display = 'block';
});

// Ketika tombol "Semua Laporan" diklik
btnSemuaLaporan_Pengeluaran.addEventListener('click', function() {
    // Sembunyikan kedua form
    formTahun_Pengeluaran.style.display = 'none';
    formBulan_Pengeluaran.style.display = 'none';
});

function validateFormTahun() {
    var tahun = document.forms["form_tahun_Pengeluaran"]["tahun"].value;

    if (tahun == "") {
        alert("Tahun tidak boleh kosong");
        return false;
    }
    // Konversi input tahun ke integer
    var tahunInt = parseInt(tahun);

    // Periksa apakah tahun di dalam rentang 2010 hingga 2050
    if (tahunInt < 2010 || tahunInt > 2050) {
        alert("Tahun harus berada dalam rentang 2010 hingga 2050");
        return false;
    }
}
  </script>