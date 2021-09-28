/*
const card = document.querySelector('.tarjeta');
const container = document.querySelector('.contenedor-tarjeta');
const text_card = document.querySelector('.texto-tarjeta');

container.addEventListener("mousemove", (e) => {
    let xAxis = (window.innerWidth / 2 - e.pageX) / 40;
    let yAxis = (window.innerHeight / 2 - e.pageY) / 15;

    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
});

//Animate In
container.addEventListener("mouseenter",(e) => {
    card.style.transition = "none";

    text_card.style.transform = "translateZ(30px)";
    text_card.style.transition = "all 0.75s ease-out";
});

//Aniamte Out
container.addEventListener("mouseleave", (e) => {
    card.style.transition = "all 0.5s ease";
    card.style.transform = `rotateY(0deg) rotateX(0deg)`;

    text_card.style.transform = "translateZ(0px)";
    text_card.style.transition = "all 0.75s ease-out";
});
*/

const card = document.querySelector('.tarjeta');
const container = document.querySelector('.contenedor-tarjeta');
const text_card = document.querySelector('.texto-tarjeta');

let xAxis;
let yAxis;

container.addEventListener("mousemove", (e) => {
    xAxis = (window.innerWidth / 2 - e.pageX) / 10;
    yAxis = (window.innerHeight / 2 - e.pageY) / 15;

    //console.log("X: " + xAxis + " Y: " + yAxis);

    card.style.transform = "translate("+xAxis+"px,0px)";
});

//Animate In
container.addEventListener("mouseenter",(e) => {
    card.style.transition = "none";
    card.style.transition = "all 0.1s ease";

    text_card.style.transform = "translateZ(15px)";
    text_card.style.transition = "all 0.15s ease-out";
});

//Aniamte Out
container.addEventListener("mouseleave", (e) => {
    card.style.transition = "all 0.75s ease-out";
    card.style.transform = `rotateY(0deg) rotateX(0deg)`;

    card.style.transform = "translate(0px,0px)";
    text_card.style.transform = "translateZ(0px)";
    text_card.style.transition = "all 0.75s ease-out";
});