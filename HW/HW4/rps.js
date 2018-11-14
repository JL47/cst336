var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var playerChoice;
var computerChoice;

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById("btnGo");
	deselectAll();
}
function deselectAll() {
	btnPaper.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';

}	
function select(choice) {
	playerChoice = choice;
	imgPlayer.src='images/' + choice + '.png';
	deselectAll();
	if(choice == 'rock') {
		//alert("rock");
		btnRock.style.backgroundColor = '#888888';
	}
	if(choice == 'paper') {
		btnPaper.style.backgroundColor = '#888888';
	}
	if(choice == 'scissors') {
		btnScissors.style.backgroundColor = '#888888';
	}
	//btnGo.style.visibility = 'visibility';
	btnGo.style.display = 'block';
}
function go() {
	//alert("test")
	var num = Math.floor(Math.random()*3); 
	var imgComputer = document.getElementById('imgComputer');
	var txtEndtitle = document.getElementById('endTitle');
	var txtEndmsg = document.getElementById('endMessage');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';

	
	if(num == 0) {
		computerChoice = 'rock';
		imgComputer.src ='images/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			txtEndtitle.innerHTML = '';
			txtEndmsg.innerHTML = 'You TIE!!';
		}
		else if(playerChoice=='paper'){
			$("#endTitle").html("Paper covers Rock");
			$("#endMessage").html("You WIN!!");
		}
		else if(playerChoice=='scissors'){
			alert("You LOSE");
			$("#endTitle").html("Rock smashes scissors");
			$("#endMessage").html("You LOSE!!");

		}
	}
	else if(num == 1) {
		computerChoice = 'paper';
		imgComputer = 'images/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice=='rock'){
			//alert("You WIN");
			$("#endTitle").html("Paper covers Rock");
			$("#endMessage").html("You LOSE!!");
		}
		else if(playerChoice=='paper'){
			//alert("You TIE");
			txtEndtitle.innerHTML = '';
			txtEndmsg.innerHTML = 'You TIE!!';
		}
		else if(playerChoice=='scissors'){
			$("#endTitle").html("Scissors cut Paper");
			$("#endMessage").html("You WIN!!");

		}
	}
	else if(num == 2) {
		computerChoice = 'scissors';
		imgComputer = 'images/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice=='rock') {
			$("#endTitle").html("Rock smashes Scissors");
			$("#endMessage").html("You WIN!!");
		}
		else if(playerChoice=='paper') {
			$("#endTitle").html("Scissors cut paper");
			$("#endMessage").html("You LOSE!!");
		}
		else if(playerChoice=='scissors'){
			$("#endTitle").html("");
			$("#endMessage").html("You TIE!!");
		}
	}
	document.getElementById('endScreen').style.display='block';

	
}
function startGame(){

	document.getElementById('introScreen').style.display='none';
}
function replay(){
	document.getElementById('endScreen').style.display='none';
	btnGo.style.display='none';
	deselectAll();
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	imgPlayer.src = 'images/question.png';
	document.getElementById('imgComputer').src='images/question.png';
}