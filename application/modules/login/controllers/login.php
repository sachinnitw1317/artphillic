<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function index()
	{
		$this->viewer();
	}
	public function viewer(){
		$this->load->view('register');
		$this->load->view('register_navbar');
		$this->load->view('register_body');
		$this->load->view('register_footer');
	}
	public function validation(){
		/*
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$password=$this->check($_POST['password']);
			$username=$this->check($_POST['username']);
			$data=array($password,$username);
			$this->member();
		*/
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','required|callback_validate_user');
			$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run($this)==true) {
			$data=array(
				'username'=>$this->input->post('username'),
				'logged_in'=>1,
				);
			$this->session->set_userdata($data);
			$this->member();
		}
		else{
		$this->viewer();
		}
	
	}
	public function check($data){
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		$data=trim($data);

		return $data;
	}
	public function validate_user(){
		$this->load->model('mdl_login');
		if($this->mdl_login->can_log_in()){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_user','Wrong Username/Password');
			return false;
		}

	}

	public function member(){
		if($this->session->userdata('logged_in')){
		$this->load->view('register');
		$this->load->view('register_navbar_member');
		$this->load->view('register_body_member');
		$this->load->view('register_footer');
		}
		else
		redirect('<?php echo base_url(); ?>cart/login');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('<?php echo base_url(); ?>cart/login');
	}
	public function sign_up(){
		$this->load->view('register');
		$this->load->view('register_navbar');
		$this->load->view('register_body_sign_up');
		$this->load->view('register_footer');
	}
	public function sign_up_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[users.username]');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		if($this->form_validation->run()){
			$key=md5(uniqid());
			 $config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'sachin931350@gmail.com', 
			  'smtp_pass' => 'nirmala@@', 
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);
			$this->load->library('email',$config);
			$this->email->from('sachin931350@gmail.com','sachin931350');
			$this->email->to($this->input->post('email'));
			$this->email->subject('confirm your account');
			$message="<p><a href='".base_url()."/login/sign_up_validation/$key'>click here</a></p>";
			$this->email->message($message);
			 /*if($this->email->send())
		          echo 'Email sent.';
		     else
		     	echo "failed";
		     show_error($this->email->print_debugger());*/
		     $this->load->model('mdl_login');
		    if( $this->mdl_login->add_user($key)){
		    $info=$this->mdl_login->add_user_verified($key);
		    $data=array(
				'username'=>$info['username'],
				'email'=>$info['email'],
				'logged_in'=>1,
				);
			$this->session->set_userdata($data);
			$this->member();
		}
		    else
		    	echo "failed";
		    }
		    else
			$this->sign_up();

	}
	public function login_facebook(){

		redirect('<?php echo base_url(); ?>login_facebook');
	}
}