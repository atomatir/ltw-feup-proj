<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/js/main.js"></script>

<script>
var rangeDates = [];
var oneDates = [];

let docRangeDates = document.getElementsByClassName("range-date");
let doconeDates = document.getElementsByClassName("one-date");

for(let e of docRangeDates){
  rangeDates[e.id] = (
    new Litepicker(
      {
        element:e,
        autoApply:true,
        firstDay:0,
        singleMode:false,
        minDate: Date(),
        disallowLockDaysInRange:true
      }
    )
  );
}


for(let e of doconeDates){
  oneDates[e.id] = (
    new Litepicker(
      {
        element:e,
        autoApply:true,
        firstDay:0,
        singleMode:true,
        minDate: Date()
      }
    )
  );
}

</script>