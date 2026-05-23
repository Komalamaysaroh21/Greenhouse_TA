
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



// refresh button
let scrollTimeout;

const refreshBtn =
    document.getElementById('refreshBtn');

const mainContent =
    document.getElementById('mainContent');

function hideButton() {

    refreshBtn.classList.add(
        'translate-y-24',
        'opacity-0',
        'pointer-events-none'
    );

    refreshBtn.classList.remove(
        'translate-y-0',
        'opacity-100'
    );

}

function showButton() {

    refreshBtn.classList.remove(
        'translate-y-24',
        'opacity-0',
        'pointer-events-none'
    );

    refreshBtn.classList.add(
        'translate-y-0',
        'opacity-100'
    );

}

if(mainContent){

    mainContent.addEventListener('scroll', function(){

        hideButton();

        clearTimeout(scrollTimeout);

        scrollTimeout = setTimeout(() => {

            showButton();

        }, 300);

    });

}