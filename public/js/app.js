
document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById('toast');

    if (toast) {
        // masuk dari kanan
        setTimeout(() => {
            toast.classList.remove('translate-x-full', 'opacity-0');
        }, 100);

        // hilang otomatis
        setTimeout(() => {
            toast.classList.add('translate-x-full', 'opacity-0');
        }, 3000);
    }
});


