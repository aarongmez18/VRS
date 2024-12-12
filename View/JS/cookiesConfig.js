
// DOCUMENTO DE PRUEBA, NO SE INCLUYE EN EL PROYECTO FINAL
document.addEventListener('DOMContentLoaded', (event) => {
    const cookieBanner = document.querySelector('.cookie-banner');
    const acceptButton = document.querySelector('.accept');
    const configButton = document.querySelector('.config');
    const closeButton = document.querySelector('.close');
    const configModal = document.querySelector('.cookie-config-modal');
    const saveConfigButton = document.querySelector('.save-config');

    // Mostrar el banner de cookies si no se ha aceptado/rechazado anteriormente
    if (!localStorage.getItem('cookiesAccepted')) {
        cookieBanner.style.display = 'block';
    }

    acceptButton.addEventListener('click', () => {
        handleCookiesAcceptance(true);
    });

    configButton.addEventListener('click', () => {
        configModal.style.display = 'block';
    });

    closeButton.addEventListener('click', () => {
        cookieBanner.style.display = 'none';
    });

    saveConfigButton.addEventListener('click', () => {
        const preferences = getCookiePreferences();
        handleCookiesAcceptance(true, preferences);
    });

    function handleCookiesAcceptance(accepted, preferences = {}) {
        if (accepted) {
            localStorage.setItem('cookiesAccepted', true);
            localStorage.setItem('cookiePreferences', JSON.stringify(preferences));
            alert('Has aceptado las cookies.');
        } else {
            localStorage.setItem('cookiesAccepted', false);
            alert('Has rechazado las cookies.');
        }
        cookieBanner.style.display = 'none';
        configModal.style.display = 'none';
    }

    function getCookiePreferences() {
        const preferences = {};
        document.querySelectorAll('.cookie-preference').forEach(input => {
            preferences[input.name] = input.checked;
        });
        return preferences;
    }
});