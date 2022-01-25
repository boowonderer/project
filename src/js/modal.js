const openButtons = document.querySelectorAll('button[openModal]');
const closeButtons = document.querySelectorAll('button[closeModal]');

for (let i = 0; i < openButtons.length; i++) {
    const openButton = openButtons[i];
    const modalId = openButton.attributes.openModal.value;
    openButton.addEventListener("click", () => {
        const modal = document.querySelector(`#${modalId}`);
        if (!modal || modal.style.display === 'flex') return;

        modal.style.display =  'flex';
    });
}

for (let i = 0; i < closeButtons.length; i++) {
    const closeButton = closeButtons[i];
    const modalId = closeButton.attributes.closeModal.value;
    closeButton.addEventListener("click", () => {
        const modal = document.querySelector(`#${modalId}`);
        if (!modal || modal.style.display === 'none') return;

        modal.style.display =  'none';
    });
}