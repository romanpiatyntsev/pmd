import { clickEvent } from "./util";

export function stickyTopLayout () {
    let header = document.querySelector('.site-branding'),
        mainNavigation = document.querySelector('.main-navigation'),
        headerHeight = header.getBoundingClientRect().height,
        show = false;

    let init = function(){
        document.addEventListener('scroll', showTopLayout);
    };

    let showTopLayout = function(){
        if (!show && pageYOffset > headerHeight) {
            mainNavigation.classList.add('sticky');
            show = true;
        }

        if (show && pageYOffset < headerHeight) {
            mainNavigation.classList.remove('sticky');
            show = false;
        }
    };

    return {
        init: init
    }
}

export function showMobile () {

    let topMenuContainer = document.querySelector('.top-wrapper'),
        btnMobile = topMenuContainer.querySelector('.menu-toggle');

    let init = function(){
        btnMobile.addEventListener(clickEvent(), toogleActive);
    };

    let toogleActive = function(){
        topMenuContainer.classList.toggle('show');
        btnMobile.classList.toggle('expanded');
    };

    return {
        init: init
    }
};

export function mobileMenuHandler () {
    let nav = document.getElementById('site-navigation');

    let init = function(){
        nav.addEventListener(clickEvent(), toogleActive);
    };

    let toogleActive = function(e){
        //e.preventDefault();
        let parent = e.target.parentElement;
        if( parent.classList.contains('menu-item-has-children') ) {
            parent.classList.toggle('expanded');
        }
    };

    return {
        init: init
    }
};