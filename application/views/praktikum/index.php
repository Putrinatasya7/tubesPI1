<?php $this->load->view('header'); ?>
   	<div class="container">
      <div class="row" style="padding: 20px;">
      <div class="col-lg-12">
      <hr> 
   		
			<?php if($this->session->flashdata('info')): ?>
				<div class="alert"><?php echo $this->session->flashdata('info'); ?></div>
			<?php endif; ?>
      <br>
				<a href="<?php echo site_url('praktikum/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
				<hr/>
        <div class="panel panel-primary">
          <div class="panel-heading">
            Praktikum
          </div>
          <!-- Panel-heading -->
          <div class="panel-body">
   		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
   						<th>No</th>
   						<th>Judul</th>
   						<th>Deskripsi</th>
   						<th>Aksi</th>
						</tr> 						
					</thead>		
			<tbody>
               <?php 
               $no=1; 
               foreach($lab as $row): ?>
               <tr class="odd gradeX">
                   <td><?php echo $no++; ?></td>
                   <td><?php echo $row['judul']?></td>
                   <td><?php echo $row['deskripsi'] ?></td>
                    <td>
                        	<center>
                                 <div class="tooltip-demo">
                                   <a href="<?php echo site_url('praktikum/edit/'.$row['id']); ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data">Edit</a>
                                   <a href="<?php echo site_url('praktikum/hapus/'.$row['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data">Hapus</a>
                                 </div>
                               </center>
                      </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
		</table>

    </div>
	</div>
</div>
</div>
</div>
<?php $this->load->view('footer'); ?>