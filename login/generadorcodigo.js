const generatePassword = (base, length) => {
    let password = "";
    for (let x = 0; x < length; x++) {
        let random = Math.floor(Math.random() * base.length);
        password += base.charAt(random);
    }
    return password;
};


    const length = 10;

    var base = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numbers = "0123456789";
    const symbols = ".?,;-_¡!¿*%&$/()[]{}|@><";

    base += numbers;

    base += symbols;

    


const generateas = () => {
    let length = 10;

    let base = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numbers = "0123456789";
    const symbols = ".?,;-_¡!¿*%&$/()[]{}|@><";

    base += numbers;

    base += symbols;

    let asd = generatePassword(base, length);
}


window.addEventListener("DOMContentLoaded", () => {
        generate();
});
var asd
asd = generatePassword(base, length);
document.write (asd);
var Myelement = document.getElementById("texto");
console.log(Myelement.value);
Myelement.value = asd;
console.log(Myelement.value);