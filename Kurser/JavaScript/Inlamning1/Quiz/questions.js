var displayQuestions = 10; // How many questions to show
var timerPerQuestion = 10000; // max time before timeout
var questions = [{ // All the questions and answers
    question: 'What city is the capital of Spain?',
    answers: [
        'Barcelona',
        'La manga',
        'Madrid',
        'Ibiza'
    ],
    ok: 2 // 0, 1, 2 or 3

},
        {
    question: 'What is the capital of California?',
    answers: [
        'San Diego',
        'Los Angeles',
        'San Francisco',
        'Sacramento'
    ],
    ok: 3

},
        {
    question: 'Witch city second largest in Sweden?',
    answers: [
        'Malmö',
        'Stockholm',
        'Göteborg',
        'Landskrona'
    ],
    ok: 2

},
        {
    question: 'What is the capital of Turkey?',
    answers: [
        'Ankara',
        'Istanbul',
        'Alanya',
        'Batman'
    ],
    ok: 0

},
        {
    question: 'What is the national animal of China?',
    answers: [
        'Lion',
        'Panther',
        'Tiger',
        'Panda'
    ],
    ok: 3

},
        {
    question: 'What is the second largest country in Europe after Russia?',
    answers: [
        'Germany',
        'France',
        'Spain',
        'England'
    ],
    ok: 1

},
        {
    question: 'What is the largest state of the United States?',
    answers: [
        'California',
        'Alaska',
        'Texas',
        'Florida'
    ],
    ok: 1

},
        {
    question: 'How many continents are there?',
    answers: [
        'Five',
        'Two',
        'Six',
        'Seven'
    ],
    ok: 3

},
        {
    question: 'On which continent can you visit Sierra Leone?',
    answers: [
        'South America',
        'United States',
        'Africa',
        'Asia'
    ],
    ok: 2

},
        {
    question: 'Which Turkish city has the name of a cartoon character?',
    answers: [
        'Superman',
        'Batman',
        'Donald',
        'Sonic'
    ],
    ok: 1,

}                                                         
]