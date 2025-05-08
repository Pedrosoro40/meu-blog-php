// Exemplo de funcionalidade JS (opcional)
document.addEventListener('DOMContentLoaded', function() {
    // Menu Mobile (para futura implementação)
    const menuToggle = document.createElement('button');
    menuToggle.className = 'menu-toggle';
    menuToggle.innerHTML = '☰ Menu';
    document.querySelector('.header .container').appendChild(menuToggle);

    menuToggle.addEventListener('click', function() {
        document.querySelector('.nav ul').classList.toggle('active');
    });

    // Efeito de scroll suave para links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});