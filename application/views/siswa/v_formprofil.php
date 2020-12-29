
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Silahkan Isi Form DI Bawah Ini
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <?php foreach ($siswa as $value): ?>
    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url()?>siswa/simpan_psb">
    <section class="content" id="siswa">
          <div class="box box-primary">
              <div class="box-body">
              <div class="col-md-12">
                <h3 class="box-title text-primary">Profil Siswa</h3>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="">No Reg</label>
                  <input type="text" class="form-control" required="" name="no_reg"  value="<?php echo $this->session->userdata('no_reg')?>" readonly>
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="nm_siswa" value="<?= $value->nm_siswa ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-form-label">Jurusan </label>
                    <select name="jurusan" class="form-control" required="">
                      <option value="">--Pilih Jurusan--</option>
                      <?php 
                        foreach ($jurusan as $jrs){
                          if ($jrs->id_jurusan == $value->id_jurusan){
                            echo '<option value='.$jrs->id_jurusan.' selected>'.$jrs->nm_jurusan.'</option>';
                          }else{
                            echo '<option value='.$jrs->id_jurusan.'>'.$jrs->nm_jurusan.'</option>';
                          }

                        } 
                      ?>
                    </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <input type="radio" <?php if($value->jenkel == 'L'){ echo "checked";}?> name="jenkel" value="L" required="">Laki-laki
                  <input type="radio" <?php if($value->jenkel == 'P'){ echo "checked";}?> name="jenkel" value="P" required="">Perempuan
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tempat Lahir</label>
                  <input type="text" required="" name="tempat_lahir" class="form-control"  placeholder="Masukan Tempat Lahir" value="<?= $value->tempat_lahir ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input type="date" class="form-control" required="" name="tgl_lahir" value="<?= $value->tgl_lahir ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Agama</label>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" required="" name="agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam" <?php if($value->agama == "Islam"){ echo "selected"; } ?>>Islam</option>
                    <option value="Kristen" <?php if($value->agama == "Kristen"){ echo "selected"; } ?>>Kristen</option>
                    <option value="Khatolik" <?php if($value->agama == "Khatolik"){ echo "selected"; } ?>>Khatolik</option>
                    <option value="Hindu" <?php if($value->agama == "Hindu"){ echo "selected"; } ?>>Hindu</option>
                    <option value="Bundha" <?php if($value->agama == "Bundha"){ echo "selected"; } ?>>Bunda</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea class="form-control" rows="4" minlength="20" maxlength="100" placeholder="jl.xxxx km xx no xx rt xx rw xx kota/kab xx" required="" name="alamat_siswa"><?= $value->alamat_siswa ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Kode Pos</label>
                  <input type="text" class="form-control"  placeholder="Masukan Kode Pos" required="" name="kode_pos_siswa" value="<?= $value->kode_pos_siswa ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control"  placeholder="Masukan Email" required="" name="email_siswa" value="<?= $value->email_siswa ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">No HP/Tlp</label>
                  <input type="number" class="form-control"  placeholder="Masukan No HP" required="" name="hp_siswa" value="<?= $value->hp_siswa ?>">
                </div>
              </div>
            </div>
          </div>
    </section>
          <section class="content" id="ortu">
              <div class="box box-primary">
              <div class="box-body">
              <div class="col-md-12">
                <h3 class="box-title text-primary">Data Orang Tua/Wali</h3>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nama Ayah</label>
                  <input type="text" class="form-control" required="" name="nm_ayah" placeholder="Masukan Nama ayah" value="<?= $value->nm_ayah ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Pekerjaan </label>
                  <input value="<?= $value->pekerjaan_ayah ?>" type="text" class="form-control" required="" name="pekerjaan_ayah" placeholder="Masukan Pekerjaan ayah">
                </div>
              </div>  
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Pendidikan Terakhir</label>
                  <select name="pendidikan_ayah" required="" class="form-control">
                    <option value="" >-- Pilih Pendidikan --</option>
                    <option value="SD" <?php if($value->pendidikan_ayah == "SD"){ echo "selected"; } ?>>SD</option>
                    <option value="SMP" <?php if($value->pendidikan_ayah == "SMP"){ echo "selected"; } ?>>SMP</option>
                    <option value="SMA" <?php if($value->pendidikan_ayah == "SMA"){ echo "selected"; } ?>>SMA</option>
                    <option value="SARJANA" <?php if($value->pendidikan_ayah == "SARJANA"){ echo "selected"; } ?>>SARJANA</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nama Ibu</label>
                  <input value="<?= $value->nm_ibu ?>" type="text" class="form-control" required="" name="nm_ibu" placeholder="Masukan Nama Ibu">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Pekerjaan Ibu</label>
                  <input value="<?= $value->pekerjaan_ibu ?>" type="text" class="form-control" required="" name="pekerjaan_ibu" placeholder="pekerjaan ibu">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Pendidikan Terakhir</label>
                  <select name="pendidikan_ibu" required="" class="form-control">
                    <option value="" >-- Pilih Pendidikan --</option>
                    <option value="SD" <?php if($value->pendidikan_ibu == "SD"){ echo "selected"; } ?>>SD</option>
                    <option value="SMP" <?php if($value->pendidikan_ibu == "SMP"){ echo "selected"; } ?>>SMP</option>
                    <option value="SMA" <?php if($value->pendidikan_ibu == "SMA"){ echo "selected"; } ?>>SMA</option>
                    <option value="SARJANA" <?php if($value->pendidikan_ibu == "SARJANA"){ echo "selected"; } ?>>SARJANA</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Alamat Orang Tua</label>
                  <textarea class="form-control" rows="4" required="" minlength="25" maxlength="100" name="alamat_ortu"><?= $value->alamat_ortu ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Kode Pos</label>
                  <input value="<?= $value->kode_pos_ortu ?>" type="text" class="form-control" required="" name="kode_pos_ortu" placeholder="Masukan Kode Pos">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">No HP/Tlp</label>
                  <input value="<?= $value->hp_ortu ?>" type="number" class="form-control" required="" name="hp_ortu" placeholder="Masukan No HP">
                </div>
              </div>
            </div>
          </div>
          </section>
          <section class="content" id="akademik">
              <div class="box box-primary">
              <div class="box-body">
              <div class="col-md-12">
                <h3 class="box-title text-primary">Data Potensi Akademik</h3>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Rata-rata Ranking Kelas</label>
                  <select name="rat_rangking" required="" class="form-control">
                    <option value="" >-- Rata-trata Nilai --</option>
                    <option value="1-5" <?php if($value->rat_rangking == "1-5"){ echo "selected"; } ?>>1-5</option>
                    <option value="6-10" <?php if($value->rat_rangking == "6-10"){ echo "selected"; } ?>>6-10</option>
                    <option value="11-20" <?php if($value->rat_rangking == "11-20"){ echo "selected"; } ?>>11-20</option>
                    <option value=">20" <?php if($value->rat_rangking == ">20"){ echo "selected"; } ?>>>20</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Rata-rata Nilai Ijazah </label>
                  <input value="<?= $value->rat_nilai_ijazah ?>" type="number" class="form-control" required="" name="rat_nilai_ijazah" placeholder="Masukan Rata-rata Nilai">
                </div>
              </div>  
              <div class="col-md-10">
                <div class="form-group">
                  <label for="">Pernah Mendapat Beasiswa Dari</label>
                  <input value="<?= $value->beasiswa ?>" type="text" class="form-control" name="beasiswa" placeholder="Masukan Nama Beasiswa">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="">Tahun</label>
                  <input value="<?= $value->beasiswa_thn ?>" type="number" class="form-control" name="beasiswa_thn" placeholder="Tahun">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Bidang Yang Diminati</label>
                  <input value="<?= $value->minat ?>" type="text" class="form-control" required="" name="minat" placeholder="Seni/Olaraga/Sains">
                </div>
              </div>
            </div>
          </div>
          </section>
          <section class="content" id="sekolah">
              <div class="box box-primary">
              <div class="box-body">
              <div class="col-md-12">
                <h3 class="box-title text-primary">Data Asal Sekolah</h3>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nama Sekolah Asal </label>
                  <input value="<?= $value->sekolah_asal ?>" type="text" class="form-control" required="" name="sekolah_asal" placeholder="Masukan Nama Sekolah Asal">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tahun Masuk SMP Sederajat </label>
                  <input value="<?= $value->thn_msk_sekolah_asal ?>" type="number" class="form-control" required="" name="thn_msk_sekolah_asal" placeholder="Masukan Tahun">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tahun Lulus SMP Sederajat </label>
                  <input value="<?= $value->thn_lulus_sekolah_asal ?>" type="number" class="form-control" required="" name="thn_lulus_sekolah_asal" placeholder="Masukan Tahun">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">No Ijazah</label>
                  <input type="text" class="form-control"  placeholder="Masukan No Ijazah" required="" name="no_ijazah" value="<?= $value->no_ijazah ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">No SKHUN</label>
                  <input type="text" class="form-control"  placeholder="Masukan No SKHUN" required="" name="no_skhun" value="<?= $value->no_skhun ?>">
                </div>
              </div>  
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Alamat Sekolah </label>
                  <textarea class="form-control" rows="4" required="" minlength="25" maxlength="100" name="alamat_sekolah_asal"><?= $value->alamat_sekolah_asal ?></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Informasi Didapat Dari</label>
                  <select name="dapat_informasi" required="" class="form-control">
                    <option value="" >-- Informasi Didapat Dari --</option>
                    <option value="Brosur" <?php if($value->rat_rangking == "Brosur"){ echo "selected"; } ?>>Brosur</option>
                    <option value="Pamplet" <?php if($value->rat_rangking == "Pamplet"){ echo "selected"; } ?>>Pamplet</option>
                    <option value="Spanduk" <?php if($value->rat_rangking == "Spanduk"){ echo "selected"; } ?>>Spanduk</option>
                    <option value="Radio" <?php if($value->rat_rangking == "Radio"){ echo "selected"; } ?>>Radio</option>
                    <option value="Sekolah Asal" <?php if($value->rat_rangking == "Sekolah Asal"){ echo "selected"; } ?>>Sekolah Asal</option>
                    <option value="Internet" <?php if($value->rat_rangking == "Internet"){ echo "selected"; } ?>>Internet</option>
                    <option value="Rekan" <?php if($value->rat_rangking == "Rekan"){ echo "selected"; } ?>>Rekan</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          </section>
          <section class="content" id="dokumen">
            <div class="box box-primary">
              <div class="box-body">
                <div class="col-md-12">
                <h3 class="box-title text-primary">Unggah Kelengkapan Dokument</h3>
              </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputFile">Foto Siswa</label>
                  <input type="hidden" name="foto_siswa_lama" value="<?= $value->foto_siswa ?>">
                  <input type="file" <?php if ($value->foto_siswa=="") {echo "required";} ?> name="foto_siswa">
                  <p class="help-block">Masukan foto Siswa</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputFile">Foto Kartu Keluarga</label>
                  <input type="hidden"  name="kk_lama" value="<?= $value->kk ?>">
                  <input type="file" <?php if ($value->kk=="") {echo "required";} ?> name="kk">
                  <p class="help-block">Masukan foto Kartu Keluarga</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputFile">Foto Ijazah</label>
                  <input type="hidden" name="ijazah_lama" value="<?= $value->ijazah ?>">
                  <input type="file" <?php if ($value->ijazah=="") {echo "required";} ?> name="ijazah">
                  <p class="help-block">Masukan foto Ijazah</p>
                </div>
              </div>
              </div>
            </div>
          </section>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form> 
        <?php endforeach ?>
      </div>
  </div>
  <!-- /.content-wrapper -->
  