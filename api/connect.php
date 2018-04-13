<?php
$m = new MongoClient();
$db = $m->formq;
$collection = new MongoCollection($db, 'users');
