console.log("Scroll Animations Mini Library is Loaded Succesfully!😄👍");

const scrollElms = document.querySelectorAll(".app__js-scroll");
console.log(scrollElms);

const elmInView = (elm, dividend = 1) => {
    const topElm = elm.getBoundingClientRect().top;

    return (
        topElm <= (
            window.innerHeight ||
            document.documentElement.clientHeight /dividend
        )
    )
};

console.log(elmInView);


const elmOutOfView = (elm,) => {
    const topElm = elm.getBoundingClientRect().top;

    return (
        topElm > (window.innerHeight || document.documentElement.clientHeight)
    );
};

const displayScrollElms = (elm) => {
    elm.classList.add("scrolled");
};

const hideScrollElms = (elm) => {
    elm.classList.remove("scrolled");
};


const handleScrollAnim = (elm) => {
    scrollElms.forEach((elm) => {
        if (elmInView(elm, 1.25)) {
            displayScrollElms(elm);
        } else if (elmOutOfView(elm)) {
            hideScrollElms(elm);
        };
    });
};


window.addEventListener("scroll", () => {
    handleScrollAnim();
});