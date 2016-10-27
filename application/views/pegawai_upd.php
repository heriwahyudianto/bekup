<div class="container">
<h2>Ubah Pegawai</h2>
<?php if (!empty(validation_errors())) { ?>
	<div class="alert alert-danger" role="alert">
	  <strong><?php echo validation_errors(); ?></strong>
	</div><?php 
} ?>
<?php echo form_open_multipart('pegawai/upd');
echo form_hidden('id_pegawai', $pegawai['id_pegawai']); ?>
<div class="form-group row">
  <label for="example-text-input" class="col-xs-2 col-form-label">Nama</label>
  <div class="col-xs-10"><?php 
  	echo form_input([
        'name'          => 'nama',
        'id'            => 'nama',
        'maxlength'     => '100',
        'size'          => '50',
        'class'			=> 'form-control',
        'type'			=> 'text',
        'autofocus'		=> 'autofocus',
        'value'			=> $pegawai['nama']
	]); ?>
  </div>
</div>
<fieldset class="form-group row">
	  <legend class="col-form-legend col-sm-2">Gender</legend>
	  <div class="col-sm-10">
	    <div class="form-check">
	      <label class="form-check-label"><?php 
	      	echo form_radio([
		        'name'          => 'kelamin',
		        'id'            => 'pria',
		        'value'         => '1',
		        'checked'       =>  ($pegawai['kelamin'] == 1) ? TRUE : FALSE,
		        'class'         => 'form-check-input'
			]); ?> Pria
	      </label>
	    </div>
	    <div class="form-check">
	      <label class="form-check-label">
	        <?php 
	      	echo form_radio([
		        'name'          => 'kelamin',
		        'id'            => 'wanita',
		        'value'         => '2',
		        'checked'       =>  ($pegawai['kelamin'] == 2) ? TRUE : FALSE,
		        'class'         => 'form-check-input'
			]); ?> Wanita
	      </label>
	    </div>
	  </div>
</fieldset>
<div class="form-group row">
  <label for="no_telp" class="col-xs-2 col-form-label">Telp</label>
  <div class="col-xs-10"><?php
    echo form_input([
        'name'          => 'no_telp',
        'id'            => 'no_telp',
        'maxlength'     => '100',
        'size'          => '50',
        'class'			=> 'form-control',
        'type'			=> 'tel',
        'placeholder'	=> '(+country) local - number',
        'value'			=> $pegawai['no_telp']
	]); ?>
  </div>
</div>
<div class="form-group row">
    <label for="kota" class="col-xs-2 col-form-label">Kota</label>
    <div class="col-xs-10"><?php 
    	if(count($kotas)>0){
    		foreach ($kotas as $value) {
    			$options[$value['id']]=$value['nama'];
    		}
    	}
		echo form_dropdown('kota', $options, $pegawai['kota'] , ['class' => 'form-control', 'id' => 'kota' ]);
	    ?>
  </div>
</div>
<div class="form-group row">
    <label for="posisi" class="col-xs-2 col-form-label">Posisi</label>
    <div class="col-xs-10"><?php 
		if(count($posisis)>0){
    		foreach ($posisis as $value) {
    			$options[$value['id_posisi']]=$value['nama'];
    		}
    	}
		echo form_dropdown('id_posisi', $options, $pegawai['id_posisi'] , ['class' => 'form-control', 'id' => 'posisi' ]);
	    ?>
  </div>
</div>
<div class="form-group row">
    <label for="status" class="col-xs-2 col-form-label">Status</label>
    <div class="col-xs-10"><?php 
		$options = [
		    '1'         => 'Tetap',
		    '0'           => 'Out Sourcing',
		];
		echo form_dropdown('status', $options, $pegawai['status'] , ['class' => 'form-control', 'id' => 'status' ]);
	    ?>
  </div>
</div><?php 
echo form_submit('simpan', 'Simpan', ['class' => 'btn btn-primary']);
echo form_close(); ?>
</div>