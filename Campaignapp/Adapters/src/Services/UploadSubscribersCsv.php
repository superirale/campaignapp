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

	public function writeCsv($data, $table)
	{
		$csv = Writer::createFromFileObject(new \SplTempFileObject());
		$csv->insertOne(\Schema::getColumnListing("$table"));
		$csv->insertAll($data);

		$filename = date('Y-m-d h:i:s').".csv";
		return $csv->output($filename);
	}

}