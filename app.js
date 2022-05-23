function clipboard(){
    var text = document.getElementById("result-text");
    text.select();
    text.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(text.value);
}