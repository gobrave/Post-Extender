<?php

namespace GoBrave\PostExtender;

class Config
{
  private $files_url;
  private $files_dir;
  private $struct_dir;
  private $namespace;

  public function __construct($settings = []) {
    if(count($settings) > 0) {
      foreach($this as $key => $value) {
        if(isset($settings[$key])) {
          $this->{$key} = $settings[$key];
        }
      }
    }
  }

  public function setFilesUrl($files_url) {
    $this->files_url = $files_url;
  }

  public function getFilesUrl() {
    return $this->files_url;
  }

  public function setFilesDir($files_dir) {
    $this->files_dir = $files_dir;
  }

  public function getFilesDir() {
    return $this->files_dir;
  }

  public function setStructDir($struct_dir) {
    $this->struct_dir = $struct_dir;
  }

  public function getStructDir() {
    return $this->struct_dir;
  }

  public function setNamespace($namespace) {
    $this->namespace = $namespace;
  }

  public function getNamespace() {
    return $this->namespace;
  }
}
