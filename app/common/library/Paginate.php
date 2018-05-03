<?php
namespace Moet\Library;

use Phalcon\Paginator\Adapter\Model as PaginatorModel;
/**
* class Paginate
* extends Phalcon\Paginator\Adapter\Model
*/
class Paginate extends PaginatorModel
{
	protected $page_size;
	protected $node_start;
	protected $node_end;

	public function __construct($config=[])
	{
		parent::__construct($config);
		$this->page_size = array_key_exists('size', $this->_config) ? $this->_config['size'] : 5;
		$this->node_start = ($this->_page-1) % $this->page_size == 0 ? $this->_page : (int)(($this->_page-1)/$this->page_size) * $this->page_size + 1;
		$this->node_end   = $this->node_start + $this->page_size - 1;
	}

	public function getPaginate(){
		$page = parent::getPaginate();

		$page_ranger = [];
		foreach(range($this->node_start, $this->node_end) as $i){
			array_push($page_ranger, $i == $this->_page ? ['page'=>$i,'next'=>false] : ['page'=>$i,'next'=>true]);
			if($i >= $page->last){
				break;
			}
		}
		$page->page_ranger = $page_ranger;

		return $page;
	}
}