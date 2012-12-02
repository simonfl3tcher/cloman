<?php 
	
	class Misc extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function get_all_faqs(){
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->order_by('faq_id', 'desc');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_single_faq($id){
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->where('faq_id', $id);
			$query = $this->db->get();
			return $query->row_array();
		}

		public function update_faq($id){
			$data = array(
				'question' => $_POST['faq']['Question'],
				'explanation' => $_POST['faq']['Answer'],
				'verified' => 'Y',
				'disabled' => $_POST['faq']['Status'] 
			);
			$this->db->where('faq_id', $id);
			$this->db->update('faq', $data);
		}

		public function update_document($id, $image, $doc){
			$data = array(
				'title' => $_POST['document']['Title'],
				'description' => $_POST['document']['Description'],
				'is_live' => $_POST['document']['Status']
			);

			if(!empty($image)){
				$data['image'] = $image;
			}
			if(!empty($doc)){
				$data['file_name'] = $doc;
			}

			$this->db->where('document_id', $id);
			$this->db->update('documents', $data);
		}

		public function add_document($image, $doc){
			$data = array(
				'title' => $_POST['document']['Title'],
				'description' => $_POST['document']['Description'],
				'is_live' => $_POST['document']['Status'],
				'image' => $image,
				'file_name' => $doc
			);
			$this->db->insert('documents', $data);
		}

		public function get_all_documents(){
			$this->db->select('*');
			$this->db->from('documents');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_single_document($id){
			$this->db->select('*');
			$this->db->from('documents');
			$this->db->where('document_id', $id);
			$query = $this->db->get();
			return $query->row_array();
		}
	}