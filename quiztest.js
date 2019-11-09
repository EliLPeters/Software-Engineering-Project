
var score = 0.0;
var temp_score = 0.0;
var score_increment = 5;
var chain_multiplier = 1.5;
var vic_chain = 0;
var los_chain = 0;

function start()
{
	document.getElementById("pump").addEventListener("click", progress, false);
	document.getElementById("deflate").addEventListener("click", regress, false);
}

function updateDebug()
{
	document.getElementById("percent").innerHTML = score.toString();
}

function progress()
{
	los_chain = 0;
	score += (score_increment * (1 + (chain_multiplier * vic_chain)));
	if(score > 100)
	{
		score = 100;
	}
	vic_chain++;
	
	var elem = document.getElementById("progressBar");
	var id = setInterval(frame, 50);
	function frame()
	{
		if(temp_score < score && temp_score < 100)
		{
			if(score - temp_score > 1)
			{
				temp_score++;
			}
			else
			{
				temp_score = score;
			}
			elem.style.width = temp_score + "%";
		}
	}
	
}

function regress()
{
	if(score > 0)
	{
		vic_chain = 0;
		score -= (score_increment * (chain_multiplier * los_chain));
	}
	if(score < 0)
	{
		score = 0;
	}
	los_chain++;
	
	var elem = document.getElementById("progressBar");
	var id = setInterval(frame, 50);
	function frame()
	{
		if(temp_score > score)
		{
			temp_score--;
			elem.style.width = temp_score + "%";
		}
	}
}


function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
} 

window.addEventListener("load", start, false);