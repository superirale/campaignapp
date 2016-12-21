<?php
namespace Campaignapp\Repositories\Contracts;

interface Listable{
	public function CreateList(array $data);

	public function getList($id);

	public function getLists($brand_id);

	public function deleteList($id);
}