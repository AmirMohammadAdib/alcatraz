"use strict";
let startX;
let scrollLeft;
let isDown;

let smoothTimer = null;
function mouseIsDown(e, elem) {
    isDown = true;
    startX = e.pageX - elem.offsetLeft;
    scrollLeft = elem.scrollLeft;
    elem.style.cursor = "grabbing";
}
function mouseUp(e, elem) {
    isDown = false;
    elem.style.cursor = "default";
}
function mouseLeave(e, elem) {
    isDown = false;
    elem.style.cursor = "default";
}
function mouseMove(e, elem) {
    if (isDown) {
        e.preventDefault();
        const x = e.pageX - elem.offsetLeft;
        elem.scrollLeft = scrollLeft - (x - startX);
    }
}
function scrollToLeft(parentClass, childClass) {
    const parent = document.querySelector(parentClass);
    const child = document.querySelector(childClass);
    clearTimeout(smoothTimer);
    parent.style.scrollBehavior = "smooth";
    let gap = 0;
    let gapText = +window.getComputedStyle(parent, null).getPropertyValue("gap").replace("px", "");
    if (typeof gapText === "number") {
        gap = gapText;
    }
    let itemWidth = child.offsetWidth + gap;
    let itemPassed = Math.round(parent.scrollLeft / itemWidth);
    if (itemPassed < 0) {
        itemPassed = -itemPassed;
    }
    itemPassed++;
    parent.scrollLeft = -itemPassed * (child.offsetWidth + gap);
    smoothTimer = setTimeout(() => {
        parent.style.scrollBehavior = "unset";
    }, 300);
}
function scrollToRight(parentClass, childClass) {
    const parent = document.querySelector(parentClass);
    const child = document.querySelector(childClass);
    clearTimeout(smoothTimer);
    parent.style.scrollBehavior = "smooth";
    let gap = 0;
    let gapText = +window.getComputedStyle(parent, null).getPropertyValue("gap").replace("px", "");
    if (typeof gapText === "number") {
        gap = gapText;
    }
    let itemWidth = child.offsetWidth + gap;
    let itemPassed = Math.round(parent.scrollLeft / itemWidth);
    if (itemPassed < 0) {
        itemPassed = -itemPassed;
    }
    itemPassed--;
    parent.scrollLeft = -itemPassed * (child.offsetWidth + gap);
    smoothTimer = setTimeout(() => {
        parent.style.scrollBehavior = "unset";
    }, 300);
}

setTimeout(() => {
  scrollToRight("productList","productItem")
}, 1000);