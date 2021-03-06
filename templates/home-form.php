    <script src="../scripts/double-range-slider.js" defer></script>
    <script src="../scripts/countries.js" referer></script>
    <script src="../scripts/getMaxPrice.js" referer></script>
    <div id="outer-form">
        <form id="search-form" action="../pages/search.php" method="get" >
                <label id="city"  >
                    <div id='add1' class="input-line">
                    </div>

                    <div id='add2' class="input-line">
                    </div>
                </label>
                <label id="dates">
                    <input type="date" name="date-in" id="date-in"  class="input"/>
                    <input type="date" name="date-out" id="date-out" class="input"/>
                </label>
                <input type="number" name="n-guests" min="1" max="20" id="n-guests" placeholder="What is the number of guests?" class="input"/>
            <label for="price-range" id="price-range">
                <div id="range-slider">
                    <input type="range" name="min-price" value="0" id="min-price" min="0" max="" />
                    <input type="range" name="max-price" value="" id="max-price" min="" max=""/>
                </div>    
                <span id="range-values"></span>
            </label>
                <input id="search_button" type="submit" value="Search" class="submit_button"/>
        </form>
    </div>
<footer>