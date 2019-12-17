window.onload = function () {
  document.getElementById('thumbnail').addEventListener('change',showPicThumb);
}

var k = 0;

function showPicThumb(evt) {
  let div = document.getElementById('images');
  let img = document.getElementById('thumbnail-pic');
  let reader = new FileReader();
  reader.onload = function () {
    let file = evt.target.files[0];
    let mime_types = ['image/png'];

    if (mime_types.indexOf(file.type) == -1) {
      alert('Error : Incorrect file type');
      return;
    }

    img.src = reader.result;

    let ndiv = document.createElement('div');
    let input = document.createElement('input');
    input.type = "file";
    input.id = "image-" + k + "inpt";
    input.name = "image-" + k;
    input.accept = "image/png";
    ndiv.id = "image-" + k;
    input.addEventListener('change', showImage);
    ndiv.appendChild(input);
    div.appendChild(ndiv);





  }
  reader.readAsDataURL(evt.target.files[0]);

}



function showImage(evt) {
  let div = document.getElementById('images');
  let innerdiv = document.getElementById('image-' + k);
  let reader = new FileReader();
  reader.onload = function () {
    let file = evt.target.files[0];
    let mime_types = ['image/png'];

    if (mime_types.indexOf(file.type) == -1) {
      alert('Error : Incorrect file type');
      return;
    }

    
    let ndiv = document.createElement('div');
    let input = document.createElement('input');
    let img = document.createElement('img');
    img.id = "image-image-" + k; 
    img.src = reader.result;
    input.type = "file";
    input.id = "image-" + k + "inpt";
    input.name = "image-" + k;
    input.accept = "image/png";
    ndiv.id = "image-" + k;
    input.addEventListener('change', showImage);
    ndiv.appendChild(input);
    ndiv.appendChild(img);
    div.appendChild(ndiv);
    k += 1;




  }
  reader.readAsDataURL(evt.target.files[0]);
}