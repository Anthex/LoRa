
<p>
  changer les couleurs  
</p>
<input  onchange="updateColorSetCookie()" id="tempColor"  class="jscolor {{onFineChange:'updateColor()'} valueElement:null}"  style="width:50px; height:20px;"></input>
<input  onchange="updateColorSetCookie()" id="hygroColor"  class="jscolor {{onFineChange:'updateColor()'} valueElement:null}" style="width:50px; height:20px;"></input>

<script>
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}
 
if(getCookie('tempColor')){
  document.getElementById("tempColor").value = getCookie('tempColor')
}else{
  document.getElementById("tempColor").value = "FAFAFA"
  setCookie('tempColor', "FAFAFA", 7)
}
  
if(getCookie('hygroColor')){
  document.getElementById("hygroColor").value = getCookie('hygroColor')
}else{
  document.getElementById("hygroColor").value = "53E9FF"
  setCookie('hygroColor', "53E9FF", 7)
}
  
function updateColorSetCookie(){
  updateColor();
  setCookie('tempColor', document.getElementById("tempColor").value, 7 );
  setCookie('hygroColor', document.getElementById("hygroColor").value, 7 );
}
</script>