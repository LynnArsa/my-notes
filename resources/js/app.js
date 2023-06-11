window.addEventListener('DOMContentLoaded', () => {
    const bgBodyElements = document.querySelectorAll('.bg-body');
    const rightContent = document.getElementById('rightContent');

    bgBodyElements.forEach((element) => {
        element.addEventListener('click', () => {
            const clone = element.cloneNode(true);
            clone.classList.remove('hover:bg-secondary');

            while (rightContent.firstChild) {
                rightContent.firstChild.remove();
            }

            rightContent.appendChild(clone);
        });
    });
});
