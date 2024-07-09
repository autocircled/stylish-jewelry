var QTYPM = QTYPM || {};

QTYPM.init = function () {
    this.plus = document.querySelector("form.cart .quantity__plus");
    this.minus = document.querySelector("form.cart .quantity__minus");
    this.input = document.querySelector("form.cart  input[name=quantity]");
    this.buybtn = document.querySelector("form.cart .la-wc-product-link");
    this.baseUrl = this.buybtn.href.split('&quantity=')[0];
    this.buybtn.href = this.baseUrl + "&quantity=" + QTYPM.input.value;


    // console.log(this.buybtn.href);

    this.plus.addEventListener("click", function () {
        QTYPM.increase();
    });
    this.minus.addEventListener("click", function () {
        QTYPM.decrease();
    });
}

QTYPM.increase = function () {
    this.input.value = parseInt(this.input.value) + 1;
    console.log(this.buybtn.href);
    this.buybtn.href = this.baseUrl + "&quantity=" + QTYPM.input.value;
}

QTYPM.decrease = function () {
    if (parseInt(this.input.value) > 1) {
        this.input.value = parseInt(this.input.value) - 1;
        this.buybtn.href = this.baseUrl + "&quantity=" + QTYPM.input.value;
    }
}



/**
 * Is the DOM ready?
 *
 * This implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 *
 * @since 0.1
 *
 * @param {Function} fn Callback function to run.
 */
function QTYPMDomReady(fn) {
    if (typeof fn !== "function") {
        return;
    }

    if (
        document.readyState === "interactive" ||
        document.readyState === "complete"
    ) {
        return fn();
    }

    document.addEventListener("DOMContentLoaded", fn, false);
}

QTYPMDomReady(function () {
    QTYPM.init();
});