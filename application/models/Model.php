
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class model extends CI_Model {
	
	
    public function sendsms($to,$message,$title,$s)
    {
		
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => $s->host,
            'smtp_user' => $s->email,  // Email gmail
            'smtp_pass'   => $s->password,  // Password gmail
            'smtp_crypto' => $s->ssl,
            'smtp_port'   => $s->port,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from($s->email, $s->name);

        // Email penerima
        $this->email->to($to); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('');

        // Subject email
        $this->email->subject($title);

        // Isi email
        $this->email->message($message);
 
        if ($this->email->send()) {
            return 'Success';
        } else {
            return 'Error';
        }
    }
	
	
	  
	public function get_obj($table,$where = ""){
		$table = str_replace('`','',$table); $table = "#".$table."#"; $table = str_replace('# ','',$table);  $table = str_replace(' #','',$table); $table = str_replace('#','',$table);
		
		
		
		if(!empty($where)){
			$data = $this->db->query("SELECT * FROM `$table` WHERE $where");
			return $data->result_object();
			
		} else {
			$data = $this->db->query("SELECT * FROM `$table` ");
			return $data->result_object();
		}
	}
	
	 
	
	public function row($table,$where = ""){
		$table = str_replace('`','',$table); $table = "#".$table."#"; $table = str_replace('# ','',$table);  $table = str_replace(' #','',$table); $table = str_replace('#','',$table);

		
		if(!empty($where)){
			$data = $this->db->query("SELECT * FROM `$table` WHERE $where");
			return $data->num_rows();
			
		} else {
			$data = $this->db->query("SELECT * FROM `$table` ");
			return $data->num_rows();
		}
	} 
	
	
	
	
	public function delete($table,$where = ""){
		$table = str_replace('`','',$table); $table = "#".$table."#"; $table = str_replace('# ','',$table);  $table = str_replace(' #','',$table); $table = str_replace('#','',$table);
		
		$this->db->where($where);
		$this->db->delete($table);
		return $this->row($table,$where);
	} 
	
	
	public function get($table,$where = ""){
		$table = str_replace('`','',$table);
		
		if(!empty($where)){
			$data = $this->db->query("SELECT * FROM `$table` WHERE $where");
			return $data->result_array();
			
		} else {
			$data = $this->db->query("SELECT * FROM `$table` ");
			return $data->result_array();
		}
	}
	
	
	public function sql($sql){
		$data = $this->db->query($sql);
		return $data;
	}
	
	
	public function sql_fetch($sql){
		$data = $this->db->query($sql);
		$row = $data->num_rows();
		if($row >= 1){
				return $data->result_object();
		} else {
			return "";
		}
	}
	
	
	
}


?>  