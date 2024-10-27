const form = document.getElementById("ask");
function logSubmit(event) {
    event.preventDefault();
    const img = document.getElementById("ball");
    if (img) {
        img.classList.add("img-hover");
        setTimeout(() => {
            img.classList.remove('img-hover');
            this.submit();
        }, 2000);

    }

}
form.addEventListener("submit", logSubmit);