<?php
class Contato {
    private $cd_contato;
    private $nm_contato;
    private $nm_telefone;
    private $nm_email;

    public function set_cd_contato($cd_contato)
    {
        $this->cd_contato = $cd_contato;
    }

    public function set_nm_contato($nm_contato)
    {
        $this->nm_contato = $nm_contato;
    }

    public function set_nm_telefone($nm_telefone)
    {
        $this->nm_telefone = $nm_telefone;
    }

    public function set_nm_email($nm_email)
    {
        $this->nm_email = $nm_email;
    }

    public function get_cd_contato()
    {
        return $this->cd_contato;
    }

    public function get_nm_contato()
    {
        return $this->nm_contato;
    }

    public function get_nm_telefone()
    {
        return $this->nm_telefone;
    }

    public function get_nm_email()
    {
        return $this->nm_email;
    }
}
?>