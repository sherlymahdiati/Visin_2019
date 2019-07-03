<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$jsonData='[{"nama":"I\/a","jumlah":"4"},{"nama":"I\/b","jumlah":"11"},{"nama":"I\/c","jumlah":"52"},{"nama":"I\/d","jumlah":"21"},{"nama":"II\/a","jumlah":"187"},{"nama":"II\/b","jumlah":"83"},{"nama":"II\/c","jumlah":"391"},{"nama":"II\/d","jumlah":"228"},{"nama":"III\/a","jumlah":"442"},{"nama":"III\/b","jumlah":"946"},{"nama":"III\/c","jumlah":"476"},{"nama":"III\/d","jumlah":"589"},{"nama":"IV\/a","jumlah":"1432"},{"nama":"IV\/b","jumlah":"118"},{"nama":"IV\/c","jumlah":"41"},{"nama":"IV\/d","jumlah":"5"},{"nama":"IV\/e","jumlah":"3"}]';

		$jsonData2='[{"tahun":"2010","val":0},{"tahun":"2011","val":0},{"tahun":"2012","val":0},{"tahun":"2013","val":0},{"tahun":"2014","val":0},{"tahun":"2015","val":0},{"tahun":"2016","val":"52943.00"},{"tahun":"2017","val":"54760.00"},{"tahun":"2018","val":0}]';

		$jumlahPangkat=json_decode($jsonData);
		$grafik_data=[];
		foreach($jumlahPangkat as $row)
		{
			$dt=array($row->nama,intval($row->jumlah));
			array_push($grafik_data, $dt);
		}

		$jsonData2Array=json_decode($jsonData2);

		$grafik_data2=[];
		foreach($jsonData2Array as $row)
		{
			$dt=array($row->tahun,intval($row->val));
			array_push($grafik_data2, $dt);
		}

		$title='Grafik Data Persentase Jomblo di UAD';		

		$data['grafik_data']=json_encode($grafik_data2);
		$data['title']=$title;
		$this->load->view('chart',$data);
	}

	function grafik()
	{ 
		$chartData1 = file_get_contents('assets/sapi.json');
		$chartData2 = file_get_contents('assets/perbedaanrasboiler.json');
		$chartData3 = file_get_contents('assets/hargasapidaerah.json');
		$chartData4 = file_get_contents('assets/hargaayamrasdaerah.json');
		$chartData5 = file_get_contents('assets/hargaayamboilerdaerah.json');
		$chartData6 = file_get_contents('assets/hargatelorrasdaerah.json');
		$chartData1=json_decode($chartData1);
		$chartData2=json_decode($chartData2);
		$chartData3=json_decode($chartData3);
		$chartData4=json_decode($chartData4);
		$chartData5=json_decode($chartData5);
		$chartData6=json_decode($chartData6);


		// Bar chart 1
		$res1=array();
		foreach($chartData1 as $row)
		{
		
			$dat1=[$row->tahun, (double)$row->hRata];
			array_push($res1, $dat1);
		}
		//echo json_encode($res);
		$data['BarChartData1']=json_encode($res1);
		$data['BarCharTitle1']='Penjualan Harga Daging Sapi tahun 2012 - 2016';
		//$this->load->view('grafik', $data);



		// Bar Chart 2
		$res2=[array('Tahun','Ayam Ras', 'Ayam Boiler')];
		foreach($chartData2 as $row)
		{
		
			$dat2=[$row->tahun, (double)$row->aRas, (double)$row->aBoi];
			array_push($res2, $dat2);
		}
		//echo json_encode($res2);
		$data['BarChartData2']=json_encode($res2);
		$data['BarCharTitle2']='Perbandingan Harga Daging Ayam Ras dan Daging Ayam Boiler tahun 2012 - 2016';


		// Bar Chart 3
		$res3=array();
		foreach($chartData3 as $row)
		{
		
			$dat3=[$row->nDa, (double)$row->dSapi];
			array_push($res3, $dat3);
		}
		//echo json_encode($res2);
		$data['BarChartData3']=json_encode($res3);
		$data['BarCharTitle3']='Harga Rata-Rata Daging Sapi Tiap Daerah Tahun 2012 - 2016';

		// Bar Chart 4
		$res4=array();
		foreach($chartData4 as $row)
		{
		
			$dat4=[$row->nDa, (double)$row->aRas1];
			array_push($res4, $dat4);
		}
		//echo json_encode($res2);
		$data['BarChartData4']=json_encode($res4);
		$data['BarCharTitle4']='Harga Rata-Rata Daging Ayam Ras Tiap Daerah Tahun 2012 - 2016';


		// Bar Chart 5
		$res5=array();
		foreach($chartData5 as $row)
		{
		
			$dat5=[$row->nDa, (double)$row->aBoi];
			array_push($res5, $dat5);
		}
		//echo json_encode($res2);
		$data['BarChartData5']=json_encode($res5);
		$data['BarCharTitle5']='Harga Rata-Rata Daging Ayam Boiler Tiap Daerah Tahun 2012 - 2016';

		//Bar Chart 6
		// Bar Chart 5
		$res6=array();
		foreach($chartData6 as $row)
		{
		
			$dat6=[$row->nDa, (double)$row->tRas];
			array_push($res6, $dat6);
		}
		//echo json_encode($res2);
		$data['BarChartData6']=json_encode($res6);
		$data['BarCharTitle6']='Harga Rata-Rata Telor Ayam Ras Tiap Daerah Tahun 2012 - 2016';
		
		//View
		$this->load->view('grafik', $data);
	}
}
