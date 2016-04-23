<?php
    if($this->session->userdata("akun") != "")
    {
?>

<div class="lay-container">
	<div class="container">
        <div class="wcontainer">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <font size="5pt">Form Laporan Jalan Rusak</font>
                </div>
            </div>
            <?=$this->session->flashdata('pesan')?>
            <div class="wbody">
                <form class="form-horizontal" style="text-align:right" method="post" action="<?php echo base_url();?>laporanbaru/do_upload" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="vertical-align:text-bottom">Nama Pelapor</p>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" id="namapelapor" value="<?php echo $this->session->userdata("nama");?>" name="<?php echo $this->session->userdata("nama");?>" maxlength="100" placeholder="Nama Pelapor" readonly="readonly" />
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <p>ID Pelapor</p>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" id="idpelapor" value="<?php echo $this->session->userdata("idakun");?>" name="<?php echo $this->session->userdata("idakun");?>" maxlength="10" placeholder="ID Pelapor" readonly="readonly"/>
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Judul Laporan</p>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" id="judul" name="judul" autocomplete="off" placeholder="Judul Laporan" />
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Keterangan Laporan</p>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="keterangan" name="ket" placeholder="Mohon isikan keterangan terkait laporan"></textarea>
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Alamat Kerusakan</p>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="alamatrusak" name="alamatrusak" placeholder="Mohon isikan alamat lengkap"></textarea>
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Kecamatan</p>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="kec">
                                  <option class="selected" id="0" value="NULL">- Silahkan Pilih -</option>
                                  <option id="1" value="Bogor Barat">Bogor Barat</option>
                                  <option id="2" value="Bogor Selatan">Bogor Selatan</option>
                                  <option id="3" value="Bogor Tengah">Bogor Tengah</option>
                                  <option id="4" value="Bogor Timur">Bogor Timur</option>
                                  <option id="5" value="Bogor Timur">Bogor Utara</option>
                                  <option id="6" value="Tanah Sareal">Tanah Sareal</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Foto</p>
                            </div>
                            <div class="col-md-6">
                                <input type="file" id="userfile" name="userfile">
                                <p align="left" style="margin-bottom:0" class="help-block">Masukkan foto kerusakan jalan (maksimal 2MB)</p>
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="form-group" align="left">
                        <div class="row">
                            <div class="col-md-4">
                                &nbsp;
                            </div>
                            <div class="col-md-6">
                            	<input type="submit" class="btn btn-primary" value="Lapor" />
                                <button type="reset" class="btn btn-default" >Batal</button>
                            </div>
                            <div class="col-md-2">
                                &nbsp;
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
            
            <p style="text-align:center" class="footer">Mari laporkan kerusakan jalan yang anda temukan dengan benar dan jelas untuk kebaikan bersama :)</p>
        </div>
	</div>
</div>

<?php
    }
    else
    {
        redirect("formlogin");
    }
?>