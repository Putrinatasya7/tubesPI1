<?php $this->load->view('header'); ?>
	<div class="container"><div class="row">
			<div class="span12">
				<?php echo form_open(); ?>
				<?php echo validation_errors(); ?>
					<fieldset>
					<legend>Tambah Data</legend>
					<label>Judul</label>
					<input type="text" name="judul" placeholder="Masukkan Nama Awal" value="<?php echo set_value('judul'); ?>">
					
					<label>Deskripsi</label>
					<input type="text" name="deskripsi" placeholder="Masukkan Nama Akhir" value="<?php echo set_value('deskripsi'); ?>">

					<label></label>
					<input type="submit" class="btn" name="submit"  value="Kirim">
					</fieldset>
				<?php echo form_close(); ?>
			</div></div>
		</div><?php $this->load->view('footer'); ?>