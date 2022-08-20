const newStatusSelects = document.querySelectorAll(".newStatusSelect");

newStatusSelects.forEach(select => {
    select.addEventListener("change", function () {
        const photoLabel = this.nextElementSibling;

        if (this.value === "processed") {
            photoLabel.style.display = "block";
        } else {
            photoLabel.style.display = "none";
        }
    })
});
