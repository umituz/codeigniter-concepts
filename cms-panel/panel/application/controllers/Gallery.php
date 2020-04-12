<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{
	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "gallery";
		$this->load->model('gallery_model');
		$this->load->model('gallery_image_model');
		$this->load->model('gallery_file_model');
		$this->load->model('gallery_video_model');
		if(!get_active_user())
		{
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$items = $this->gallery_model->get_all(
			array(),
			"rank ASC"
		);
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$viewData->items = $items;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function new_form()
	{
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "add";

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("title","Galeri Adı","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$gallery_type = $this->input->post("gallery_type");
			$path = "uploads/{$this->viewFolder}/";
			

			if($gallery_type == "image")
			{
				$folder_name = convertToSEO($this->input->post("title"));
				$path .= "image/{$folder_name}";
			}	
			else if ($gallery_type == "file")
			{
				$folder_name = convertToSEO($this->input->post("title"));
				$path .= "file/{$folder_name}";
			}
			
			if($gallery_type != "video")
			{
				if(!mkdir($path,0755))
				{
					$alert = array(
						"title"		=> "Başarısız", 
						"message" 	=> "Galeri oluşturulurken bir hata oluştu (Yetki Hatası)",
						"type" 		=> "error"
					); 
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("gallery"));
				}
			}

			$insert = $this->gallery_model->add(
				array(
					"title" 		=> $this->input->post("title"),
					"url" 			=> convertToSEO($this->input->post("title")),
					"gallery_type" 	=> $this->input->post("gallery_type"),
					"folder_name" 	=> $folder_name,
					"rank"  		=> 0,
					"isActive"  	=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s") 
				)
			);

			if($insert)
			{
				$alert = array(
					"title"		=> "Başarılı",
					"message"   => "Kayıt başarılı bir şekilde eklendi",
					"type" 		=> "success"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Kayıt eklenirken bir hata oluştu",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("gallery"));
			die;
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function update_form($id)
	{
		$item = $this->gallery_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id,$gallery_type,$oldFolderName = "")
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("title","Galeri Adı","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$path = "uploads/{$this->viewFolder}/";
			

			if($gallery_type == "image")
			{
				$folder_name = convertToSEO($this->input->post("title"));
				$path .= "image";
			}	
			else if ($gallery_type == "file")
			{
				$folder_name = convertToSEO($this->input->post("title"));
				$path .= "file";
			}
			
			if($gallery_type != "video")
			{
				if(!rename("{$path}/{$oldFolderName}","{$path}/{$folder_name}"))
				{
					$alert = array(
						"title"		=> "Başarısız", 
						"message" 	=> "Galeri düzenlenirken bir hata oluştu (Yetki Hatası)",
						"type" 		=> "error"
					); 
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("gallery"));
					die;
				}
			}

			$update = $this->gallery_model->update(
				array('id' => $id),
				array(
					"title" 		=> $this->input->post("title"),
					"folder_name"   => $folder_name,
					"url" 			=> convertToSEO($this->input->post("title"))
				)
			);

			if($update)
			{
				$alert = array(
					"title"		=> "Başarılı",
					"message"   => "Kayıt başarılı bir şekilde güncellendi",
					"type" 		=> "success"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Kayıt güncellenirken bir hata oluştu",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("gallery"));
		}
		else
		{
			$item = $this->gallery_model->get(array('id' => $id));
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $item;



			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function delete($id)
	{
		$gallery = $this->gallery_model->get(array("id" => $id));
		if($gallery)
		{
			if($gallery->gallery_type != "video")
			{
				if($gallery->gallery_type == "image")
				{
					$path = "uploads/{$this->viewFolder}/image/{$gallery->folder_name}";
				}
				else if($gallery->gallery_type == "file")
				{
					$path = "uploads/{$this->viewFolder}/file/{$gallery->folder_name}";	
				}
				$delete_folder = rmdir($path);
				if(!$delete_folder)
				{
					$alert = array(
						"title"		=> "Başarısız", 
						"message" 	=> "Kayıt silinirken bir hata oluştu",
						"type" 		=> "error"
					);
					$this->session->set_flashdata("alert",$alert);
					redirect(base_url("gallery"));
					die;
				}
			}
			
			$delete = $this->gallery_model->delete(array('id' =>$id));
			if($delete)
			{
				$alert = array(
					"title"		=> "Başarılı",
					"message"   => "Kayıt başarılı bir şekilde silindi",
					"type" 		=> "success"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Kayıt silinirken bir hata oluştu",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("gallery"));
		}

	}

	public function isActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->gallery_model->update(
				array("id" => $id),
				array("isActive" => $isActive)
			);
		}

	}

	public function rankSetter()
	{
		$data = $this->input->post("data");

		parse_str($data,$order);
		$items = $order["order"];
		
		foreach ($items as $rank => $id) {
			$this->gallery_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

	public function upload_form($id)
	{

		$viewData = new stdClass();

		$viewData->viewFolder 	 = $this->viewFolder;
		$viewData->subViewFolder = "image";

		$item = $this->gallery_model->get(
			array("id" => $id)
		);

		$viewData->item = $item;

		if($item->gallery_type == "image")
		{
			$viewData->items  = $this->gallery_image_model->get_all(
				array("gallery_id" => $id),
				"rank ASC"
			);
			$viewData->folder_name = $item->folder_name;
		}
		else if($item->gallery_type == "file")
		{
			$viewData->items  = $this->gallery_file_model->get_all(
				array("gallery_id" => $id),
				"rank ASC"
			);
		}
		else if($item->gallery_type == "video")
		{
			$viewData->items  = $this->gallery_video_model->get_all(
				array("gallery_id" => $id),
				"rank ASC"
			);
		}

		$viewData->gallery_type = $item->gallery_type;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function file_upload_old_method($gallery_id,$gallery_type,$gallery_folder_name)
	{
		$file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

		if($gallery_type == "image")
		{	
			$config["allowed_types"] = "jpg|jpeg|png";
		}
		else if($gallery_type == "file")
		{
			$config["allowed_types"] = "pdf|docx|txt|zip";
		}

		$config["upload_path"]   = ($gallery_type == "image") ? "uploads/{$this->viewFolder}/image/{$gallery_folder_name}/" : "uploads/{$this->viewFolder}/file/{$gallery_folder_name}/";
		$config["file_name"]     = $file_name;
		$this->load->library("upload",$config);

		$upload = $this->upload->do_upload("file");

		if($upload)
		{
			$modelName = ($gallery_type == "image") ? "gallery_image_model" : "gallery_file_model";
			$this->$modelName->add(
				array(
					"gallery_id" 	=> $gallery_id,
					"url" 			=> "{$config['upload_path']}{$file_name}",
					"rank"    		=> 0,
					"isActive"  	=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s")
				),
				"rank ASC"
			);
		}
		else
		{
			$alert = array(
				"title"		=> "Başarısız", 
				"message" 	=> "Galeri oluşturulurken bir hata oluştu ",
				"type" 		=> "error"
			); 
		}

	}

	public function file_upload($gallery_id,$gallery_type,$gallery_folder_name)
	{
		$file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . ".". pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

		if($gallery_type == "image"){	
			$image_252x156 = upload_picture($_FILES["file"]["tmp_name"],"uploads/{$this->viewFolder}/image/{$gallery_folder_name}/",252,156,$file_name);
			$image_350x216 = upload_picture($_FILES["file"]["tmp_name"],"uploads/{$this->viewFolder}/image/{$gallery_folder_name}/",350,216,$file_name);
			$image_851x606 = upload_picture($_FILES["file"]["tmp_name"],"uploads/{$this->viewFolder}/image/{$gallery_folder_name}/",851,606,$file_name);

			if($image_252x156 && $image_350x216 && $image_851x606){
				$this->gallery_image_model->add(
					array(
						"gallery_id" 	=> $gallery_id,
						"url" 			=> $file_name,
						"rank"    		=> 0,
						"isActive"  	=> 1,
						"createdAt" 	=> date("Y-m-d H:i:s")
					),
					"rank ASC"
				);
			}
		}else{
			$config["allowed_types"] = "*";
			$config["upload_path"]   = "uploads/{$this->viewFolder}/file/{$gallery_folder_name}/";
			$config["file_name"]     = $file_name;
			$this->load->library("upload",$config);

			$upload = $this->upload->do_upload("file");

			if($upload)
			{
				$uploaded_file = $this->upload->data("file_name");
				$this->gallery_file_model->add(
					array(
						"gallery_id" 	=> $gallery_id,
						"url" 			=> $uploaded_file,
						"rank"    		=> 0,
						"isActive"  	=> 1,
						"createdAt" 	=> date("Y-m-d H:i:s")
					),
					"rank ASC"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Galeri oluşturulurken bir hata oluştu ",
					"type" 		=> "error"
				); 
			}


		}

		

	}

	public function refresh_file_list($gallery_id,$gallery_type,$folder_name)
	{
		$viewData = new stdClass();

		$viewData->viewFolder 	 = $this->viewFolder;
		$viewData->subViewFolder = "image";

		$modelName = ($gallery_type == "image") ? "gallery_image_model" : "gallery_file_model";

		$viewData->items 	 = $this->$modelName->get_all(
			array("gallery_id" => $gallery_id)
		);

		$viewData->gallery_type = $gallery_type;
		$viewData->folder_name = $folder_name;

		$render_html = $this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/file_list",$viewData,true);
		echo $render_html;
	}

	public function fileIsActiveSetter($id,$gallery_type)
	{
		if($id && $gallery_type)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$modelName = ($gallery_type == "image") ? "gallery_image_model" : "gallery_file_model";
			$this->$modelName->update(
				array("id" => $id),
				array("isActive" => $isActive)
			);
		}
	}

	public function fileRankSetter($gallery_type)
	{
		$data = $this->input->post("data");

		parse_str($data,$order);
		$items = $order["order"];
		$modelName = ($gallery_type == "image") ? "gallery_image_model" : "gallery_file_model";
		foreach ($items as $rank => $id) {
			$this->$modelName->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

	public function fileDelete($id,$parent_id,$gallery_type)
	{
		$modelName = ($gallery_type == "image") ? "gallery_image_model" : "gallery_file_model";
		
		$fileName = $this->$modelName->get(
			array("id" => $id)
		);
		
		$delete = $this->$modelName->delete(
			array('id' =>$id)
		);

		if($delete)
		{
			unlink("{$fileName->url}");
			redirect(base_url("gallery/upload_form/{$parent_id}"));
		}
		else
		{
			redirect(base_url("gallery/upload_form/{$parent_id}"));
		}

	}

	public function gallery_video_list($id)
	{
		$gallery = $this->gallery_model->get(
			array("id" => $id)
		);
		$items = $this->gallery_video_model->get_all(
			array(
				"gallery_id" => $id
			),
			"rank ASC"
		);
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "video/list";
		$viewData->items = $items;
		$viewData->gallery = $gallery;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function new_gallery_video_form($gallery_id)
	{
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "video/add";
		$viewData->gallery_id = $gallery_id;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function gallery_video_save($gallery_id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("url","Video Link","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$insert = $this->gallery_video_model->add(
				array(
					"gallery_id" 	=> $gallery_id,
					"url" 			=> $this->input->post("url"),
					"rank"  		=> 0,
					"isActive"  	=> 1,
					"createdAt" 	=> date("Y-m-d H:i:s") 
				)
			);

			if($insert)
			{
				$alert = array(
					"title"		=> "Başarılı",
					"message"   => "Kayıt başarılı bir şekilde eklendi",
					"type" 		=> "success"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Kayıt eklenirken bir hata oluştu",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("gallery/gallery_video_list/{$gallery_id}"));
			die;
		}
		else
		{
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "video/add";
			$viewData->form_error = true;
			$viewData->gallery_id = $gallery_id;

			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function update_gallery_video_form($id)
	{
		$item = $this->gallery_video_model->get(array('id' => $id));
		
		$viewData = new stdClass();

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "video/update";
		$viewData->item = $item;

		$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update_gallery_video($id,$gallery_id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("url","Video Link","required|trim");
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanını doldurmalısınız!"
			)
		);

		$validate = $this->form_validation->run();

		if($validate)
		{
			$update = $this->gallery_video_model->update(
				array('id' => $id),
				array(
					"url" 			=> $this->input->post("url")
				)
			);

			if($update)
			{
				$alert = array(
					"title"		=> "Başarılı",
					"message"   => "Kayıt başarılı bir şekilde güncellendi",
					"type" 		=> "success"
				);
			}
			else
			{
				$alert = array(
					"title"		=> "Başarısız", 
					"message" 	=> "Kayıt güncellenirken bir hata oluştu",
					"type" 		=> "error"
				);
			}
			$this->session->set_flashdata("alert",$alert);
			redirect(base_url("gallery/gallery_video_list/{$gallery_id}"));
		}
		else
		{
			$item = $this->gallery_model->get(array('id' => $id));
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "video/update";
			$viewData->form_error = true;
			$viewData->item = $item;



			$this->load->view("panel/{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function rankGalleryVideoSetter()
	{
		$data = $this->input->post("data");

		parse_str($data,$order);
		$items = $order["order"];
		
		foreach ($items as $rank => $id) {
			$this->gallery_video_model->update(
				array("id" => $id, "rank !=" => $rank),
				array("rank" => $rank)
			);
		}
	}

	public function galleryVideoIsActiveSetter($id)
	{
		if($id)
		{
			$isActive = ($this->input->post("data") === "true") ? 1 : 0;
			$this->gallery_video_model->update(
				array("id" => $id),
				array("isActive" => $isActive)
			);
		}

	}

	public function galleryVideoDelete($id,$gallery_id)
	{
		$delete = $this->gallery_video_model->delete(
			array('id' =>$id)
		);
		if($delete)
		{
			$alert = array(
				"title"		=> "Başarılı",
				"message"   => "Kayıt başarılı bir şekilde silindi",
				"type" 		=> "success"
			);
		}
		else
		{
			$alert = array(
				"title"		=> "Başarısız", 
				"message" 	=> "Kayıt silinirken bir hata oluştu",
				"type" 		=> "error"
			);
		}
		$this->session->set_flashdata("alert",$alert);
		redirect(base_url("gallery/gallery_video_list/{$gallery_id}"));
	}


	

}