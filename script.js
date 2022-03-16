const question = document.getElementById('title');
const answer = document.querySelectorAll('.answer');

const answer_a = document.getElementById('answer_a');
const answer_b = document.getElementById('answer_b');
const answer_c = document.getElementById('answer_c');
const answer_d = document.getElementById('answer_d');

let currentQuestion = 0;
let point = 0;

fetch('http://localhost/RestfulAPI/api/question/read.php')
	.then(response => response.json())
	.then(data => {
	// console.log(data);
	const getQuestion = data.question[currentQuestion];
	console.log(getQuestion);

	question.innerText = getQuestion.title;
	})
	.catch(error => console.log(error));