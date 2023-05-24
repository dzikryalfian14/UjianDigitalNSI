<?php
$this->load->view('admin/head');
?>

<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <center>
                        <h4 class="box-title">Koreksi Ujian Essay</h4>
                    </center>
                </div>
                <form action="<?= base_url('koreksi_essay'); ?>" method="get" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Peserta Ujian</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" name="id" required="">
                                    <option selected="selected" disabled="">- Pilih Peserta Ujian -</option>
                                    <?php foreach ($peserta as $s) { ?>
                                        <option value="<?= $s->id_siswa; ?>"><?= $s->nama_siswa; ?></option>
                                    <?php } ?>
                                </select>
                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?php echo base_url('koreksi_peserta_essay'); ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>

                                <a href="<?= base_url(uri_string()); ?>" class="btn btn-default btn-flat"><span class="fa fa-refresh"></span> Refresh</a>
                                <button type="submit" class="btn btn-primary btn-flat" title="Filter Data Soal Ujian"><span class="fa fa-filter"></span> Filter</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">



                    </div>
                    <!-- /.box-footer -->
                </form>

            </div>


            <!-- Default box -->
            <div class="box box-success" style="overflow-x: scroll;">

                <div class="box-body">
                    <form action="<?php echo base_url('Koreksi_essay/simpan_nilai'); ?>" method="post">
                        <table id="data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Peserta</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $total_nilai = 0;
                                foreach ($jawaban_peserta_soal as $row) :
                                    
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->nama_siswa; ?></td>
                                        <td><?php echo $row->pertanyaan; ?></td>
                                        <td><?php echo $row->jawaban; ?></td>
                                        <td>
                                            <input type="number" name="nilai[<?php echo $row->id_jawaban_essay; ?>]" class="form-control" min="0" max="100" step="1" value="<?php echo $row->nilai; ?>">
                                        </td>
                                    </tr>
                                    <?php $total_nilai += $row->nilai; // Menambahkan nilai ke total nilai ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>

                           

                            </tfoot>
                        </table>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <!-- Tampilkan total nilai -->
                   
                    <div class="">
                        <p>Total nilai <?php echo $row  ->nama_siswa; ?>: <?php echo $total_nilai; ?></p>
                    </div>

                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </div>
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">
    $(function() {
        $('#data').dataTable();
        $('.select2').select2();
    });

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>