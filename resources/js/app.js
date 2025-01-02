import './bootstrap';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';

window.Alpine = Alpine;
Alpine.plugin(mask)

Alpine.start();

import Swiper, { Navigation, Pagination } from 'swiper';
Swiper.use([Navigation, Pagination]);

//console.log("Page path is " + window.location.pathname);

if (window.location.pathname=='/get-started') {

    const swiper = new Swiper('.swiper', {
        // configure Swiper to use modules
        modules: [Navigation, Pagination],
        
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
    swiper.disable();
    window.showStage = function(stage) {
        // console.log('stage = '+stage);
        // swiper.slideTo(stage, 300, true);
    }

    var new_value;
    var new_borrow;
    var new_income;
    var percentage;
    var value_with_commas = document.getElementById("value_with_commas");
    value_with_commas.value = '500,000';
    // var value_with_commas_range = document.getElementById("value_with_commas_range");
    var borrow_with_commas = document.getElementById("borrow_with_commas");
    var borrow_percentage = document.getElementById("borrow_percentage");
    var income_with_commas = document.getElementById("income_with_commas");
    var borrow_value = document.getElementById("borrow_value");
    var income_min = document.getElementById("income_min").value;
    income_min = parseInt( income_min ).toLocaleString();
    income_with_commas.value = income_min;
    // var range_borrow = document.getElementById("range_borrow");
    window.addCommas = function(event) {
        console.log('value = '+event.target.value);
        // new_value = parseInt( event.target.value ).toLocaleString();
        // console.log('new_value = '+new_value);
        // value_with_commas.innerHTML = new_value;
        value_with_commas.value = event.target.value;
        // range_borrow.max = new_value;
        // console.log('range_borrow.max = '+range_borrow.max);
    }
    window.addCommasInput = function(event) {
        console.log('value = '+event.target.value);
        new_value = parseInt( event.target.value ).toLocaleString();
        console.log('new_value = '+new_value);
        // value_with_commas.innerHTML = new_value;
        // value_with_commas_range.value = new_value + ',000';
        // value_with_commas.value = new_value + ',000';
    }
    window.addCommasBorrow = function(event) {
        // console.log('borrow = '+event.target.value);
        // new_borrow = parseInt( event.target.value ).toLocaleString();
        console.log('new_borrow = '+new_borrow);
        borrow_with_commas.value = event.target.value;
        console.log('event.target.value = '+event.target.value);
        console.log('borrow_value = '+borrow_value.value);
        // var valint = event.target.value.replace(",", "0");
        // console.log('valint = '+valint);
        percentage = (event.target.value / borrow_value.value) * 100;
        borrow_percentage.value = percentage.toFixed(0)+'%';
        console.log('percentage = '+percentage);
    }
    window.addCommasIncome = function(event) {
        // console.log('borrow = '+event.target.value);
        // new_income = parseInt( event.target.value ).toLocaleString();
        //console.log('new_borrow = '+new_borrow);
        income_with_commas.value = event.target.value;
    }
    window.changeMinIncome = function(event) {
        // console.log('borrow = '+event.target.value);
        income_min = document.getElementById("income_min").value;
        income_min = parseInt( income_min ).toLocaleString();
        income_with_commas.value = income_min;
        console.log('income_min = '+income_min);
    }

}


const buttons = document.getElementsByClassName('js-cookie-consent-agree');

for (let i = 0; i < buttons.length; ++i) {
    buttons[i].addEventListener('click', gtagConsent);
}

if (localStorage.consentGranted) {
    gtagConsent();
}

function gtagConsent() {
    console.log('google consent granted');
    localStorage.setItem("consentGranted", "true");
    function gtag() { dataLayer.push(arguments); }

    gtag('consent', 'update', {
        ad_user_data: 'granted',
        ad_personalization: 'granted',
        ad_storage: 'granted',
        analytics_storage: 'granted'
    });

    // Load gtag.js script.
    var gtagScript = document.createElement('script');
    gtagScript.async = true;
    gtagScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-JYMK7HCC95';

    var firstScript = document.getElementsByTagName('script')[0];
    firstScript.parentNode.insertBefore(gtagScript,firstScript);
}