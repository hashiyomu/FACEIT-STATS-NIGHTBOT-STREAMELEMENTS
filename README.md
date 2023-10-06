# FACEIT-ELO-PARSER
Ways to parse elo and other stats for StreamElements, Nightbot or other purpose

CS2 released out and many streamers have question about !elo command for their chat bots.

Ways to get stats.
1) Satont API (https://api.satont.ru/).
It works for CS2 already. API returns JSON response.

Example: https://api.satont.ru/faceit?nick=s1mple.

For Nightbot you can deserialize JSON by its own deserializer. 
Examples: 
$(eval const api = $(urlfetch json https://api.satont.ru/faceit?nick=s1mple); if (!api.elo) {'Failed to parse'} else { 'CS2 Elo: ' + api.elo + '.'})
  ![image](https://github.com/hashiyomu/FACEIT-ELO-PARSER/assets/119516076/29aaa889-9df2-46a6-ab1e-3e53a0d91980)

$(eval const api = $(urlfetch json https://api.satont.ru/faceit?nick=s1mple); if (!api.elo) {'Failed to parse'} else { 'CS2 Elo: ' + api.elo + '. Today: ' + api.latestMatchesTrend.score.wins + "W, " +  api.latestMatchesTrend.score.loses + 'L, total: ' + api.todayEloDiff + '.'})
  ![image](https://github.com/hashiyomu/FACEIT-ELO-PARSER/assets/119516076/2890eef8-a16d-475e-84fe-e929f909d5ed)

How you do can deserialize response using Streamelements? I attached an example - Format.php.
You need to upload the script to your server with PHP support. After the action you need to fetch URL to your script by StreamElements.
Example: $(urlfetch http://yourserver.com/Format.php?nick=s1mple)
Result: 
![image](https://github.com/hashiyomu/FACEIT-ELO-PARSER/assets/119516076/35d844cc-2f9a-42b3-b5e5-e24df33c3f50)
2) More trust way.
Use Faceit API. 
