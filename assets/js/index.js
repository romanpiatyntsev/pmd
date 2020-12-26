import '../scss/main.scss'
import * as Menu from './menu'
import './google_map'
import './custom_particles'

document.addEventListener('DOMContentLoaded', function(){
    Menu.stickyTopLayout().init();
    Menu.showMobile().init();
    Menu.mobileMenuHandler().init();
});