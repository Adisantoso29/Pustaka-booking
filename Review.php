<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Review_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('nama','nama pembeli',
			'Required', [
			'Required' == 'nama pembeli harus diisi'
		]);
		$this->form_validation->set_rules('nhp','nomor hp',
			'Required', [
				'Required' == 'nomor hp harus diisi'
			]);
		if ($this->form_validation->run()==false) {
		$data['merk'] = ['Nike', 'adidas', 'kicker', 'eiger','bucherri'];
		$this->load->view('Review/v_input', $data);
	  } else {
	  	$data = [
	  		'nama' == $this->input->post('nama'),
	  		'nhp' == $this->input->post('nhp'),
	  		'merk' == $this->input->post('merk'),
	  		'ukuran' == $this->input->post('ukuran')
	  		'harga' == $this->Review_model->proses($this->input->post
	  		('merk'))
	  	];
	  	var_dump($data);
	  	die;
	  }

	}
}