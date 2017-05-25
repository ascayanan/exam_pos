<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_m','product');
	}

	/*Loads helper and view*/
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('product_view');
	}
	public function pos()
	{

		$this->load->view('pos_view');
	}

	public function ajax_list()
	{
		$list = $this->product->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $product) {
			$no++;
			$row = array();
			$row[] = $product->prodName;
			$row[] = $product->prodCode;
			$row[] = $product->prodPrice;
			$row[] = $product->prodQuan;

			//add html for action
			$row[] = '<center><a class="btn btn-sm btn-info" href="javascript:void(0)" title="Add to cart" onclick="add_to_cart('."'".$product->id."'".')"><i class="glyphicon glyphicon-shopping-cart"></i></a>
			<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Edit" onclick="edit_product('."'".$product->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_product('."'".$product->id."'".')"><i class="glyphicon glyphicon-trash"></i></a></center>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->product->count_all(),
						"recordsFiltered" => $this->product->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function cart_list()
	{
		$list = $this->product->get_datatables2();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $product) {
			$no++;
			$row = array();
			$row[] = $product->prodName;
			$row[] = $product->prodPrice;
			$row[] = $product->prodQuan;
			$row[] = $product->prodAmount;

			//add html for action
			
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->product->count_all(),
						"recordsFiltered" => $this->product->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	/*Edit Data*/
	public function ajax_edit($id)
	{
		$data = $this->product->get_by_id($id);
		echo json_encode($data);
	}

	/*Add Data*/
	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'prodName' => $this->input->post('prodName'),
				'prodCode' => $this->input->post('prodCode'),
				'prodPrice' => $this->input->post('prodPrice'),
				'prodQuan' => $this->input->post('prodQuan'),
			);
		$insert = $this->product->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function add_cart()
	{
		
		$data = array(
				'prodName' => $this->input->post('prodNamemod'),
				'prodPrice' => $this->input->post('prodPricemod'),
				'prodQuan' => $this->input->post('modQuanmod'),
				'prodAmount' => $this->input->post('prodAmountmod'),
			);
		$insert = $this->product->savepos($data);
		echo json_encode(array("status" => TRUE));
	}

	/*Update Data*/
	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'prodName' => $this->input->post('prodName'),
				'prodCode' => $this->input->post('prodCode'),
				'prodPrice' => $this->input->post('prodPrice'),
				'prodQuan' => $this->input->post('prodQuan'),
			);
		$this->product->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	/*Delete Data*/
	public function ajax_delete($id)
	{
		$this->product->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	
	/*Input Validation*/
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;
		if($this->input->post('prodName') == '')
		{
			$data['inputerror'][] = 'prodName';
			$data['error_string'][] = 'Product name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('prodCode') == '')
		{
			$data['inputerror'][] = 'prodCode';
			$data['error_string'][] = 'Product Code is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('prodPrice') == '')
		{
			$data['inputerror'][] = 'prodPrice';
			$data['error_string'][] = 'Product Price is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('prodPrice') == 0)
		{
			$data['inputerror'][] = 'prodPrice';
			$data['error_string'][] = 'Product Price cannot be 0';
			$data['status'] = FALSE;
		}


		
		if($this->input->post('prodQuan') == '')
		{
			$data['inputerror'][] = 'prodQuan';
			$data['error_string'][] = 'Product Quantity is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('prodQuan') == 0)
		{
			$data['inputerror'][] = 'prodQuan';
			$data['error_string'][] = 'Product Quantity cannot be 0';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
