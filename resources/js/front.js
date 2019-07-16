function signature_printout() {
    var date = new Date();
    console.log( "called" );
    alert("test" );
    return document.getElementById( "signature" ).innerHTML = "Anur Basic" + date.getFullYear() + ".";
}