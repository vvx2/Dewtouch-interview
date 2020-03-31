<?php
	class RecordController extends AppController{




		public $components = array('DataTable');

		public function index(){
			if($this->RequestHandler->responseType() == 'json') {
				$this->paginate = array(
					'fields' => array('id', 'name'),
					'link' => array(
						'State' => array(
							'fields' => array('id','name')
						)
					)
				);
				$this->DataTable->mDataProp = true;
				$this->set('response', $this->DataTable->getResponse());
				$this->set('_serialize','response');
			}
		}

		public function containable(){
			if($this->RequestHandler->responseType() == 'json') {
				$this->paginate = array(
					'fields' => array('id', 'name'),
					'contain' => array(
						'State' => array(
							'fields' => array('id','name')
						)
					)
				);
				
				$this->DataTable->mDataProp = true;
				$this->set('response', $this->DataTable->getResponse());
				$this->set('_serialize','response');
			}
		}
		
		public function concat(){
			if($this->RequestHandler->responseType() == 'json') {
				$this->paginate = array(
					'fields' => array('Record.id', 'CONCAT(Record.name) as together'),
					'link' => array(
						'State' => array(
							'fields' => array('id','name')
						)
					)
				);
				
				$this->DataTable->mDataProp = true;
				$this->set('response', $this->DataTable->getResponse());
				$this->set('_serialize','response');
			}
		}
		
		public function virtualFields(){
			if($this->RequestHandler->responseType() == 'json') {
				
				$this->Record->virtualFields = array(
					'together' => 'CONCAT(Record.name)'
				);
				
				$this->paginate = array(
					'fields' => array('id','together'),
					'link' => array(
						'State' => array(
							'fields' => array('id','name')
						)
					)
				);
				
				$this->DataTable->mDataProp = true;
				$this->set('response', $this->DataTable->getResponse());
				$this->set('_serialize','response');
			}
		}
		
		public function noJsonHandler(){
			if($this->request->is('ajax')){
				$this->autoRender = false;
				$this->paginate = array(
					'fields' => array('id', 'name'),
					'link' => array(
						'State' => array(
							'fields' => array('name')
						)
					)
				);
	
				$this->DataTable->mDataProp = true;
				echo json_encode($this->DataTable->getResponse());
			}
		}
		
		// public function index(){
		// 	ini_set('memory_limit','256M');
		// 	set_time_limit(0);
			
		// 	$this->setFlash('Listing Record page too slow, try to optimize it.');
			
			
		// 	$records = $this->Record->find('all');
			
		// 	$this->set('records',$records);
			
			
		// 	$this->set('title',__('List Record'));
		// }
			
		
// 		public function update(){
// 			ini_set('memory_limit','256M');
			
// 			$records = array();
// 			for($i=1; $i<= 1000; $i++){
// 				$record = array(
// 					'Record'=>array(
// 						'name'=>"Record $i"
// 					)			
// 				);
				
// 				for($j=1;$j<=rand(4,8);$j++){
// 					@$record['RecordItem'][] = array(
// 						'name'=>"Record Item $j"		
// 					);
// 				}
				
// 				$this->Record->saveAssociated($record);
// 			}
			
			
			
// 		}
	}