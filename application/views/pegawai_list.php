<table class="table table-striped table-hover">
  <thead class="thead-inverse">
    <tr>      
      <th>Nama</th>
      <th>Gender</th>
      <th>Telp</th>
      <th>Kota</th>
      <th>Posisi</th>
      <th>Status</th>
      <th><a class="btn btn-sm btn-primary" href="<?php echo base_url('pegawai/add');?>"><i class="fa fa-cross"></i> +</a></th>
    </tr>
  </thead>
  <tbody id="isiTable">
  <?php if(count($pegawais)>0) {
      foreach ($pegawais as $key => $value) { ?>
        <tr>     
          <td><?php print_r($value['nama']) ?></td>
          <td><?php print_r($value['gender']) ?></td>
          <td><?php print_r($value['no_telp']) ?></td>
          <td><?php print_r($value['kota']) ?></td>
          <td><?php print_r($value['posisi']) ?></td>
          <td><?php if ($value['status']==1) echo 'Tetap'; else echo 'Out Sourcing'; ?></td>
          <td><a class="btn btn-sm btn-danger" href="<?php echo base_url('pegawai/del/'); echo $value['id_pegawai']; ?>">X</a>
          <a class="btn btn-sm btn-warning" href="<?php echo base_url('pegawai/upd/'); echo $value['id_pegawai']; ?>"><i class="fa fa-pencil"></i> Ubah</a>
          </td>
        </tr>
        <?php 
      }
    } ?>   
  </tbody>
</table>
