const rainContainer = document.querySelector('.rain');

function createRaindrop() {
    const raindrop = document.createElement('div');
    raindrop.classList.add('raindrop');
    raindrop.style.left = `${Math.random() * 100}vw`;
    raindrop.style.animationDuration = `${Math.random() * 2 + 1}s`;
    rainContainer.appendChild(raindrop);

    setTimeout(() => {
        raindrop.remove();
    }, 3000);
}

setInterval(createRaindrop, 100);
