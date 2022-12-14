<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
require_once('../model/MovEquipVisitTercDAO.class.php');
/**
 * Description of MovVeicVisitTercCTR
 *
 * @author anderson
 */
class MovVeicVisitTercCTR {
    
    public function salvarMovVeicVisitTerc($info) {

        $dados = $info['dado'];

        $jsonObjEquipVisitTerc = json_decode($dados);

        $dadosEquipVisitTercDAO = $jsonObjEquipVisitTerc->movequipvisitterc;

        return $this->salvarMovEquipVisitTerc($dadosEquipVisitTercDAO);

    }
    
    private function salvarMovEquipVisitTerc($dadosMovEquipVisitTerc) {
        
        $movEquipVisitTercDAO = new MovEquipVisitTercDAO();
        $idMovEquipVisitTercArray = array();
        
        foreach ($dadosMovEquipVisitTerc as $movEquipVisitTerc) {
            $v = $movEquipVisitTercDAO->verifMovEquip($movEquipVisitTerc);
            if ($v == 0) {
                $movEquipVisitTercDAO->insMovEquip($movEquipVisitTerc);
            }
            $idMovEquipVisitTercArray[] = array("idMovEquipVisitTerc" => $movEquipVisitTerc->idMovEquipVisitTerc);
        }
                
        $dadoMovEquipVisitTerc = array("movequipvisitterc"=>$idMovEquipVisitTercArray);
        $retMovEquipVisitTerc = json_encode($dadoMovEquipVisitTerc);
        
        return 'MOVEQUIPVISITTERC_' . $retMovEquipVisitTerc;
    }
 
}
