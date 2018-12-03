<?php
require_once '../init.php';

// Create
db()->Messages->insertOne([
    'text'=>"salam mahshid",
    'from'=>"57721c9d749d5a2829218e21",
    'to'=>"57722391749d5a2829218e25",
]);

db()->Messages->insertOne([
    'text'=>"salam farehe",
    'from'=>"57721c9d749d5a2829218e21",
    'to'=>"57722391749d5a2829218e25",
]);

db()->Messages->insertOne([
    'text'=>"gomshp",
    'from'=>"57722391749d5a2829218e25",
    'to'=>"57721c9d749d5a2829218e21",
]);

db()->Messages->insertOne([
    'text'=>"love you",
    'from'=>"57721c9d749d5a2829218e21",
    'to'=>"57722391749d5a2829218e25",
]);
?>


