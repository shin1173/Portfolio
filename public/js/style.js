const divs = document.querySelectorAll(".btn, .btn-2, .btn-3");

divs.forEach(div => {
    const spans = div.querySelectorAll("span");

spans.forEach((span,index) => {
    setTimeout(() => { span.classList.add("is-active")}, 300 * index);
});
});
