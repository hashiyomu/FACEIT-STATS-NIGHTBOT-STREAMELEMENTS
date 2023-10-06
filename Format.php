<?php
	$PlayerName;
	if(isset($_GET['player_id']))
		$PlayerName = $_GET['player_id'];
	else
    {
        echo "Вы должны передать параметр player_id, чтобы получить статистику игрока - ";
        echo "You have to provide parameter player_id to get player stats. Example: http://f0669984.xsph.ru/api.php?player_id=friberg";
        return;
    }
	$Result = file_get_contents('https://api.satont.ru/faceit?nick=' . $PlayerName);
	if($Result == false)
	{
	    echo "Сервер не вернул ответ. Повторите попытку позже. - ";
	    echo "Server did not returned an answer. Please try again later.";
	    return;
	}
//	echo $Result;
	$Object = json_decode($Result, true);
	if(!isset($Object["elo"]))
	{
	    echo "Не удалось получить статистику игрока CS2. - ";
		echo 'Failed to get player stats CS2. Example: http://f0669984.xsph.ru/api.php?player_id=friberg';
		return;
	}
	$IsPlaying = $Object['currentMatch']['gain'] && $Object['currentMatch']['lose'];
	if(!isset($_GET['noprefix']))
	    echo '[CS2] ';
	echo 'Elo: ' . $Object['elo'] . '. Today: '. 
	    $Object['latestMatchesTrend']['score']['wins'] . 'W, ' . 
	    $Object['latestMatchesTrend']['score']['loses'] . 'L, ' .
	    'total: ' . $Object['todayEloDiff'] . '. ';
    $Matches = $Object['latestMatchesTrend']['simple'];
    if($Matches)
        echo "Last matches: " . $Matches . ". ";
	$Winstreak = $Object['stats']['lifetime']['Current Win Streak'];
	if($Winstreak != 0)
	    echo "Current winstreak: " . $Winstreak . ". ";
	if($IsPlaying == true)
		echo "Current match: +" . $Object['currentMatch']['gain']  . "/" . 
		    $Object['currentMatch']['lose'] . ".";
?>
