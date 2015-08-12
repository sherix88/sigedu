<?php
class CentrosController extends AppController {

	var $name = 'Centros';
    var $paginate = array('Centro' => array('limit' => 4, 'order' => 'Centro.id DESC'));
		
	function index() {
		$this->Centro->recursive = 0;
		
		$activeLetter = isset($this->params['named']['letter']) ? $this->params['named']['letter']: '';
		$letters = array('A','B','C','D','E','F','G','H',
						 'I','J','K','L','M','N','O','P',
						 'Q','R','S','T','U','V','W','X','Y','Z');
		
		$centros = isset($activeLetter)? $this->paginate('Centro', array('Centro.ciudad LIKE ' => $activeLetter.'%')) : $this->paginate();
		$urlArgs = array('url' => $this->params['named']);
		
		$this->set(compact('centros','letters','activeLetter','urlArgs'));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Centro no valido', 'default', array('class'=>'warning'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('centro', $this->Centro->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Centro->create();
			if ($this->Centro->save($this->data)) {
				$this->Session->setFlash('El centro ha sido grabado', 'default', array('class'=>'succes'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El centro no fue grabado. Intentelo nuevamente.', 'default', array('class'=>'error'));
			  }
		}
		$empleados = $this->Centro->Empleado->find('list', array('fields'=>array('id', 'nombre_completo_empleado')));
		$this->set(compact('empleados'));
	}

		
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Centro no valido', 'default', array('class'=>'warning'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Centro->save($this->data)) {
				$this->Session->setFlash('El centro ha sido grabado', 'default', array('class'=>'succes'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El centro no fue grabado. Intentelo nuevamente.', 'default', array('class'=>'error'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Centro->read(null, $id);
		}
		$empleados = $this->Centro->Empleado->find('list');
		$this->set(compact('empleados'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('id no valido para centro', 'default', array('class'=>'notice'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Centro->delete($id)) {
			$this->Session->setFlash('El centro ha sido borrado', 'default', array('class'=>'success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('El centro no fue borrado. Intentelo nuevamente.', 'default', array('class'=>'warnings'));
		$this->redirect(array('action' => 'index'));
	}
	
	function imprimir($id = null) {
	
	    $this->idEmpty($id,'index');
		$centro = $this->Centro->read(null, $id);
	    $this->__createCentroPDF($centro);
	}
	
	// metodos privados.
	
	function __createCentroPDF($centro)
	{
		App::import(null,null,true,array(),'vendors/tcpdf/examples/example_001',false);
		Configure::write('debug',0);
        $this->layout = 'pdf'; /* esto utilizara el layout 'pdf.ctp' */
        /* Operaciones que deseamos realizar y variables que pasaremos a la vista. */
        $this->render();
	}
			
}
?>