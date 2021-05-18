<div class="container"><div class="row">
	<div class="span12">
		<?php echo form_open(); ?>
		<?php echo validation_errors(); ?>
			<fieldset>
			<legend>Edit Data</legend>
			<label>Judul</label>
			<input type="text" name="judul" value="<?php echo $editdata->judul; ?>">
			
			<label>Deskripsi</label>
			<input type="text" name="deskripsi" value="<?php echo $editdata->deskripsi; ?>">

			
			<label></label>
			<input type="hidden" name="id" value="<?php echo $editdata->id; ?>">
			<input type="submit" class="btn" name="submit"  value="Update data">
			</fieldset>
		<?php echo form_close(); ?>
	</div>
</div></div>