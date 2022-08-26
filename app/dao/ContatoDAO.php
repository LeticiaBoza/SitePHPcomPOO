<?php
class ContatoDAO {
    public function create(Contato $contato)
    {
        try
        {
            $sql = "INSERT INTO contato(nm_contato, nm_telefone, nm_email) VALUES(:nome, :telefone, :email)";

            $p_sql = Connection::getConnection()->prepare($sql);
            $p_sql->bindValue(":nome", $contato->get_nm_contato());
            $p_sql->bindValue(":telefone", $contato->get_nm_telefone());
            $p_sql->bindValue(":email", $contato->get_nm_email());

            return $p_sql->execute();
        }
        catch(Exception $e)
        {
            echo "Falha ao inserir contato: " . $e->getMessage();
        }
    }

    public function update(Contato $contato)
    {
        try
        {
            $sql = "UPDATE contato SET nm_contato = :nome, nm_telefone = :telefone, nm_email = :email WHERE cd_contato = :id";

            $p_sql = Connection::getConnection()->prepare($sql);
            $p_sql->bindValue(":nome", $contato->get_nm_contato());
            $p_sql->bindValue(":telefone", $contato->get_nm_telefone());
            $p_sql->bindValue(":email", $contato->get_nm_email());
            $p_sql->bindValue(":id", $contato->get_cd_contato());

            return $p_sql->execute();
        }
        catch(Exception $e)
        {
            echo "Falha ao atualizar contato: " . $e->getMessage();
        }
    }

    public function delete(Contato $contato)
    {
        try
        {
            $sql = "DELETE FROM contato WHERE cd_contato = :id";

            $p_sql = Connection::getConnection()->prepare($sql);
            $p_sql->bindValue(":id", $contato->get_cd_contato());

            return $p_sql->execute();
        }
        catch(Exception $e)
        {
            echo "Falha ao deletar contato: " . $e->getMessage();
        }
    }

    public function listContato($row)
    {
        $contato = new Contato();
        $contato->set_cd_contato($row['cd_contato']);
        $contato->set_nm_contato($row['nm_contato']);
        $contato->set_nm_telefone($row['nm_telefone']);
        $contato->set_nm_email($row['nm_email']);

        return $contato;
    }

    public function read()
    {
        try
        {
            $sql = "SELECT * FROM contato ORDER BY cd_contato ASC";
            $result = Connection::getConnection()->query($sql);
            $list = $result->fetchAll(PDO::FETCH_ASSOC);
            $list_array = array();
            foreach ($list as $reg)
            {
                $list_array[] = $this->listContato($reg);
            }

            return $list_array;
        }
        catch(Exception $e)
        {
            echo "Falha ao buscar todos os contatos: " . $e->getMessage();
        }
    }
}
?>