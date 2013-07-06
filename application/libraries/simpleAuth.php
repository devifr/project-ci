<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SimpleAuth
{
	var $CI;
	var $user_table = 'admin';

	/**
	 * Create a user account
	 *
	 * @access  public
	 * @param string
	 * @param string
	 * @param bool
	 * @return  bool
	 */

	function create($user_email = '', $user_pass = '', $data_add, $auto_login = true) 
	{
		$this->CI =& get_instance();
		
		//Make sure account info was sent
		if($user_name == '' OR $user_pass == '') {
			return false;
		}
		
		//Check against user table
		$this->CI->db->where('user_email', $user_name); 
		$query = $this->CI->db->get_where($this->user_table);
		
		if ($query->num_rows() > 0) //user_name already exists
			return false;

		//user_pass using md5
		$user_pass_hashed = md5($user_pass);

		//Insert account into the database
		$data_login = array(
					'username' => $user_name,
					'password' => $user_pass_hashed
				);

		$data = array_merge($data_login,$data_add);
		$this->CI->db->set($data); 

		if(!$this->CI->db->insert($this->user_table)) //There was a problem! 
			return false;           
				
		if($auto_login)
			$this->login($user_name, $user_pass);
		
		return true;
	}

	/**
	 * Update a user account
	 *
	 * Only updates the email, just here for you can 
	 * extend / use it in your own class.
	 *
	 * @access  public
	 * @param integer
	 * @param string
	 * @param bool
	 * @return  bool
	 */
	function update($user_id = null, $user_name = '', $data, $auto_login = true) 
	{
		$this->CI =& get_instance();

		//Make sure account info was sent
		if($user_id == null OR $user_name == '') {
			return false;
		}
		
		//Check against user table
		$this->CI->db->where('id_admin', $user_id);
		$query = $this->CI->db->get_where($this->user_table);
		
		if ($query->num_rows() == 0){ // user don't exists
			return false;
		}
		

		$this->CI->db->where('id_admin', $user_id);

		if(!$this->CI->db->update($this->user_table, $data)) //There was a problem! 
			return false;           
				
		if($auto_login){
			$user_data['username'] = $user_name;
			$user_data['username'] = $user_data['username']; // for compatibility with Simplelogin
			
			$this->CI->session->set_userdata($user_data);
			}
		return true;
	}

	/**
	 * Login and sets session variables
	 *
	 * @access  public
	 * @param string
	 * @param string
	 * @return  bool
	 */
	function login($user_name = '', $user_pass = '') 
	{
		$this->CI =& get_instance();

		if($user_name == '' OR $user_pass == '')
			return false;


		//Check if already logged in
		if($this->CI->session->userdata('username') == $user_name)
			return true;
		
		
		//Check against user table
		$this->CI->db->where('username', $user_name); 
		$query = $this->CI->db->get_where($this->user_table);

		
		if ($query->num_rows() > 0) 
		{
			$user_data = $query->row_array(); 


			if(!md5($user_pass)==$user_data['password'])
				return false;

			//Destroy old session
			$this->CI->session->sess_destroy();
			
			//Create a fresh, brand new session
			$this->CI->session->sess_create();

			//Set session data
			unset($user_data['password']);
			$user_data_log['id_admin'] = $user_data['id_admin']; // for compatibility with Simplelogin
			$user_data_log['username'] = $user_data['username']; // for compatibility with Simplelogin
			$user_data_log['nama_admin'] = $user_data['nama_admin'];
			$user_data_log['email_admin'] = $user_data['email_admin'];
			$user_data_log['role_id'] = $user_data['role_id'];
			$user_data_log['logged_in'] = true;
			$this->CI->session->set_userdata($user_data_log);
			
			return true;
		} 
		else 
		{
			return false;
		} 
	}

	function cekSudahLogin(){
		$this->CI =& get_instance();
		if($this->CI->session->userdata('logged_in')==true)
			redirect('admin/admin');
	}	
	function cekBelumLogin(){
		$this->CI =& get_instance();
		if($this->CI->session->userdata('logged_in')==false)
			redirect('admin/admin/login');
	}

	/**
	 * Logout user
	 *
	 * @access  public
	 * @return  void
	 */
	function logout() {
		$this->CI =& get_instance();    
		return $this->CI->session->sess_destroy();
	}

	/**
	 * Delete user
	 *
	 * @access  public
	 * @param integer
	 * @return  bool
	 */
	function delete($user_id) 
	{
		$this->CI =& get_instance();
		
		if(!is_numeric($user_id))
			return false;     

		return $this->CI->db->delete($this->user_table, array('id_admin' => $user_id));
	}
	
	
	/**
	* Edit a user password
	* @author    Stéphane Bourzeix, Pixelmio <stephane[at]bourzeix.com>
	* @author    Diego Castro <castroc.diego[at]gmail.com>
	*
	* @access  public
	* @param  string
	* @param  string
	* @param  string
	* @return  bool
	*/
	function edit_password($user_name = '', $old_pass = '', $new_pass = '')
	{
		$this->CI =& get_instance();
		// Check if the password is the same as the old one
		$this->CI->db->select('password');
		$query = $this->CI->db->get_where($this->user_table, array('username' => $user_name));
		$user_data = $query->row_array();

		if (md5($old_pass)!=$user_data['password']){ //old_pass is the same
			return FALSE;
		}
		
		// Hash new_pass using phpass
		$user_pass_hashed = md5($new_pass);
		// Insert new password into the database
		$data = array(
			'password' => $user_pass_hashed
		);
		
		$this->CI->db->set($data);
		$this->CI->db->where('username', $user_name);
		if(!$this->CI->db->update($this->user_table, $data)){ // There was a problem!
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
}
?>
