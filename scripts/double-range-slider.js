// On an event of kind, for els, call fn
const on = (...kinds) => (...els) => (fn) =>
    kinds.forEach(kind =>
        els.forEach(el => el.addEventListener(kind, fn))
    )

const a = document.getElementById('min-price');
const b = document.getElementById('max-price');
const o = document.getElementById('range-values');

on('input', 'mousedown')(a, b)(update);
// 'mousedown' because otherwise you can "lock" the other slider in place at min=max=value

const max = 200;
const min = 0;
const range = max - min + 1; // +1 inclusive
const minBoundary = 20;
const minRange = minBoundary / 2;

update(); // 1x

// As the user drags on input, update the available range and visual space for both inputs
function update({ target } = {}) {
    let pivot; // unless otherwise acted on

    if (target === a) {
        if ( (a.valueAsNumber + minRange) > Number(a.max)) {
            pivot = Math.min(max - minRange, Number(a.max) + 1);
        }
    }

    if (target === b) {
        if ( (b.valueAsNumber - minRange) < Number(b.min)) {
            pivot = Math.max(min + minRange, Number(b.min) - 1);
        }
    }

    if (pivot != null) {
        a.max = pivot;
        b.min = pivot;
        a.value = Math.min(a.value, pivot - minRange);
        b.value = Math.max(b.value, pivot + minRange);
    }

    a.style.flexGrow = stepsIn(a);
    b.style.flexGrow = stepsIn(b);

    // Print selected range
    o.innerText = `${a.value}€ - ${b.value}€ / day`;
}

// Number of discrete steps in an input range
function stepsIn(el) {
    return Number(el.max) - Number(el.min) + 1;
}