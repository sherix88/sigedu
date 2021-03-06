<?php
class Curso extends AppModel {
	var $name = 'Curso';
        var $displayField = 'division';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Centro' => array(
			'className' => 'Centro',
			'foreignKey' => 'centro_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Orientacion' => array(
			'className' => 'Orientacion',
			'foreignKey' => 'orientacion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modalidad' => array(
			'className' => 'Modalidad',
			'foreignKey' => 'modalidad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		/*'Cargo' => array(
			'className' => 'Cargo',
			'foreignKey' => 'curso_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'Materia' => array(
			'className' => 'Materia',
			'foreignKey' => 'curso_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    var $hasAndBelongsToMany = array(
		'Ciclo' => array(
			'className' => 'Ciclo',
			'joinTable' => 'ciclos_cursos',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'ciclo_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

    //Validaciones

        var $validate = array(
                   'anio' => array(
                           'allowedChoice' => array(
                           'rule' => 'numeric',
                           'allowEmpty' => false,
                           'message' => 'Indicar una opcion.'
                           )
                   ),
                   'division' => array(
                           'allowedChoice' => array(
                           'rule' => array('maxLength',11),
                           'allowEmpty' => false,
                           'message' => 'Indicar una opcion.'
                           ),
						   'isUnique' => array(
	                       'rule' => 'isUnique',
	                       'message' => 'Este nombre de curso esta siendo usado.'
	                     )
                   ),
                   'turno' => array(
                           'allowedChoice' => array(
                           'rule' => array('maxLength',10),
                           'allowEmpty' => false,
                           'message' => 'Indicar una opcion.'
                           )
                   ),
                   'aulaNro' => array(
                           'allowedChoice' => array(
                           'rule' => 'numeric',
                           'allowEmpty' => false,
                           'message' => 'Indicar una opcion.'
                           )
                   ),
                   'observacion' => array(
                           'allowedChoice' => array(
                           'rule' => array('minLength',5),
                           'allowEmpty' => true,
                           'message' => 'Indicar una breve observacion.'
                            )
                   ),
              
     );

}
?>