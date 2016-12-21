<?php
namespace Campaignapp\Eloquent\Repositories;
use Campaignapp\Repositories\Contracts\Listable;

class ListRepository implements Listable
{
	private $list;

	function __construct(Listable $list)
	{
		$this->list = $list
	}

	public function CreateList($data = [])
	{
		# code...
	}

	public function getList($id)
	{
		# code...
	}

	public function deleteList($id)
	{
		# code...
	}

}