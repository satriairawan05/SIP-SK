const organisasiAffiliate = document.getElementById('organisasi_affiliate');
const prodi = document.getElementById('prodi');

const hiddenItem = () => {
    prodi.classList.add('d-none');
}

const showItem = () => {
    prodi.classList.remove('d-none');
}

organisasiAffiliate.addEventListener('click', function () {
    if (organisasiAffiliate.checked == 1) {
        showItem();
    } else {
        hiddenItem();
    }
});
