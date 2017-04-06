document.body.style.backgroundImage = "url('world-map-146505_960_720.png')";

var randomQuestions; // [n] random questions we will show in this quiz (Did not have time ti fix this)
var currentQuestion; // question we are displaying now
var answerByUser; // array of user answers, being 0 = fail and 1 = OK
function start(){
// Start the game quiz
setVisibility('repeat','none');
setVisibility('next','inline');
setVisibility('timerContainer','block');
setVisibility('question','block');
setVisibility('results','none');
randomQuestions = (questions.slice()).splice(0,displayQuestions); 
currentQuestion = 0;
answerByUser = new Array(displayQuestions);
document.getElementById('results').innerHTML = "";
document.getElementById('timer').style.width=0;

loadQuestion();
}

function loadQuestion(){ // Loading the questions and adding to score
    var displayScores = '';
	for (var i = 0;i<randomQuestions[currentQuestion].answers.length;i++){
        displayScores+='<label id="l'+i+'"><input type="radio" name="radioAnswers" value="'+i+'" id="r'+i+'" onclick="activateNextButton()">'+randomQuestions[currentQuestion].answers[i]+'</label><br/>';
}
deactivateNextButton();

    document.getElementById('question').innerHTML = (currentQuestion+1) + ". " + randomQuestions[currentQuestion].question;
    document.getElementById('answers').innerHTML = displayScores;
// add styles to answers

// start the timer
    document.getElementById('timer').style.width=0;
    startTimer = new Date().getTime();
    timerStopID = setInterval(updateTimer,500);
}

function updateTimer(){ // adding an update to the timer and how the refresh rate on time progressbar updates
    var timeEllapsed = new Date().getTime() - startTimer;
    percentEllapsed = (timeEllapsed * 100) / timerPerQuestion;

    document.getElementById('timer').style.width = String(Math.round(percentEllapsed)) + '%';

    if(percentEllapsed>=105) goNext(); // user didn't click the "next" button but maybe he answered the question, anyway save the status
}

// when user clicks the "next" button OR when there is a timeout
function goNext(){
    clearInterval(timerStopID); // clear the timer

    var answerOK = false;
    try {
         answerOK = parseInt(document.querySelector('input[name="radioAnswers"]:checked').value) === randomQuestions[currentQuestion].ok;
}   catch (err) { /* disregard err if user didn't answer */ }

    answerByUser[currentQuestion] = answerOK;
    currentQuestion++;
        if(currentQuestion<displayQuestions){
         loadQuestion();
}          else {
// create and display the new final results, score board!
setVisibility('next','none');
setVisibility('repeat','inline');
setVisibility('timerContainer','none');
setVisibility('question','none');
document.getElementById('question').innerHTML = "";
document.getElementById('answers').innerHTML = "";
var rightAnswers = 0;
var wrongAnswers = 0;
for(var i=0;i<answerByUser.length;i++){
        if(answerByUser[i]) {
           rightAnswers++;
        } else {
           wrongAnswers++;
}
} //show the result with total questions, right, wrong and percent
document.getElementById('results').innerHTML =  "Total questions: " + answerByUser.length + "<br/>" + "Right answers: " + rightAnswers + "<br/>" + "Fails: " + wrongAnswers + "<br/>" + "Right percent: " + Math.round((rightAnswers * 100) / answerByUser.length) + "%<br/>";
setVisibility('results','block');
document.getElementById('end').play(); //Play the sound and the end at the results
}
}
// aften click on button go to next answer
function activateNextButton(){
    document.getElementById("next").className = "";
    document.getElementById("next").onclick=goNext;
}
// dontn show next button and the results
function deactivateNextButton(){
    document.getElementById("next").className = "disabled";
    document.getElementById("next").onclick=null;
}
function setVisibility(itm,val){
    document.getElementById(itm).style.display = val;
}
