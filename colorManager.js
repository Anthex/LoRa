if(getCookie('tempColor')){
  document.getElementById("tempColor").value = getCookie('tempColor')
}else{
  document.getElementById("tempColor").value = "FAFAFA"
  setCookie('tempColor', "FAFAFA", 30)
}
if(getCookie('hygroColor')){
  document.getElementById("hygroColor").value = getCookie('hygroColor')
}else{
  document.getElementById("hygroColor").value = "53E9FF"
  setCookie('hygroColor', "53E9FF", 30)
}
function updateColorSetCookie(){
  updateColor();
  setCookie('tempColor', document.getElementById("tempColor").value, 30 );
  setCookie('hygroColor', document.getElementById("hygroColor").value, 30 );
}