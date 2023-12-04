
// Récupération de la date de la semaine + salutations du connecté

var today = new Date();
var week = moment(today).isoWeek();
var hourNow = today.getHours();
var greeting;
var message;

if (hourNow > 18) {
    greeting = 'Bonsoir';
} else if (hourNow > 12) {
    greeting = 'Bonne après-midi';
} else if (hourNow > 0) {
    greeting = 'Bonjour';
} else {
    greeting = 'Bienvenue';
}

message = ' Nous sommes aujourd\'hui le ' + today.toLocaleDateString() + '.';

var messageJs = document.getElementById("date-semaine");
messageJs.innerHTML = message;

// var bienvenueJs = document.getElementById("message-bienvenue");
// var greetingParagraph = document.createElement("p");
// var greetingText = document.createTextNode(greeting);
// greetingParagraph.appendChild(greetingText);
// bienvenueJs.appendChild(greetingParagraph);

var bienvenueJs = document.getElementById("message-bienvenue");
var greetingParagraph = document.createElement("p");
var greetingText = document.createTextNode(greeting);
greetingParagraph.appendChild(greetingText);
bienvenueJs.insertBefore(greetingParagraph, bienvenueJs.firstChild);

// Tooltip bootstrap

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))




