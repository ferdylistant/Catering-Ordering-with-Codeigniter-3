<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
	}
	public function index() {
		$data['gallery'] 	= $this->pelanggan_model->Galeri();
		$data['kategori'] 	= $this->pelanggan_model->GaleriKategori();
		$data['title'] 		= 'Gallery';



		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/gallery/index',$data);
	}

	public function detail () {

		$id = $this->uri->segment(3);

		$data['galeri'] 		= $this->pelanggan_model->GaleriDetail($id);
		$data['title'] = 'Detail Gallery';

		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/galeri_detail',$data);

	}
	public function fetch_data()
	{
		$galeri = strtolower(trim($this->input->post('kategori')));
		$arrInput = explode(" ",$galeri);
		$this->db->order_by('kategori_galeri_id', 'asc');
		$arr = $this->pelanggan_model->AmbilGaleriDariKategori();
		$arrCount = array();
		for($i=0;$i<count($arr);$i++)
		{
			$ktgr =  strtolower($arr[$i]['kategori_galeri_id']);
			$kategori = explode(" ",$ktgr);
			$arrCount[$i]=0;
			//debug($arrQuestion);
			for($j=0;$j<count($arrInput);$j++)
			{
				for($k=0;$k<count($kategori);$k++)
				{
					if($arrInput[$j]==$kategori[$k])
					{
						$arrCount[$i]=$arrCount[$i]+1;
					}
				}
			}
		//$answer   = strtolower($arr[$i]['answer']);
		}
		//debug($arrCount);
		if(array_sum($arrCount)==0)
		{
			echo "Sorry I can't recognize you.Please provide a bit more details";
			exit;
		}
		else
		{
			$max = $arrCount[0];
			$indicate = 0;
			$output ='';
			for($i=1;$i<count($arrCount);$i++)
			{
				if($arrCount[$i]>$max)
				{
					$max = $arrCount[$i];
					$indicate = $i;
				}
				$gambar = $arr[$indicate]['gambar'];
				$nama_galeri = $arr[$indicate]["nama_galeri"];
			}
			$output .= '
			<div class="item-gallery isotope-item bo-rad-10 hov-img-zoom">
			<img src="'.base_url("images/galeri/".$gambar).'" alt="IMG-GALLERY" height="300">
			<span href="#" class="flex-c-m txt1 ab-c-m size4">'.$nama_galeri.'
                </span>
			<div class="overlay-item-gallery trans-0-4 flex-c-m">
			<a class="btn-show-gallery flex-c-m fa fa-search" href="'.base_url("images/galeri/".$gambar).'" data-lightbox="gallery"></a>
			</div>
			</div>';
			echo $output;
			exit;
		}
	}
	public function sem_Gal(){
		$g = $this->pelanggan_model->Galeri();
		$output ='';
		foreach ($g->result_array() as $value) {
			$output .= '
			<div class="item-gallery isotope-item bo-rad-10 hov-img-zoom">
			<img src="'.base_url("images/galeri/".$value['gambar']).'" alt="IMG-GALLERY" height="300">
			<span href="#" class="flex-c-m txt1 ab-c-m size4">'.$value['nama_galeri'].'
                </span>
			<div class="overlay-item-gallery trans-0-4 flex-c-m">
			<a class="btn-show-gallery flex-c-m fa fa-search" href="'.base_url("images/galeri/".$value['gambar']).'" data-lightbox="gallery"></a>
			</div>
			</div>';
			
		}
		echo $output;
	}

	//Akhir Galeri
}

