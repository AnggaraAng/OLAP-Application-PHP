<?php
require 'serverside.php';
// $table_data->get('dtl_mhs','nim',array('nim', 'nama','alamat','kota','tmp_lahir','tgl_lahir','jenis_kelamin','agama','tot_sks','tot_angku','ipk','kode_status','status', 'kd_wali','nama_wali','nama_ortu','alm_ortu','kota_ortu','nama_propinsi','tlp_ortu','kerja_ortu','nama_sma','kota_sma','propinsi_sma','jur_sma','kode_progdi','kode_ortu','akt','kode_propinsi_sma','kode_propinsi_ortu'));
$table_data->get('dtl_mhs','nim',array('nim', 'nama','alamat','kota','tmp_lahir','tgl_lahir','jenis_kelamin','agama','jur_sma','kode_status','kode_progdi','kode_ortu','akt'));
// $table_data_ortu->get('dtl_mhs','nim',array('nim', 'nama','alamat','kota','tmp_lahir','tgl_lahir','jenis_kelamin','agama','jur_sma','kode_status','kode_progdi','kode_ortu','akt'));


?>
