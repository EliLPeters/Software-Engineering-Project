
var score = 0.0;
var temp_score = 0.0;
var score_increment = 5;
var chain_multiplier = 0.5;
var vic_chain = 0;
var los_chain = 0;
var que_asked = 0;
var que_right = 0;
var que_counter = 0;

var question_array = [];

function start()
{
	// document.getElementById("pump").addEventListener("click", progress, false);
	// document.getElementById("deflate").addEventListener("click", regress, false);
	document.getElementById("beginquiz").addEventListener("click", deliverQuestion, false);
	initializeQuestions();
}

function initializeQuestions()
{
	question_array = [
		["Fill in the blank:<br/>______(\"Hello World!\")", ["opt0", "opt1", "opt2", "opt3"], ["echo", "print", "System.out.println", "cout"], 1],
		["How do you incorporate the \"Random\" module into your code?<br/>______ random", ["opt0", "opt1", "opt2", "opt3"], ["incorporate", "include", "import", "add"], 2],
		["_____ are instances of ______", ["opt0", "opt1", "opt2", "opt3"], ["classes;objects", "children;parents", "objects;classes", "parents;children"], 2],
		["How do you add more than two branches to an if\/else statement?", ["opt0", "opt1", "opt2", "opt3"], ["ifelse:", "elseif:", "if:", "elif:"], 3],
		["How would you determine the data type of the variable X?", ["opt0", "opt1", "opt2", "opt3"], ["type(X)", "data(X)", "variable(X)", "datatype(X)"], 0],
		["How do you find the length of a string X?", ["opt0", "opt1", "opt2", "opt3"], ["length(X)", "len(X)", "X.length", "X.len"], 1],
		["How do you check whether a string X is all upper case?", ["opt0", "opt1", "opt2", "opt3"], ["X.upper()", "X.isupper()", "X.uppercase()", "X.isuppercase()"], 1],
		["True or false: Python is a strongly-typed language.", ["opt0", "opt1"], ["True", "False"], 0],
		["How would you indicate that variable X is an integer?<br/>______ X", ["opt0", "opt1", "opt2", "opt3"], ["int", "integer", "var", "(blank)"], 3],
		["What datatype is a number with a decimal?", ["opt0", "opt1", "opt2", "opt3"], ["double", "decimal", "float", "dec"], 2],
		["How do you evaluate whether two variables X and Y have equivalent values?", ["opt0", "opt1", "opt2", "opt3"], ["X=Y", "X+=Y", "X==Y", "X=:=Y"], 2],
		["Data types for variables in Python can be changed during runtime due to its _____ nature.", ["opt0", "opt1", "opt2", "opt3"],  ["dynamic", "static", "robust", "portable"], 0]
	/*["Which one of these is a function?", ["opt0", "opt1", "opt2", "opt3"], ["Cook", "cook", "cook()", "\#cook"], 2],
	["Classes are always _______", ["opt0", "opt1", "opt2", "opt3"], ["camelCase", "capitalized", "snake_case", "primary_key"], 1],
	["5 % 2 = ____", ["opt0", "opt1", "opt2", "opt3"], ["2", "3", "2.5", "1"], 3],
	["Python gets its name from _______", ["opt0", "opt1", "opt2", "opt3"], ["Snakes", "Monty", "Colt", "Anaconda"], 1],
	["Which dynamic data structure requires both a key and a value?", ["opt0", "opt1", "opt2", "opt3"], ["dictionary", "list", "tuple", "lambda"], 0],
	["If a = 5 and b = 2, what is the output of print(a+b)?", ["opt0", "opt1", "opt2", "opt3"], ["10", "11", "25", "7"], 3],
	["If a = \"5\" and b = \"2\", what is the output of print(a+b)?", ["opt0", "opt1", "opt2", "opt3"], ["10", "11", "25", "7"], 2],
	["Which operator prints a list in reverse order?", ["opt0", "opt1", "opt2", "opt3"], ["y=x\[:\]", "x=\[y:\]", "\[x:y\]", "y=x\[previous\]"], 0],
	["Remove an element at position y from list x by entering _______.", ["opt0", "opt1", "opt2", "opt3"], ["x.del\[y\]", "x\[y:z\]", "x.clear\[y\]", "del x\[y\]"], 3],
	["Which of the following is not a mutable built-in type?", ["opt0", "opt1", "opt2", "opt3"], ["set", "matrix", "dictionary", "list"], 1],
	["Which of the following is an immutable built-in type?", ["opt0", "opt1", "opt2", "opt3"], ["Idle", "set", "tuple", "list"], 2],
	["_____ is a means of selecting a range of items from the same sequence type.", ["opt0", "opt1", "opt2", "opt3"], ["slicing", "dicing", "parsing", "splitting"], 0],
	["_____ is a means of converting a string into multiple characters.", ["opt0", "opt1", "opt2", "opt3"], ["slicing", "dicing", "parsing", "splitting"], 3],
	["What is the proper syntax for executing the random\(\) function?", ["opt0", "opt1", "opt2", "opt3"], ["rand\(\)", "rand.random\(\)", "random.rand\(\)", "import.random\(\)"], 1],
	["What type of language is Python?", ["opt0", "opt1", "opt2", "opt3"], ["procedural", "object-oriented", "functional", "logical"], 1],
	["At times, Python can be converted to a procedural language", ["opt0", "opt1"], ["True", "False"], 1],
	["_____ returns a strings contents in reverse.", ["opt0", "opt1", "opt2", "opt3"], ["string\[\:\:-1\]", "\[\:\:-1\]string", "string\[x:y\]", "switch\[x:y\]"], 0],
	["What is the proper way to declare values into a dictionary?", ["opt0", "opt1", "opt2", "opt3"], ["\[\"one\":1\]=x", "x=\{1:\"one\"\}", "\{"one"\:1\}", "x=\[1\:"one"\]"], 1]*/
	];
}

function updateDebug()
{
	document.getElementById("percent").innerHTML = score.toString() + "%";
	document.getElementById("score").innerHTML = que_right.toString() + "/" + que_asked.toString();
}

function progress()
{
	los_chain = 0;
	score += (score_increment * (1 + chain_multiplier * vic_chain));
	if(score > 100)
	{
		score = 100;
	}
	vic_chain++;
	
	var elem = document.getElementById("progressBar");
	var id = setInterval(frame, 50);
	function frame()
	{
		if(temp_score < score)
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
	que_asked++;
	que_right++;
	if(score >= 100)
	{
		
		victory();
	}
	else
	{
		deliverQuestion();
	}
	updateDebug();
}

function regress()
{
	if(score > 0)
	{
		vic_chain = 0;
		score -= (score_increment * (1 + chain_multiplier * los_chain));
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
	que_asked++;
	deliverQuestion();
	updateDebug();
}


function move()
{
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

function deliverQuestion()
{
	document.getElementById("question").innerHTML = question_array[que_counter][0] + "<br/>";
	
	var answer_array = [];
	
	for(i = 0; i < question_array[que_counter][1].length; i++)
	{
		if(i == question_array[que_counter][3])
		{
			document.getElementById("question").innerHTML += "<input type=\"button\" id=" + question_array[que_counter][1][i] + " value=" + question_array[que_counter][2][i] + " onclick = \"progress()\"><br/>";
		}
		else
		{
			document.getElementById("question").innerHTML += "<input type=\"button\" id=" + question_array[que_counter][1][i] + " value=" + question_array[que_counter][2][i] + " onclick = \"regress()\"><br/>";
		}
		answer_array[i] = document.getElementById(question_array[que_counter][1][i]);
	}
	
	que_counter = ((que_counter + 1) % question_array.length);
}

function victory()
{
	document.getElementById("question").innerHTML = "CONGRATULATIONS!<br/><form action=\"\ResultPage.php\" method=\"post\"><input type=\"hidden\" name=\"phase\" value=\"1\"><input type=\"hidden\" name=\"right\" value=\"" + que_right + "\"><input type=\"hidden\" name=\"total\" value=\"" + que_asked + "\"><input type=\"submit\" value=\"Submit Results\">";
}

window.addEventListener("load", start, false);