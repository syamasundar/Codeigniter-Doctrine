<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ini_set('display_errors',1);
//require_once APPPATH.'modules/site/models/categoriesmodel.php';
/**
 * ComplaintController class
 * This class is define for regarding complaints 
 *
 * @module 		complaints
 *
 * @package		complants
 * @subpackage	Controllers
 * @author		Syamasundar chettu
 
 */
class Complaint extends MX_Controller {

    /**
     * 
     * Constructor
     * 
     * Initialize the user preferences
     */
    public function __construct() {
        parent::__construct();
        //$this->_init();
       
    }

    private function _init() {
        $this->output->set_template('default');

        $this->output->set_title('CMS Complaints');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		//$this->load->js('assets/themes/complaints/js/post-a-complaint.js');

    }

    /**
     *
     *  Index page for this controller
     * 
     */
    public function index() { 
    	
        $this->load->view('post-a-complaint');
    }

	/**
	*This function is for submit complaint Info to model class
	*@params posteddata - array
	*@return boolian value
	*/
	public function post_complaint(){
		//fetching all input values from view page
		$postComplaintData = $this->input->post(NULL, TRUE);	
		//create an object for ComplaintsModel class
		$complaint_post_object = new ComplaintsModel();
		//var_dump($_SERVER['HTTP_CLIENT_IP']);
		//for checking
		$complaint_post_object->grievance_id = 'GRV0002';
		$complaint_post_object->title = "Garbase";
		$complaint_post_object->description = "Testing message 12";
		$complaint_post_object->latitude = 72.4536;
		$complaint_post_object->longitude = 74.4537;
		$complaint_post_object->taluk_id = 1005;
		$complaint_post_object->address = "thippasandra";
		$complaint_post_object->landmark = "Hdfc bank";
		$complaint_post_object->suggested_solution = "No suggestion 12";
		$complaint_post_object->status = 1;
		$complaint_post_object->user_source_id = 'NULL';
		$complaint_post_object->created = date("Y-m-d h:i:s");
		$complaint_post_object->creator_id = 1;
		$complaint_post_object->updated = date("Y-m-d, h:i:s");
		$complaint_post_object->editor_id = 'NULL';
		
		//$complaint_post_object->ip = $_SERVER['HTTP_CLIENT_IP'];
		$complaint_post_object->user_agent = $_SERVER['HTTP_USER_AGENT'];
		$complaint_post_object->is_deleted = '0';
		
		if($complaint_post_object->save()){
			echo "Success";
		} else {
			echo "Failure";
		}
		/*$complaint_post_object->grevince_id = GRV.uniqid();
		$complaint_post_object->title = $postComplaintData['complaint_title'];
		$complaint_post_object->description = $postComplaintData['complaint_description'];
		$complaint_post_object->latitude = $postComplaintData['latitude'];
		$complaint_post_object->longitude = $postComplaintData['longitude'];
		$complaint_post_object->taluk_id = $postComplaintData['taluk_id'];
		$complaint_post_object->address = $postComplaintData['address'];
		$complaint_post_object->landmark = $postComplaintData['landmark'];
		$complaint_post_object->suggested_solution = $postComplaintData['suggested'];
		$complaint_post_object->status = '1';
		$complaint_post_object->user_source_id = $postComplaintData['user_source_id'];
		$complaint_post_object->created = date(Y-m-d,'h:i:s');
		$complaint_post_object->creator_id = $postComplaintData['user_id'];
		$complaint_post_object->updated = date(Y-m-d,'h:i:s');
		$complaint_post_object->editor_id =$postComplaintData['user_id'];
		$complaint_post_object->comment = '1';
		$complaint_post_object->promote = '1';
		$complaint_post_object->ip = $_SERVER['HTTP_CLIENT_IP'];
		$complaint_post_object->user_agent = $_SERVER['HTTP_USER_AGENT'];
		$complaint_post_object->is_deleted = '0';
		//for checking files are uploded or not?
		
			if(!empty($postComplaintData['uploaded_files'])){
				//if yes (uploaded)
				foreach($postComplaintData['uploaded_files'] as $uploadedFiles){
					$file_upload_object = new PostUploadFile();
							
					$file_upload_object->file_name = $uploadedFiles['file_name'];
					$file_upload_object->file_uri = $uploadedFiles['file_uri'];
					$file_upload_object->mime_type = $uploadedFiles['mime_type'];
					$file_upload_object->file_size = $uploadedFiles['file_size'];
					$file_upload_object->title = $uploadedFiles['title'];
					$file_upload_object->description = $uploadedFiles['description'];
					$file_upload_object->comment = $uploadedFiles['comment'];
					$file_upload_object->created = date(Y-m-d,'h:i:s');
					$file_upload_object->creator_id = $postComplaintData['user_id'];
					$file_upload_object->file_name = $uploadedFiles['file_name'];
					$file_upload_object->updated = date(Y-m-d,'h:i:s');
					$file_upload_object->editor_id = $postComplaintData['user_id'];
					$file_upload_object->is_active = '1';
					$file_upload_object->ip = $_SERVER['HTTP_CLIENT_IP'];
					$file_upload_object->user_agent = $_SERVER['HTTP_USER_AGENT'];
						
					$file_upload_object->save();
							
				}
				//end foreach and saved all uploded files into cms_file table 
			}// ends if condition
			$complaintId = $complaint_post_object->save();
			if(NULL != $complaintId){
				$url_alias_object = new UrlAliasTable();
				
				$url_alias_object->content_type_id= '2';
				$url_alias_object->source_id=$complaintId;
				$url_alias_object->source_path='alias/details/'.$complaintId;
				$url_alias_object->alias='/alias/path';
				$url_alias_object->short_url='/alias/';
				$result = $url_alias_object->save();
				if($result){
					return "success";
				} 
			}*/
			
		//var_dump($postComplaintData); exit();
	}
	/**
	 * This function is for getting email list for autocomplete
	 * 
	 * @param string $email
	 * @return list of emails
	 */
	public function getEmailsList(){
		/*$email = $_REQUEST['email'];//$this->input->post('email');
		$listOfEmails = ComplainsManager::getAutocompleteEmails($email);
		echo json_encode($listOfEmails);*/
	}
		/**
	 * This function is for getting email list for autocomplete
	 * 
	 * @param string $email
	 * @return list of emails
	 */
	public function getAllComplaints(){
		ini_set('display_errors', 1);
		//get all complaint details
			
		$users_object = new UserModel();
		//$users_object->get_by_id('2');
		//var_dump($users_object);exit;
		//$complaints_object = new CategoriesModel();
		//$users_object->where('id', '2')->get();
		
		$uobj = new RoleModel();
		$users_object->uobj->where_join_field($users_object,'id',2)->get();
	 foreach($users_object->$uobj as $result) {
    		echo("{$result->usere_name}");
		}
		exit;
		///$users_object->where_related('role/complaints', 'id','2')->get();
		// Include the user's name in the result:
		$users_object->where_related('user','role_id', '2')->get();
		/* include the user's group's name in the result:
		$users_object->include_related('role/complaints', 'id');
		$users_object->get();*/
	    foreach($users_object as $result) {
    		echo("{$result->user_name} ({$result->name})\n");
		}
	}
	
}

/* End of file Site.php */
/* Location: ./applications/espandana-dev/modules/site/Site.php */