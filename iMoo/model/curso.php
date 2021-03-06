<?php

class Curso
{
    public function salvar()
    {	
    	$data = Helper_Auth::get_data($_POST['pack']);

		$dao = new Dao_Curso();

		return $dao->insert( $data['nome'], $data['id_professor'] );
		
	}

	public function atualizar(){
		
		$data = Helper_Auth::get_data($_POST['pack']);

		$dao = new Dao_Curso();
			
		if(!$dao->curso_existe($data["id"])){
			return $this->salvar();
		} else {
			return $dao->update( $data['id'], $data['nome'], $data['id_professor']);
		}
	}


	public function excluir()
	{	
		$data = Helper_Auth::get_data($_POST['pack']);

		$dao = new Dao_Curso();

		return $dao->delete($data['id']);		
	}

	public function matricular(){
	
		$results = array();

		$data = Helper_Auth::get_data($_POST['pack']);
		$dao = new Dao_Curso();

		/*foreach ($id_alunos as $key => $value) {
			$results[$key] = $dao->setStudent($data['id_curso'], $value);
			$results[$key]['id'] = $value;
		}*/

		return  $dao->setStudent($data['id_turma'], $data['id_aluno']);

		//return array('results' => array('id_curso' => $data['id_curso'], 'id_alunos' => $results));
	}

	function desassociar_professor(){
		
		$dao = new Dao_Curso();
		$data = Helper_Auth::get_data($_POST['pack']);

		return $dao->desassociar_professor($data['id_curso'], $data['id_professor']);

	}

	function desmatricular(){
		
		$dao = new Dao_Curso();
		$data = Helper_Auth::get_data($_POST['pack']);

		return $dao->desmatricular($data['id_curso'], $data['id_aluno']);

	}

}

