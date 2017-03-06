var questions = [{
	"question": "The first mechanical computer designed by Charles Babbage was called ?",
	"option1": "Abacus",
	"option2": "Analytical Engine",
	"option3": "Calculator",
	"option4": "Processor",
	"answer": "2"
}, {
	"question": "Which of the following is the most powerful type of computer ?",
	"option1": "Super-micro",
	"option2": "Super conductor",
	"option3": "Super computer",
	"option4": "Megaframe",
	"answer": "3"
}, {
	"question": "Which is a single integrated circuit?",
	"option1": "Gate",
	"option2": "Mother Board",
	"option3": "Chip",
	"option4": "CPU",
	"answer": "1"
}, {
	"question": "C is ?",
	"option1": "A third generation high level language",
	"option2": "A machine language",
	"option3": "An assembly language",
	"option4": "All of the above",
	"answer": "1"
}, {
	"question": "Web pages are written using ?",
	"option1": "FTP",
	"option2": "HTTP",
	"option3": "HTML",
	"option4": "URL",
	"answer": "3"
}, {
	"question": "UNIVAC is an example of",
	"option1": "First generation computer",
	"option2": "Second generation computer",
	"option3": "Third generation computer",
	"option4": "Fourth generation computer",
	"answer": "1"
}, {
	"question": "Which of the following is an example of non volatile memory ?",
	"option1": "VLSI",
	"option2": "LSI",
	"option3": "ROM",
	"option4": "RAM",
	"answer": "3"
}, {
	"question": "Graphic interfaces were first used in a xerox product is called ?",
	"option1": "Ethernet",
	"option2": "Inter LISP",
	"option3": "Small talk",
	"option4": "Zeta LISP",
	"answer": "1"
}, {
	"question": "Find the odd one out ?",
	"option1": "ORACLE",
	"option2": "SYBASE",
	"option3": "C",
	"option4": "INFORMIX",
	"answer": "3"
}, {
	"question": "The ------ is the administrative section of the computer system?",
	"option1": "Memory Unit",
	"option2": "Input Unit",
	"option3": "Central Processing Unit",
	"option4": "Control Unit",
	"answer": "3"
}];


var appContainer = document.getElementById('cont'),
	questionEl = document.getElementById('question'),
	opt1 = document.getElementById('opt1'),
	opt2 = document.getElementById('opt2'),
	opt3 = document.getElementById('opt3'),
	opt4 = document.getElementById('opt4'),
	nxtBtn = document.getElementById('next'),
	result = document.getElementById('result'),
	
	currentQuestion = 0,
	totQuestions = questions.length,
	score = 0;


function loadQuestion(questionIndex) {
	'use strict';
	var q = questions[questionIndex];
	questionEl.textContent = (questionIndex + 1) + '. ' + q.question;
	opt1.textContent = q.option1;
	opt2.textContent = q.option2;
	opt3.textContent = q.option3;
	opt4.textContent = q.option4;
}

function loadNextQuestion() {
	'use strict';
	var selectedOption = document.querySelector('input[type=radio]:checked'),
		answer;
	if (!selectedOption) {
		alert('Please Select Your Answer');
		return;
	}
	answer = selectedOption.value;
	if (questions[currentQuestion].answer === answer) {
		score += 10;
	}
	selectedOption.checked = false;
	currentQuestion += 1;
	if (currentQuestion === totQuestions - 1) {
		nxtBtn.textContent = 'Finish';
	}
	
	if (currentQuestion === totQuestions) {
		appContainer.style.display = 'none';
		result.style.display = '';
		result.textContent = 'Your Score: ' + score;
		return;
	}
	loadQuestion(currentQuestion);
}
loadQuestion(currentQuestion);