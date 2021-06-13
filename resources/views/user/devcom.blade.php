@extends('layouts.dashboardtemplate')

@section('isidashboard')
    <div class="row my-5">
        <div class="col-lg-4">
            <form method="POST" action="/submitdevcom" enctype="multipart/form-data">
                @csrf                
                <div class="form-group">
                    <label for="devcom_cat">Kategori</label>
                    <select name="kat" class="form-control" id="kat" required>
                        <option disabled selected>Select</option>  
                        <option value="1">MAHASISWA</option>
                        <option value="2">PELAJAR</option>                      
                    </select>
                </div>
                <div class="form-group">
                    <label for="cabang">Cabang Lomba</label>
                    <select name="cabang" class="form-control" id="cabang" required>
                        <option disabled selected>Select</option>  
                        <option value="1">GAME DEVELOPMENT</option>
                        <option value="2">APP DEVELOPMENT</option>
                        <option value="3">IOT</option>                                            
                    </select>
                    <small>* Cabang IOT hanya tersedia untuk Mahasiswa</small>
                </div>
                <div class="form-group">                  
                  <input name="sekolah" oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="sekolah" placeholder="Asal Sekolah/Perguruan Tiggi" required>                  
                </div>
                <div class="form-group">                  
                    <input name="alamat" oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="alamat" placeholder="Asal Alamat" required>                  
                </div>
                <div class="form-group">                  
                    <input name="kota" oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="alamat" placeholder="Asal Kota" required>                  
                </div>
                <div class="form-group">                  
                    <input name="nama_tim"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" id="alamat" placeholder="Nama Tim" required>                  
                </div>
                <div class="form-group">                  
                    <input name="nama_pembimbing"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nama Pembimbing" required>
                    <small>* Apabila tidak ada dapat diisi dengan -</small>                  
                </div>
                <div class="form-group">                  
                    <input name="hp_pembimbing"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nomor Hp Pembimbing" required onkeypress="return isNumberKey(event)">
                    <small>* Apabila tidak ada dapat diisi dengan 0</small>                  
                </div>
                <div class="form-group">                  
                    <input name="wa_pembimbing"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nomor Whatsapp Pembimbing" required onkeypress="return isNumberKey(event)">
                    <small>* Apabila tidak ada dapat diisi dengan 0</small>                  
                </div>
                <div class="form-group">                  
                    <input name="nama_ketua"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nama Ketua" required>                    
                </div> 
                <div class="form-group">                  
                    <input name="hp_ketua"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nomor Hp Ketua" required onkeypress="return isNumberKey(event)">                    
                </div>
                <div class="form-group">                  
                    <input name="wa_ketua"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nomor Whatsapp Ketua" required onkeypress="return isNumberKey(event)">                    
                </div>
                <div class="form-group">                  
                    <input name="line_ketua"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="ID Line Ketua" required>                    
                </div>
                <div class="form-group">                  
                    <input name="nama_anggota1"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nama Anggota 1" required>                    
                </div>
                <div class="form-group">                  
                    <input name="nama_anggota2"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" class="form-control" placeholder="Nama Anggota 2" required>                    
                </div>                
                <br>
                <label for="scan_ktpketua">Scan KTP Ketua</label>
                <input type="file" class="form-control-file" id="scan_ktpketua"
                name="scan_ktpketua" accept=".jpg, .jpeg, .png">
                <small class="form-text text-muted">
                    * Jika tidak ada dapat menggunakan surat keterangan kepala sekolah Atau halaman biodata pada rapor
                </small>
                <br>
                <label for="scan_ktpanggota1">Scan KTP Anggota 1</label>
                <input type="file" class="form-control-file" id="scan_ktpanggota1"
                name="scan_ktpanggota1" accept=".jpg, .jpeg, .png">
                <small class="form-text text-muted">
                    * Jika tidak ada dapat menggunakan surat keterangan kepala sekolah Atau halaman biodata pada rapor
                </small>
                <br>
                <label for="scan_ktpanggota2">Scan KTP Anggota 2</label>
                <input type="file" class="form-control-file" id="scan_ktpanggota2"
                name="scan_ktpanggota2" accept=".jpg, .jpeg, .png">
                <small class="form-text text-muted">
                    * Jika tidak ada dapat menggunakan surat keterangan kepala sekolah Atau halaman biodata pada rapor
                </small>
                <br>
                <div class="form-group">
                    <label for="asal_info">Dapat Info Mage Dari Mana?</label>
                    <select name="asal_info" class="form-control" id="asal_info" required>
                        <option disabled selected>Select</option>  
                        <option value="1">MEDIA SOSIAL</option>
                        <option value="2">GURU</option>
                        <option value="3">ROADSHOW</option>
                        <option value="4">OTHER</option>                                            
                    </select>
                </div>
                <div class="form-group">                  
                    <input name="info"
                    oninput="this.value = this.value.toUpperCase()"
                    type="text" id="info" class="form-control" placeholder="Asal Info" disabled>
                    <small>* Detail dari pilihan atas</small>                    
                </div>
                <div class="form-check">
                    <input class="form-check-input" required name="snk" type="checkbox" id="check">
                    <label class="form-check-label" for="check">SAYA MENYETUJUI SYARAT-SYARAT DAN KETENTUAN</label>                                                                
                </div>

                <!-- Confirm Modal-->
                <div class="modal fade" id="snkModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>SYARAT DAN KETENTUAN <br> MULTIMEDIA AND GAME 6</b></h5> 
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4><b>Dengan Mengisi Formulir Ini Saya Menyetujui :</b></h4>
                            <ol>
                                <li>Setiap data yang saya isi dalam formulir pendaftaran ini adalah benar dan sah</li>
                                <li>Identitas diri sesuai dengan kartu identitas yang dicantumkan </li>
                                <li>Gambaran umum dan poster yang kami cantumkan adalah karya original dan belum pernah diikutsertakan dalam lomba apapun (khusus peserta development competition) </li>
                                <li>Apabila dikemudian hari ditemukan bahwa dokumen yang telah kami berikan adalah tidak benar, maka kami bersedia dikenakan sanksi sesuai peraturan dan ketentuan yang berlaku </li>
                                <li>Formulir ini diisi tanpa adanya paksaan dari pihak manapun dan untuk digunakan sebagaimana mestinya </li>
                                <li>Kesalahan dalam pengisian biodata bukan tanggung jawab panitia </li>
                            </ol>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-primary" type="button" data-dismiss="modal" onclick="agree()" >Setuju</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Modal-->
                <div class="modal fade" id="submitModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>PASTIKAN DATA YANG KAMU ISI BENAR SEKALI LAGI !!!</b></h5> 
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body"> *NOTE<br> PANITIA TIDAK BERTANGGUNG JAWAB ATAS KESALAHAN DATA YANG DIISI PESERTA
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary my-3" onclick="showModal()">Submit</button>                
            </form>
        </div>
    </div>

<script>

</script>
@endsection