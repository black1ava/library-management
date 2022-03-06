const photo = document.getElementById('photo');
const photoLabel = document.getElementById('photo-label');
const image = document.getElementById('image');

if(photoLabel){
  photoLabel.innerText = photo.files[0] ? photo.files[0].name : 'Please choose a profile photo';
  if(image.src === ''){
    image.src = photo.files[0] ? URL.createObjectURL(photo.files[0]) : '';
  }
}


photo?.addEventListener('change', function(event){
  const photo = event.target.files[0];
  const { name } = photo;
  photoLabel.innerText = name;

  const url = URL.createObjectURL(photo);
  image.src = url;
});