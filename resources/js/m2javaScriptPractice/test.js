"use strict";

// ----------------------------------------------------------------
// alert("Hello World!");

// ----------------------------------------------------------------
// console.info("Hello information!");
// console.warn("Hello warn!");
// console.error("Hello error!");

// ----------------------------------------------------------------
/* add("hello ", 5);
function add(x, y) {
    console.info(x + y);
} */

// ----------------------------------------------------------------
/* logMult(function(a,b){ return a * b;}, 3, 7);
function logMult (doSmth, a, b) {
    console.log(doSmth(a,b));
} */

// ----------------------------------------------------------------
/* let arr = ['erstes', 'zweites', 3, 4];

// a) ------
for(let i = 0; i < arr.length; i++){
    console.log(i + ' => ' + arr[i]);
}
arr.forEach(function(value, index){
    console.log(index + ' => ' + value);
});

let i = 0;
for(const element of arr){
    console.log((i++) + ' => ' + element);
}

// b) ------
arr.push('new');
console.log(arr);
arr.pop();
console.log(arr);
arr[1] = 'new second';
console.log(arr);

// c) ------
console.log('Length of the array: ', arr.length);
console.log('Sorted array: ', arr.sort());
let indx = 0;
console.log('Find 4 returns: ', arr.find(function(element,index){
    if(element === 3){
     indx = index;
     return true;
    } else return false;
}), ' and the index is', indx);
console.log(arr.map(function(val){ return val + ' mapped'}));
console.log('Array sliced from 0 to 2: ', arr.slice(0,2)); */

// ----------------------------------------------------------------
/* let string = 'This is a super nice test string containing all kinds of stuff. =)(/&%$§';
console.log('Length of the string: ', string.length);
console.log('Index of \'a\': ', string.indexOf('a'));
console.log('Last index of \'a\': ', string.lastIndexOf('a'));
console.log('Substr 2 to 12 returns: ', string.substring(2,12));
console.log('The string after replaceALL \'a\' to \'#\': ', string.replaceAll('a', '#'));
console.log('The string after trim: ', string.trim());
console.log('Concat 123: ', string.concat('123'));
console.log('Lowercase: ', string.toLowerCase());
console.log('Uppercase: ', string.toUpperCase()); */

// ------------------------- Testing Task 5 -----------------------
import {getMaxPreis, getMinPreisProdukt, getPreisSum, getGesamtWert, getAnzahlProdukteOfKategorie} from "../articleFunctions.js";
import {data} from "../data.js";

document.getElementById("out").innerHTML += 'Dieser Artikel kostet am meisten: ' + getMaxPreis(data) + "<br>";
document.getElementById("out").innerHTML += 'Das Objekt das am wenigsten kostet: ' + JSON.stringify(getMinPreisProdukt(data)) + "<br>";
document.getElementById('out').innerHTML += 'Die Summe der Preise: ' + getPreisSum(data) + '<br>';
document.getElementById('out').innerHTML += 'Der gesamte Wert beträgt: ' + getGesamtWert(data) + '<br>';
let kategorie = 'Spielzeug';
let anzProdukte = getAnzahlProdukteOfKategorie(data, kategorie);
if(typeof anzProdukte !== "number")
    document.getElementById('out').innerHTML += anzProdukte;
else
    document.getElementById('out').innerHTML += 'In der Kategorie ' + kategorie + ' gibt es ' + getAnzahlProdukteOfKategorie(data, kategorie) + ' Produkte<br>';
