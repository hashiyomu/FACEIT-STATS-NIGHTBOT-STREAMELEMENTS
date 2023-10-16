# FACEIT-STATS
Contact me for questions: https://t.me/hashiyomu
<h1> Ways to get elo and other stats for StreamElements, Nightbot or other purposes. </h1>

CS2 released out and many streamers have question about !elo command for their chat bots.

Ways to get stats.
1) Satont API (https://api.satont.ru/).
It works for FACEIT CS2 stats already. API returns JSON response.

Example: https://api.satont.ru/faceit?nick=s1mple.

<h2> Nightbot</h2>
For Nightbot you can deserialize JSON by its own deserializer. 
Examples: <br>

><h5>$(eval const api = $(urlfetch json https://api.satont.ru/faceit?nick=s1mple); if (!api.elo) {'Failed to get stats'} else { 'CS2 Elo: ' + api.elo + '.'})</h5>

![image](https://github.com/hashiyomu/FACEIT-ELO-PARSER/assets/119516076/29aaa889-9df2-46a6-ab1e-3e53a0d91980)

><h5>$(eval const api = $(urlfetch json https://api.satont.ru/faceit?nick=s1mple); if (!api.elo) {'Failed to get stats'} else { 'CS2 Elo: ' + api.elo + '. Today: ' + api.latestMatchesTrend.score.wins + "W, " +  api.latestMatchesTrend.score.loses + 'L, total: ' + api.todayEloDiff + '.'})</h5>

![image](https://github.com/hashiyomu/FACEIT-ELO-PARSER/assets/119516076/2890eef8-a16d-475e-84fe-e929f909d5ed)

<h2> StreamElements</h2>
How you do can deserialize response using Streamelements? I attached an example - Format.php.

You need to upload the script to your server with PHP support. After the action you need to fetch your script URL by StreamElements.
Result: 

![image](https://github.com/hashiyomu/FACEIT-ELO-PARSER/assets/119516076/35d844cc-2f9a-42b3-b5e5-e24df33c3f50)

2) More trust way - Use Faceit API. You will not be dependent on other API like Satont.
