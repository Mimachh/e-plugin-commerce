class MobileMenu {
    constructor() {
      this.overlay = document.querySelector('.overlay')
      this.menu = document.querySelector(".nav-mobile")
      this.openButton = document.querySelector(".toggle-hamburger")
      this.body = document.body
      this.search = document.querySelector('.mobile-search')
      this.events()
    }
  
    events() {
      this.openButton.addEventListener("click", () => this.openMenu())
      this.search.addEventListener('click', () => this.closeMenu())
    }
    
    openMenu() {
      this.openButton.classList.toggle("fa-bars")
      this.openButton.classList.toggle("fa-window-close")
      this.menu.classList.toggle("visible")
      this.overlay.classList.toggle('visible');
      this.body.classList.toggle('noscroll');
    }

    closeMenu() {
      this.menu.classList.toggle("visible")
      this.overlay.classList.toggle('visible');
      this.openButton.classList.toggle("fa-bars")
      this.openButton.classList.toggle("fa-window-close")
    }
  }
  
  export default MobileMenu