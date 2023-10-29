window.setTimeout("waktu()", 1000);

function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    document.getElementById("jam").innerHTML = waktu.getHours().toString().padStart(2, '0');
    document.getElementById("menit").innerHTML = waktu.getMinutes().toString().padStart(2, '0');
    document.getElementById("detik").innerHTML = waktu.getSeconds().toString().padStart(2, '0');
}
