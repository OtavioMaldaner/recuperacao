<?php

class Livro implements ActiveRecord{

    private int $idLivro;
    
    public function __construct(
        private string $titulo,
        private string $autor,
        private string $status
        ){
    }

    public function setIdLivro(int $idLivro):void{
        $this->idLivro = $idLivro;
    }

    public function getIdLivro():int{
        return $this->idLivro;
    }

    public function setTitulo(string $titulo):void{
        $this->titulo = $titulo;
    }

    public function getTitulo():string{
        return $this->titulo;
    }

    public function setAutor(string $autor):void{
        $this->autor = $autor;
    }

    public function getAutor():string{
        return $this->autor;
    }
    
    public function setStatus(string $status):void{
        $this->status = $status;
    }

    public function getStatus():int{
        return $this->status;
    }

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->idLivro)){
            $sql = "UPDATE livros SET titulo = '{$this->titulo}' ,autoras = '{$this->autor}',status = '{$this->status}' WHERE id = {$this->idLivro}";
        }else{
            $sql = "INSERT INTO livros (titulo,autoras,status) VALUES ('{$this->titulo}','{$this->autor}','{$this->status}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM livros WHERE id = {$this->idLivro}";
        return $conexao->executa($sql);
    }

    public static function find($idLivro):Livro{
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros WHERE id = {$idLivro}";
        $resultado = $conexao->consulta($sql);
        $l = new Livro($resultado[0]['titulo'],$resultado[0]['autoras'],$resultado[0]['status']);
        $l->setIdLivro($resultado[0]['id']);
        return $l;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros";
        $resultados = $conexao->consulta($sql);
        $livros = array();
        foreach($resultados as $resultado){
            $l = new Livro($resultado['titulo'],$resultado['autoras'], $resultado['status']);
            $l->setIdLivro($resultado['id']);
            $livros[] = $l;
        }
        return $livros;
    }
    public static function livrosLidos():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros WHERE status = 1;";
        $resultados = $conexao->consulta($sql);
        $livros = array();
        foreach($resultados as $resultado){
            $l = new Livro($resultado['titulo'],$resultado['autoras'], $resultado['status']);
            $l->setIdLivro($resultado['id']);
            $livros[] = $l;
        }
        return $livros;
    }
    public static function livrosNaoLidos():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros WHERE status = 0;";
        $resultados = $conexao->consulta($sql);
        $livros = array();
        foreach($resultados as $resultado){
            $l = new Livro($resultado['titulo'],$resultado['autoras'], $resultado['status']);
            $l->setIdLivro($resultado['id']);
            $livros[] = $l;
        }
        return $livros;
    }
}
