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

QTYPM.tabInt = function () {
    this.tabs = document.querySelectorAll(".woocommerce-tabs ul.nav li");
    this.tabsBox = document.querySelectorAll(".woocommerce-tabs .woocommerce-Tabs-panel");
    // now set class active on first tab
    this.tabs[0].querySelector(".nav-link").classList.add("active");
    this.tabsBox.forEach(function (tabBox, index) {
        if (index === 0) {
            tabBox.style.display = "block";
        } else {
            tabBox.style.display = "none";
        }
    })

    this.tabs.forEach(function (tab) {
        tab.addEventListener("click", function (e) {
            e.preventDefault();
            QTYPM.tabs.forEach(function (tab) {
                tab.querySelector(".nav-link").classList.remove("active");
            });
            QTYPM.tabsBox.forEach(function (tabBox) {
                tabBox.style.display = "none";
            });
            tab.querySelector(".nav-link").classList.add("active");
            const tabId = tab.querySelector(".nav-link").getAttribute("href");
            document.querySelector(tabId).style.display = "block";
        })
    })
}

QTYPM.reviewClickLink = function () {
    const reviewLink = document.querySelector('.woocommerce-product-rating a.woocommerce-review-link')
    const reviewTab = document.querySelector('li#tab-title-reviews')
    if (reviewLink === null) {
        return;
    }
    reviewLink.addEventListener('click', function () {
        reviewTab.click();
    });
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
    const isSingleProductPage = document.querySelector("body").classList.contains("single-product");
    if (!isSingleProductPage) {
        return;
    }
    QTYPM.init();
    QTYPM.tabInt();
    QTYPM.reviewClickLink();


});