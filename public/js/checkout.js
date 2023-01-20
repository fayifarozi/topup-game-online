document.addEventListener("click", function (event) {
    if (!event.target.matches(".product__card-denom")) return;
    event.target.classList.add("active");
    event.target.siblings().forEach(function (sibling) {
        sibling.classList.remove("active");
    });

    var price = event.target.querySelector("#price").textContent;
    var numericValue = price.match(/\d+(.\d+)?/);
    var newValue = parseInt(numericValue) + parseInt(numericValue) * 0.1;
    var paytextElements = document.querySelectorAll(
        "#paytext-1,#paytext-2,#paytext-3,#paytext-4"
    );
    paytextElements.forEach(function (paytext) {
        paytext.textContent = newValue;
    });
});

document.addEventListener("click", function (event) {
    if (!event.target.matches(".product__card-payment")) return;
    event.target.classList.add("active");
    event.target.siblings().forEach(function (sibling) {
        sibling.classList.remove("active");
    });
});
