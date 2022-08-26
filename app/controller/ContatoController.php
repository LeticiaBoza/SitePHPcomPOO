<?php
include_once "../connection/connection.php";
include_once "../model/Contato.php";
include_once "../dao/ContatoDAO.php";

//Instanciando as classes
$contato = new Contato();
$contatoDAO = new ContatoDAO();

//Pega todos os dados via POST
$data = filter_input_array(INPUT_POST);

//Condições
//Se a requisição for de cadastro
if (isset($_POST['cadastrar']))
{
    $contato->set_nm_contato($data['nome']);
    $contato->set_nm_telefone($data['telefone']);
    $contato->set_nm_email($data['email']);

    $contatoDAO->create($contato);

    header("Location: ../../");
}

//Se a requisição for de atualização
if (isset($_POST['editar']))
{
    $contato->set_nm_contato($data['nome']);
    $contato->set_nm_telefone($data['telefone']);
    $contato->set_nm_email($data['email']);
    $contato->set_cd_contato($data['id']);

    $contatoDAO->update($contato);

    header("Location: ../../");
}

//Se a requisição for de exclusão
if (isset($_GET['del']))
{
    $contato->set_cd_contato($_GET['del']);

    $contatoDAO->delete($contato);

    header("Location: ../../");
}
?>