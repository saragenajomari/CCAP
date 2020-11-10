<?php
class Pages extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('form');
		$this->load->model('sellers_model');
	}
	
	/* Login page */
	function index()
	{
		$data['items'] = $this->product_model->get_items_approved();

		$this->load->view('landing');
		$this->load->view('includes/footer');
		
	}

	/* Home/Car page */
	public function login(){
		
		$this->load->view('login');
		$this->load->view('includes/footer');
	}

	public function account_edit(){
		$uid = $_SESSION['uid'];
		$data['user_data'] = $this->accounts_model->get_user($uid);

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_default');
		$this->load->view('edit_account',$data);
		$this->load->view('includes/footer');
	}

	public function alter_account(){

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $fname =  $this->input->post('fname');
        $lname =  $this->input->post('lname');
        $address = $this->input->post('address');
        $contact = $this->input->post('cnum');
        $uid = $this->input->post('uid');

        $userdata = array(
            'email' => $email,
            'password' => $password,
            'fname' => $fname,
            'lname' => $lname,
            'address' => $address,
            'contact' => $contact, 
            'type' => 'seller'
        );
        $this->accounts_model->update_account($userdata,$uid);
        redirect('pages/account_edit/');
    }

	function home()
	{
		
		$data['items'] = $this->product_model->get_items_approved();

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar');
		$this->load->view('home',$data);
		//$this->load->view('includes/footer');
		
	}

	/* Parts page */
	public function home_parts(){

		$data['items'] = $this->parts_model->get_items_approved_parts();

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_part');
		$this->load->view('home_parts',$data);
		$this->load->view('includes/footer');
	}

	function pagination_rating(){

		$type='';
		$search = $this->input->get('id'); 
		if (isset($_SESSION['type'])) {
			$type = $_SESSION['type'];
		}
		
		$this->load->model("ajax_pagination_model");
		$this->load->library("pagination");
		
		$config = array();
		$config["base_url"] = base_url()."index.php/pages/pagination_rating/";
		$config["total_rows"] = $this->ajax_pagination_model->count_all_rating($search);
		$config["per_page"] = 2;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];
		$output = array(
		 'pagination_link'  => $this->pagination->create_links(),
		 'content_area'   => $this->ajax_pagination_model->fetch_details_rating($config["per_page"], $start, $search, $type)
		);
		
		echo json_encode($output);
	}		

	function pagination_rating_part(){

		$type='';
		$search = $this->input->get('id'); 
		if (isset($_SESSION['type'])) {
			$type = $_SESSION['type'];
		}
		
		$this->load->model("ajax_pagination_model");
		$this->load->library("pagination");
		
		$config = array();
		$config["base_url"] = base_url()."index.php/pages/pagination_rating_part/";
		$config["total_rows"] = $this->ajax_pagination_model->count_all_rating_part($search);
		$config["per_page"] = 2;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];
		$output = array(
		 'pagination_link'  => $this->pagination->create_links(),
		 'content_area'   => $this->ajax_pagination_model->fetch_details_rating_part($config["per_page"], $start, $search, $type)
		);
		
		echo json_encode($output);
	}		

	/* Page pagination for car page */
	function pagination_cars(){
		$search = $this->input->get('search'); 
		$search = strtoupper($search);
		$this->load->model("ajax_pagination_model");
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url()."index.php/pages/pagination_cars/";
		$config["total_rows"] = $this->ajax_pagination_model->count_all_cars($search);
		$config["per_page"] = 6;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];
		$output = array(
		 'pagination_link'  => $this->pagination->create_links(),
		 'content_area'   => $this->ajax_pagination_model->fetch_details_cars($config["per_page"], $start, $search)
		);
		if(empty($output['content_area'])){
			$output['content_area'] = '<div class="alert alert-warning">
        <strong>OPPPPSSS!!!</strong> No match found. Please try again.
      </div>';
			echo json_encode($output);
		}else{
			echo json_encode($output);
		}
	}		

	function pagination_parts(){
	
		$search = $this->input->get('search'); 
		$search = strtoupper($search);
	
		$this->load->model("ajax_pagination_model");
  		$this->load->library("pagination");
  		$config = array();
  		$config["base_url"] = base_url()."index.php/pages/pagination_parts/";
  		$config["total_rows"] = $this->ajax_pagination_model->count_all_parts($search);
  		$config["per_page"] = 8;
  		$config["uri_segment"] = 3;
  		$config["use_page_numbers"] = TRUE;
  		$config["full_tag_open"] = '<ul class="pagination">';
  		$config["full_tag_close"] = '</ul>';
  		$config["first_tag_open"] = '<li>';
  		$config["first_tag_close"] = '</li>';
  		$config["last_tag_open"] = '<li>';
  		$config["last_tag_close"] = '</li>';
  		$config['next_link'] = '&gt;';
  		$config["next_tag_open"] = '<li>';
  		$config["next_tag_close"] = '</li>';
  		$config["prev_link"] = "&lt;";
  		$config["prev_tag_open"] = "<li>";
  		$config["prev_tag_close"] = "</li>";
  		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
  		$config["cur_tag_close"] = "</a></li>";
  		$config["num_tag_open"] = "<li>";
  		$config["num_tag_close"] = "</li>";
  		$config["num_links"] = 1;
  		$this->pagination->initialize($config);
  		$page = $this->uri->segment(3);
  		$start = ($page - 1) * $config["per_page"];

 		$output = array(
   		'pagination_link'  	=> $this->pagination->create_links(),
   		'content_area'   	=> $this->ajax_pagination_model->fetch_details_parts($config["per_page"], $start, $search)
		);
		if(empty($output['content_area'])){
			$output['content_area'] = '<div class="alert alert-warning">
        <strong>OPPPPSSS!!!</strong> No match found. Please try again.
      </div>';
			echo json_encode($output);
		}else{
			echo json_encode($output);
		}
	}

	/* Page pagination for admin dashboard page */
	function pagination_admin(){
		$search = 'car'; 
		$this->load->model("ajax_pagination_model");
  		$this->load->library("pagination");
  		$config = array();
  		$config["base_url"] = base_url()."index.php/pages/pagination_admin/";
  		$config["total_rows"] = $this->ajax_pagination_model->count_all_admin($search);
  		$config["per_page"] = 2;
  		$config["uri_segment"] = 3;
  		$config["use_page_numbers"] = TRUE;
  		$config["full_tag_open"] = '<ul class="pagination">';
  		$config["full_tag_close"] = '</ul>';
  		$config["first_tag_open"] = '<li>';
  		$config["first_tag_close"] = '</li>';
  		$config["last_tag_open"] = '<li>';
  		$config["last_tag_close"] = '</li>';
  		$config['next_link'] = '&gt;';
  		$config["next_tag_open"] = '<li>';
  		$config["next_tag_close"] = '</li>';
  		$config["prev_link"] = "&lt;";
  		$config["prev_tag_open"] = "<li>";
  		$config["prev_tag_close"] = "</li>";
  		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
  		$config["cur_tag_close"] = "</a></li>";
  		$config["num_tag_open"] = "<li>";
  		$config["num_tag_close"] = "</li>";
  		$config["num_links"] = 1;
  		$this->pagination->initialize($config);
  		$page = $this->uri->segment(3);
  		$start = ($page - 1) * $config["per_page"];

  		$output = array(
   			'pagination_link'  => $this->pagination->create_links(),
   			'content_area'     => $this->ajax_pagination_model->fetch_details_admin($config["per_page"], $start,$search)
  		);
		if(empty($output['content_area'])){
			$output['content_area'] = '<div class="alert alert-warning">
        <strong>OPPPPSSS!!!</strong> Seems like no one sent a request to sell their cars yet. Please come back later to accept or decline a request.
      	</div>';
			echo json_encode($output);
		}else{
			echo json_encode($output);
		}
	}

	function pagination_admin_part(){
		
		$search = 'part'; 
		$this->load->model("ajax_pagination_model");
  		$this->load->library("pagination");
  		$config = array();
  		$config["base_url"] = base_url()."index.php/pages/pagination_admin/";
  		$config["total_rows"] = $this->ajax_pagination_model->count_all_admin($search);
  		$config["per_page"] = 2;
  		$config["uri_segment"] = 3;
  		$config["use_page_numbers"] = TRUE;
  		$config["full_tag_open"] = '<ul class="pagination">';
  		$config["full_tag_close"] = '</ul>';
  		$config["first_tag_open"] = '<li>';
  		$config["first_tag_close"] = '</li>';
  		$config["last_tag_open"] = '<li>';
  		$config["last_tag_close"] = '</li>';
  		$config['next_link'] = '&gt;';
  		$config["next_tag_open"] = '<li>';
  		$config["next_tag_close"] = '</li>';
  		$config["prev_link"] = "&lt;";
  		$config["prev_tag_open"] = "<li>";
  		$config["prev_tag_close"] = "</li>";
  		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
  		$config["cur_tag_close"] = "</a></li>";
  		$config["num_tag_open"] = "<li>";
  		$config["num_tag_close"] = "</li>";
  		$config["num_links"] = 1;
  		$this->pagination->initialize($config);
  		$page = $this->uri->segment(3);
  		$start = ($page - 1) * $config["per_page"];

  		$output = array(
   			'pagination_link'  => $this->pagination->create_links(),
   			'content_area'     => $this->ajax_pagination_model->fetch_details_admin($config["per_page"], $start,$search)
  		);
  		if(empty($output['content_area'])){
			$output['content_area'] = '<div class="alert alert-warning">
        <strong>OPPPPSSS!!!</strong> Seems like no one sent a request to sell their car parts and accessories yet. Please come back later to accept or decline a request.
      	</div>';
			echo json_encode($output);
		}else{
			echo json_encode($output);
		}
	}

	/* Page pagination for seller dashboard page */
	function pagination_seller(){
 
		$search = 'car';
		$this->load->model("ajax_pagination_model");
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url()."index.php/pages/pagination_seller/";
		$config["total_rows"] = $this->ajax_pagination_model->count_all_seller($search);
		$config["per_page"] = 2;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];
	  
		$output = array(
		 'pagination_link'  => $this->pagination->create_links(),
		 'content_area'   	=> $this->ajax_pagination_model->fetch_details_seller($config["per_page"],$start,$search)
		);
		if(empty($output['content_area'])){
			$output['content_area'] = '<div class="alert alert-warning">
        <strong>OPPPPSSS!!!</strong> Seems like you did not post any cars yet. Start selling now or wait for the admin to approve your request and enjoy!
      	</div>';
			echo json_encode($output);
		}else{
			echo json_encode($output);
		}
	}

	function pagination_seller_part(){
 
		$search = 'part';
		$this->load->model("ajax_pagination_model");
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url()."index.php/pages/pagination_seller_part/";
		$config["total_rows"] = $this->ajax_pagination_model->count_all_seller($search);
		$config["per_page"] = 2;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 1;
		$this->pagination->initialize($config);
		$page = $this->uri->segment(3);
		$start = ($page - 1) * $config["per_page"];
	  
		$output = array(
		 'pagination_link'  => $this->pagination->create_links(),
		 'content_area'   	=> $this->ajax_pagination_model->fetch_details_seller($config["per_page"],$start,$search)
		);
		if(empty($output['content_area'])){
			$output['content_area'] = '<div class="alert alert-warning">
        <strong>OPPPPSSS!!!</strong> Seems like you did not post any car parts and accessories yet. Start selling now or wait for the admin to approve your request and enjoy!
      	</div>';
			echo json_encode($output);
		}else{
			echo json_encode($output);
		}
	}

	/* Specific details of a car page*/
	public function car_details($id){
		$user_id;
		$data['item_details'] = $this->product_model->get_items($id);
		foreach($data['item_details'] as $details){
			$user_id = $details->sellerId;
		}
		$data['seller_details'] = $this->accounts_model->get_user($user_id);
		$data['rate_count'] = $this->rating_model->data_count($id);
		$data['rate_ave'] = $this->rating_model->data_ave($id);
		$data['rate_count_one'] = $this->rating_model->data_count_one($id);
		$data['rate_count_two'] = $this->rating_model->data_count_two($id);
		$data['rate_count_three'] = $this->rating_model->data_count_three($id);
		$data['rate_count_four'] = $this->rating_model->data_count_four($id);
		$data['rate_count_five'] = $this->rating_model->data_count_five($id);
		if ($data['rate_count']!=NULL && $data['rate_ave']!=NULL) {
		$data['rate_count_one'] = ($data['rate_count_one']/$data['rate_count'])*100;
		$data['rate_count_two'] = ($data['rate_count_two']/$data['rate_count'])*100;
		$data['rate_count_three'] = ($data['rate_count_three']/$data['rate_count'])*100;
		$data['rate_count_four'] = ($data['rate_count_four']/$data['rate_count'])*100;
		$data['rate_count_five'] = ($data['rate_count_five']/$data['rate_count'])*100;
		}
		

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('carDetails',$data);
		$this->load->view('reviews');
		$this->load->view('includes/footer'); 
	}

	/* Specific details of a part page*/
	public function parts_details($id){
		$user_id;
		$data['item_details'] = $this->parts_model->get_items_parts($id);
		foreach($data['item_details'] as $details){
			$user_id = $details->seller_id;
		}
		$data['seller_details'] = $this->accounts_model->get_user($user_id);
		$data['rate_count'] = $this->rating_model->data_count_part($id);
		$data['rate_ave'] = $this->rating_model->data_ave_part($id);
		$data['rate_count_one'] = $this->rating_model->data_count_one_part($id);
		$data['rate_count_two'] = $this->rating_model->data_count_two_part($id);
		$data['rate_count_three'] = $this->rating_model->data_count_three_part($id);
		$data['rate_count_four'] = $this->rating_model->data_count_four_part($id);
		$data['rate_count_five'] = $this->rating_model->data_count_five_part($id);
		if ($data['rate_count']!=NULL && $data['rate_ave']!=NULL) {
		$data['rate_count_one'] = ($data['rate_count_one']/$data['rate_count'])*100;
		$data['rate_count_two'] = ($data['rate_count_two']/$data['rate_count'])*100;
		$data['rate_count_three'] = ($data['rate_count_three']/$data['rate_count'])*100;
		$data['rate_count_four'] = ($data['rate_count_four']/$data['rate_count'])*100;
		$data['rate_count_five'] = ($data['rate_count_five']/$data['rate_count'])*100;
		}

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('partDetails',$data);
		$this->load->view('review_part');
		$this->load->view('includes/footer');
	}

	/* Admin dashboard page*/
	public function dashboard_admin(){
	
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_dashboard');
		$this->load->view('dashboard_admin');
		$this->load->view('includes/footer');
	}

	public function dashboard_admin_part(){
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_dashboard');
		$this->load->view('dashboard_admin_part');
		$this->load->view('includes/footer');
	}
	
	/* Seller dashboard page*/
	public function dashboard_seller(){
	
		$this->load->view('includes/header'); 
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_dashboard_seller');
		$this->load->view('dashboard_seller');
		$this->load->view('includes/footer');
	}

	public function success_dashboard_seller(){
	
		$this->load->view('includes/header'); 
		$this->load->view('includes/nav');
		$this->session->set_flashdata('success', 'Success! Please wait for the admin to approve your car post request.');
		$this->load->view('includes/sidebar_dashboard_seller');
		$this->load->view('dashboard_seller');
		$this->load->view('includes/footer');
	}

	public function dashboard_seller_part(){
	
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_dashboard_seller');
		$this->load->view('dashboard_seller_part');
		$this->load->view('includes/footer');
	}

	public function success_dashboard_seller_part(){
	
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->session->set_flashdata('success', 'Success! Please wait for the admin to approve your car items/accessories post request.');
		$this->load->view('includes/sidebar_dashboard_seller');
		$this->load->view('dashboard_seller_part');
		$this->load->view('includes/footer');
	}

	public function edit_car($id){

		$data['item_details'] = $this->product_model->get_items($id);
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_default');
		$this->load->view('dashboard_seller_edit_car',$data);
		$this->load->view('includes/footer');
	}

	public function success_edit_car($id){

		$data['item_details'] = $this->product_model->get_items($id);
		$flash = $this->session->set_flashdata('success', 'Your item was successfully edited!');
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_default');
		$this->load->view('dashboard_seller_edit_car',$data);
		$this->load->view('includes/footer');
	}

	public function edit_part($id){

		$data['item_details'] = $this->parts_model->get_items_parts($id);

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_default');
		$this->load->view('dashboard_seller_edit_part',$data);
		$this->load->view('includes/footer');
	}

	public function success_edit_part($id){

		$data['item_details'] = $this->parts_model->get_items_parts($id);
		$flash = $this->session->set_flashdata('success', 'Your item was successfully edited!');
		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('includes/sidebar_default');
		$this->load->view('dashboard_seller_edit_part',$data);
		$this->load->view('includes/footer');
	}

	public function delete_seller(){
    	$id = $this->uri->segment(3);
        $this->sellers_model->delete_seller($id);
        redirect(base_url()."pages/seller_list");
    }

	public function seller_list(){ 
		$data = array(
            'formTitle' => 'Seller Details',
            'title' => 'Seller Details',
            'users' => $this->sellers_model->get_seller_list(),
        );

		$this->load->view('includes/header_sellers');
		$this->load->view('includes/nav');
		$this->load->view('seller_list', $data);
		$this->load->view('includes/footer');  
	}

	public function outdated_cars(){ 
        $id = $_SESSION['uid'];
		$data = array(
			'title' => 'Out-of-Date Cars',
			'items' => $this->sellers_model->get_all_outdated_cars($id),
		);

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('outdated_cars_side', $data);
		$this->load->view('includes/footer'); 
	}

	public function outdated_parts(){
        $id = $_SESSION['uid'];
		$data = array(
			'title' => 'Out-of-Date Parts', 
			'item' => $this->sellers_model->get_all_outdated_parts($id),
		);

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('outdated_parts_side', $data);
		$this->load->view('includes/footer'); 
	}

	public function delete_car(){
		$id = $this->uri->segment(3);
        $this->sellers_model->delete_car($id);
        redirect(base_url()."pages/outdated_cars");
	}

	public function delete_part(){
		$id = $this->uri->segment(3);
        $this->sellers_model->delete_part($id);
        redirect(base_url()."pages/outdated_parts");
	}
}

?>