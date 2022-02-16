__author__ = "BARABITE-DUBOUCH Bastien"
__copyright__ = "Copyright (C) 2021 BARABITE-DUBOUCH Bastien"
__license__ = "Private"
__version__ = "1"

function scrollpage() {
    if (window.scrollY > 50) {
        window.document.body.className = "scroll"
    } else {
        window.document.body.className = ""
    }
}

let date1 = Date();

document.getElementById('date').innerHTML = date1;

// // // // //

let tasks = [{text: "BACHELOR CSI", done: false},
    {text: "BTS SIO SISR", done: true},
    {text: "BAC PRO SN", done: true},
    {text: "BEP SN", done: true},
    {text: "BREVET DES COLLEGES", done: true}]

const list = document.getElementsByClassName("todos")[0];

for (let task of tasks) {

    let taskBool = task.done ? 'done' : '';

    list.innerHTML += `<li class="${taskBool}">${task.text}</li>`;

}