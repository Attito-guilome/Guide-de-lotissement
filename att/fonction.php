<?php 
class Http
{
    protected $tab=array();
    public function __construct()
    {
        $this->tab=$_REQUEST;

    }
    public function __get($key)
    {
        return $this->tab[$key];
    }
    public function __set($key,$valeur)
    {
        $this->tab[$key]=$valeur;
    }
    public function nombre()
    {
        return count($this->tab);
    }
    public function faire(closure $closure)
    {
        $closure($this->tab);
    }
}