<?php

// This is the databases connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL databases
	
	'connectionString' => 'mysql:host=localhost;dbname=db_books',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',

	// âêëþ÷àåì ïðîôàéëåð
	'enableProfiling' => YII_DEBUG,
	// ïîêàçûâàåì çíà÷åíèÿ ïàðàìåòðîâ
	'enableParamLogging' => YII_DEBUG,
	
);