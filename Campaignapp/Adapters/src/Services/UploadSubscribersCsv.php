<?php
namespace CampaignApp\Adapters\Services;
use CampaignApp\Adapters\Contracts\SubscriberCsvInterface;
use \League\Csv\Writer;
use \League\Csv\Reader;

class UploadSubscribersCsv implements SubscriberCsvInterface
{

	public function readCSV($file)
	{
		$csv =  Reader::createFromPath($file);
		return $csv->fetch();
	}


}