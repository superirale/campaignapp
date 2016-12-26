<?php
namespace CampaignApp\Adapters\Contracts;

interface SubscriberCsvInterface {
	public function readCSV($file);
	public function writeCsv($data, $table);

}