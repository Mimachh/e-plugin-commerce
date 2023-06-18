import $ from 'jquery';

class Search {
    // 1. describe and create/initiate our object
    constructor() {
        this.addSearchHTML();
        this.resultsDiv = $("#search-overlay__results");
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.events();
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
    }

    // 2. events
    events() {
        this.openButton.on('click', this.openOverlay.bind(this));
        this.closeButton.on('click', this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.searchField.on('keyup', this.typingLogic.bind(this));
    }

    // 3. methods (function, action)
    typingLogic() {
        if (this.searchField.val() != this.previousValue) {
            clearTimeout(this.typingTimer);
            if(this.searchField.val()) {
                if(!this.isSpinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
               }
               
               this.typingTimer = setTimeout(this.getResults.bind(this), 750);
            } else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }
            
        }
       this.previousValue = this.searchField.val();
    }

    getResults() {

        $.getJSON(siteData.root_url + '/wp-json/mimach_plugin/v1/search?term=' + this.searchField.val(), (results) => {
            this.resultsDiv.html(`
                <div class="row">
                    <div class="one-third">
                        <h2 class="search-overlay__section-title">Doc results</h2>
                        ${results.generalInfo.length ? '<ul class="link-list min-list">' : '<p class="text-light">No item found !</p>'}
                            ${results.generalInfo.map(item => `<li>
                            <a href="${item.permalink}">
                                ${item.postType == 'post' ? `<span><img class="blog_index_image" src="${item.thumbnail}"></span>` : ''}                               
                                ${item.title}
                            </a></li>`).join('')}
                        ${results.generalInfo.length ? '</ul>' : ''}
                    </div>

                    <div class="one-third">
                    <h2 class="search-overlay__section-title">Product results</h2>
                    ${results.productsResults.length ? '<ul class="link-list min-list">' : '<p class="text-light">No item found !</p>'}
                        ${results.productsResults.map(item => `<li>
                        <a href="${item.permalink}">
                            ${item.postType == 'post' ? `<span><img class="blog_index_image" src="${item.thumbnail}"></span>` : ''}                               
                            ${item.title}
                        </a></li>`).join('')}
                    ${results.productsResults.length ? '</ul>' : ''}
                </div>

                </div>
            `);
            this.isSpinnerVisible = false;
        });

        // Delete 
        
    }

    keyPressDispatcher(e) {
       if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {
          this.openOverlay();
       }
       if (e.keyCode == 27 && this.isOverlayOpen) {
        this.closeOverlay();
     }

    }

    openOverlay() {
        this.searchOverlay.addClass('search-overlay--active');
        $("body").addClass("body-no-scroll");
        this.searchField.val('');
        setTimeout(() => this.searchField.focus(), 301);
        this.isOverlayOpen = true;
        return false;
    }

    closeOverlay() {
        this.searchOverlay.removeClass('search-overlay--active');
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;
    }

    addSearchHTML() {
        $("body").append(`
        <div class="search-overlay">
        <div class="search-overlay__top">
           <div class="container">
              <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
              <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term"
              autocomplete="off">
              <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
           </div>
        </div>

        <div>
          <div class="container" id="search-overlay__results">

          </div>
        </div>
    </div>
        `);
    }
}

export default Search