window.onload = function () {
    getMaxPrice();
};


function getMaxPrice() {

    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("cona");
            max = JSON.parse(this.responseText).maxPrice;

            let minPriceRange = document.getElementById('min-price');
            let maxPriceRange = document.getElementById('max-price');
            
            maxPriceRange.max = max;
            maxPriceRange.min = Math.ceil(max/2);
            maxPriceRange.value = max;
            
            minPriceRange.max = Math.floor(max/2);
            update();
            console.log(minPriceRange,maxPriceRange)
        }
    }

    request.open("GET", "../database/getMaxPrice.php", true);
    request.send();

}