
    <script src="scripts/double-range-slider.js" defer></script>
    <div id="outer-form">
        <form id="search-form" action="">
            <label for="city">
                <input type="text" name="" id="city" placeholder="Where do you wanna go?" />
            </label>

            <label for="dates">
                <input type="date" name="" id="date-in" placeholder="" />
                <input type="date" name="" id="date-out" />
            </label>

            <label for="n-guests">
                <input type="number" name="" min="1" max="20" id="n-guests" placeholder="What is the number of guests?" />
            </label>

            <label for="price-range" id="price-range">
                <div id="range-slider">
                    <input type="range" name="" value="0" id="min-price" min="0" max="100" />
                    <input type="range" name="" value="200" id="max-price" min="100" max="200" />
                </div>    
                <span id="range-values"></span>
            </label>


            <label id="search-button" for="search">
                <input id="search-button-input" type="submit" value="Search" />
            </label>
        </form>
    </div>