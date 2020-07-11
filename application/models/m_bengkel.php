<?php
// proses 12
class M_bengkel extends CI_Model 
{ 
    // proses 13 (autoload.php)
    // tampil_data = funtion dr controller bengkel
    public function tampil_data()
    {
        // kriteria = nama database
        return $this->db->get('kriteria');
    }

    public function tampil_data_pengaju()
    {
        // kriteria = nama database
        $this->db->select('*');
        $this->db->from('alternatif');
        $this->db->join('user','user.ID_User=alternatif.ID_User', 'left');
        $query = $this->db->get();
        return $query->result();

        // return $this->db->get('alternatif');
    }

    public function tampil_data_alternatif()
    {
        //title
        $this->db->order_by("tanggal_input","asc");
        return $this->db->get('alternatif');
    }
    public function tampil_data_kategori()
    {
        return $this->db->get('kategori');
    }

    public function duatable_kategori_detail() {
        //title
        $this->db->select('*');
        $this->db->from('kategori_detail');
        $this->db->join('kategori','kategori.ID_Kategori=kategori_detail.ID_Kategori', 'left');
        // $this->db->join('saring_jenis_layanan','saring_jenis_layanan.ID_JL=kategori.ID_JL', 'left');

        // $this->db->group_by("ID_Kategori");
        $query = $this->db->get();
        return $query->result();
       }

       public function tampil_data_kategori_detail()
       {
           $this->db->select('*');
           $this->db->from('kategori_detail');
           $this->db->join('kategori','kategori.ID_Kategori=kategori_detail.ID_Kategori', 'left');
           $this->db->join('saring_jenis_layanan','saring_jenis_layanan.ID_JL=kategori_detail.ID_JL', 'left');
           $this->db->join('saring_jenis_onderdil','saring_jenis_onderdil.ID_JO=kategori_detail.ID_JO', 'left');
           $this->db->join('saring_tipe_motor','saring_tipe_motor.ID_TM=kategori_detail.ID_TM', 'left');
           $this->db->join('saring_merek_onderdil','saring_merek_onderdil.ID_MO=kategori_detail.ID_MO', 'left');
           $query = $this->db->get();
           return $query->result();
   
       }

    public function tampil_data_saring()
    {
        return $this->db->get('saring');
    } 
    // public function tampil_data_saring_detail()
    // {
    //     return $this->db->get('saring_detail');
    // }
    // public function duatable_saring_detail() {
    //     $this->db->select('*');
    //     $this->db->from('saring_detail');
    //     $this->db->join('kategori','kategori.ID_Kategori=saring_detail.ID_Saring_Detail', 'left');
    //     $query = $this->db->get();
    //     return $query->result();
    //    }

    public function duatable_saringJL() {
        $this->db->select('*');
        $this->db->from('saring_jenis_layanan');
        $this->db->join('kategori','kategori.ID_Kategori=saring_jenis_layanan.ID_Kategori', 'left');
        $query = $this->db->get();
        return $query->result();
       }

    public function duatable_saringJO() {
        $this->db->select('*');
        $this->db->from('saring_jenis_onderdil');
        $this->db->join('kategori','kategori.ID_Kategori=saring_jenis_onderdil.ID_Kategori', 'left');
        $query = $this->db->get();
        return $query->result();
       }

    public function tampil_saringMM()
    {
        // kriteria = nama database
        return $this->db->get('saring_merek_motor');
    }
       
    public function duatable_saringTM() {
        $this->db->select('*');
        $this->db->from('saring_tipe_motor');
        $this->db->join('saring_merek_motor','saring_merek_motor.ID_MM=saring_tipe_motor.ID_MM', 'left');
        $query = $this->db->get();
        return $query->result();
       }
       
    public function tampil_saringMO()
    {
        // kriteria = nama database
        return $this->db->get('saring_merek_onderdil');
    }
          
    public function tampil_data_pBengkel()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_temp');
        $this->db->join('user','user.ID_User=pengajuan_temp.ID_User', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllDataAlternatif()
    {
        // untuk tahu id alternatif udh urutan nomor brp
        return $this->db->get('alternatif');
    }

    public function data()
    {
        $query = $this->db->query("SELECT max(ID_Pengajuan) as no_urut from pengajuan");
        $hasil = $query->row();
        return $hasil;
    }
    
    public function tampil_data_pLayanan()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_layanan');
        $this->db->join('alternatif','alternatif.ID_Alternatif=pengajuan_layanan.ID_Alternatif', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function tampil_data_pOnderdil()
    {
        $this->db->select('*');
        $this->db->from('pengajuan_onderdil');
        $this->db->join('alternatif','alternatif.ID_Alternatif=pengajuan_onderdil.ID_Alternatif', 'left');
        $this->db->join('saring_merek_motor','saring_merek_motor.ID_MM=pengajuan_onderdil.Merek_Motor', 'left');
        $this->db->join('saring_tipe_motor','saring_tipe_motor.ID_TM=pengajuan_onderdil.Tipe_Motor', 'left');
        $this->db->join('saring_merek_onderdil','saring_merek_onderdil.ID_MO=pengajuan_onderdil.Merek_Onderdil', 'left');
        $query = $this->db->get();
        return $query->result();

    }

    public function ambil_data_pengajuan($ID_Pengajuan)
    {
        $this->db->select('*');
        $this->db->from('pengajuan_temp');
        $this->db->where("ID_Pengajuan", $ID_Pengajuan);
        $this->db->join('user','user.ID_User=pengajuan_temp.ID_User', 'left');
        $query = $this->db->get();
        return $query->result();

    }

    // public function duatable() {
    //     $this->db->select('*');
    //     // $this->db->select('pengajuan.*');
    //     $this->db->from('pengajuan');
    //     $this->db->join('alternatif','alternatif.ID_Alternatif=pengajuan.ID_Pengajuan', 'left');
    //     // $this->db->join('pengajuan','pengajuan.ID_Pengajuan=alternatif.ID_Alternatif');
    //     $query = $this->db->get();
    //     return $query->result();
    //    }
       
       


  //=================================== START ALL ===================================
    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // proses 24 (v_bengkel.php)
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // proses 28 (v_edit_kriteria.php)
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // proses 31 (last)
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // public function detail_data($ID_Alternatif = NULL){
    //     $query = $this->db->get_where('alternatif', array('ID_Alternatif' => $ID_Alternatif))->row();
    //     return $query;
    // }

    public function get_data_matrix($ID_Alter)
    {
        // $this->db->select('*');
        // $this->db->from('alternatif');
        // $this->db->where('ID_Aternatif', $ID_Alter);
        // // $this->db->join('matrix','matrix.ID_Alternatif=alternatif.ID_Alternatif');
        // $query = $this->db->get();
        // return $query->result();

        $this->db->select('*');
        $this->db->from('matrix');
        $this->db->where("ID_Alternatif", $ID_Alter);
        $query = $this->db->get();
        return $query->result_array();
    }
}
