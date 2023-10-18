const containers = document.querySelectorAll(".clickable-container")
const questions = document.querySelectorAll(".question-container")
const questionsBlock = document.querySelector("#qs")
const stakeholderBtns = document.querySelector("#stakeholderBtns")
const nextStakeholder = document.querySelector("#nextStakeholder")
const qBtns = document.querySelector("#questionBtns")
const additQuestion = document.querySelector("#additQuestion")
const head = document.querySelector('#head')

const timerStart = document.querySelector('#timer-start')

let currentCont = null

timerStart.addEventListener("click", () => {
	if (head.style.display == "none")
	head.style.display = "block"
	else
	head.style.display = "none"

	if (document.querySelector("#task1").style.display == "flex")
	document.querySelector("#task1").style.display = "none"
	else
	document.querySelector("#task1").style.display = "flex"
})

nextStakeholder.addEventListener("click", () => {
	questionsBlock.style.display = "none"
	document.querySelector("#task1").style.display = "flex"
	stakeholderBtns.style.display = "none"
	answer = null
	
	const answers = document.querySelectorAll(".answer")
	answers.forEach((answer) => {
		answer.style.display = "none"
	})

	document.querySelector("#noAnswer").style.display = "none"
	questions.forEach((question) => {
		question.style.display = "flex"
		
	})
	head.innerHTML = "Выберите стейкхолдера для опроса"
})

containers.forEach((container) => {
	let answer = null	

	container.addEventListener("click", () => {

		document.querySelector("#task1").style.display = "none"
		container.style.display = "none"
		questionsBlock.style.display = "flex"
		stakeholderBtns.style.display = "flex"
		currentCont = container.id

		head.innerHTML = "Выберите вопрос"
	})
})

questions.forEach((question) => {
	const answers = document.querySelectorAll(".answer")
answers.forEach((answer) => {
	answer.style.display = "none"
})
	question.addEventListener("click", () => {
		head.innerHTML = question.innerHTML

		stakeholderBtns.style.display = "none"
		questionsBlock.style.display = "none"
		question.style.display = "none"
		answer = document.querySelector("#a"+currentCont+question.id)
		console.log(answer)

		if (!answer)
		answer = document.querySelector("#noAnswer")

		answer.style.display = "flex"
		qBtns.style.display = "flex"					
		additQuestion.style.display = "flex"

		// let additAnswer = document.querySelector("#a"+container.id+question.id+"alt")

		additQuestion.addEventListener("click", () => {						
			answer.style.display = "none"
			answer = document.querySelector("#a"+currentCont+question.id+"alt")

			if (!answer)						
			answer = document.querySelector("#noAnswer")
			
			answer.style.display = "flex"
			additQuestion.style.display = "none"
		})

		const nextQuestion = document.querySelector("#nextQuestion")

		nextQuestion.addEventListener("click", () => {
			qBtns.style.display = "none"
			stakeholderBtns.style.display = "flex"

			if (answer)	
			answer.style.display = "none"

			questionsBlock.style.display = "flex"
		})
	})
})

