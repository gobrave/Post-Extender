<?php namespace GoBrave\PostExtender\DataTypes;

use GoBrave\PostExtender\Helpers\CaseConverter;
use GoBrave\PostExtender\DataTypeInterface;

class Related implements DataTypeInterface
{
  private $id;
  private $wp;
  private $namespace;

  public function __construct($id, \GoBrave\Util\IWP $wp, $namespace = '') {
    $this->id        = $id;
    $this->wp        = $wp;
    $this->namespace = trim($namespace, '\\');
  }

  public function __toString() {
    return (string)$this->raw();
  }

  public function raw() {
    return $this->id;
  }

  public function get() {
    $post  = $this->wp->get_post($this->id);
    if($post){
      $class = implode('\\', [$this->namespace, CaseConverter::snakeToCamel($post->post_type, true)]);
      return $class::extend($post);
    }
    return null;
  }
}
