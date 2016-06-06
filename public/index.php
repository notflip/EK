<?php
require '../vendor/autoload.php';
require '../data/players.php';
date_default_timezone_set('Europe/Paris');

use Notflip\Ek\Parsers\Json\MatchParser;
use Carbon\Carbon;

//$teamParser = new TeamParser();
$matchParser = new MatchParser();
try {
    //$teams = $teamParser->parse('http://api.football-data.org/v1/soccerseasons/424/teams');
    //$matches = $matchParser->parse('http://api.football-data.org/v1/soccerseasons/424/fixtures');
    $matches = $matchParser->parse('data.json');
} catch(JsonException $e) {
    die($e->getMessage());
}
?>
<html>
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/jquery-1.10.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <?php foreach($matches as $day => $match) : ?>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Matchdag <?php echo $day ?></div>
                        <ul class="list-group">
                            <?php foreach($match as $m) : ?>
                                <li class="list-group-item">
                                    <i class="glyphicon glyphicon-ok glyphicon-color-green"></i>

                                    <?php echo $m->getHometeam() ?> - <?php echo $m->getAwayteam() ?>

                                    <?php if(isset($players[$m->getCode()])) : ?>
                                        <span class="pull-right">
                                        <?php foreach($players[$m->getCode()] as $player => $score) : ?>
                                            <span class="label label-primary"><i class="glyphicon glyphicon-user"></i><?php echo ucwords($player) ?> <?php echo $score ?></span>
                                        <?php endforeach ?>
                                        </span>
                                    <?php endif ?>

                                    <div class="meta">
                                        <h3><?php echo $m->getResult() ?> <span class="pull-right"><?php echo new Carbon($m->getDate()) ?></span></h3>
                                    </div>

                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>

</body>
</html>