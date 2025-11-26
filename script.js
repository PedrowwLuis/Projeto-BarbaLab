// ========================================
// SISTEMA DE TEMA ESCURO/CLARO COM DRAG
// ========================================

let isDragging = false;
let startX = 0;
let hasDragged = false;

const themeToggle = document.getElementById('themeToggle');

if (themeToggle) {
    // Eventos de mouse
    themeToggle.addEventListener('mousedown', startDrag);
    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', endDrag);

    // Eventos de touch para mobile
    themeToggle.addEventListener('touchstart', startDrag, { passive: false });
    document.addEventListener('touchmove', drag, { passive: false });
    document.addEventListener('touchend', endDrag);
}

function startDrag(e) {
    isDragging = true;
    hasDragged = false;
    startX = e.type === 'mousedown' ? e.clientX : e.touches[0].clientX;
    e.preventDefault();
}

function drag(e) {
    if (!isDragging || !startX) return;
    
    const currentX = e.type === 'mousemove' ? e.clientX : e.touches[0].clientX;
    const deltaX = currentX - startX;
    
    // Se arrastar mais de 20px, marca como dragged e alterna o tema
    if (Math.abs(deltaX) > 20) {
        hasDragged = true;
        const isLight = document.body.classList.contains('light-theme');
        
        // Arrasta para direita = tema claro, esquerda = tema escuro
        if (deltaX > 0 && !isLight) {
            toggleTheme();
            resetDrag();
        } else if (deltaX < 0 && isLight) {
            toggleTheme();
            resetDrag();
        }
    }
}

function endDrag(e) {
    if (isDragging && !hasDragged) {
        // Se não arrastou, age como um clique normal
        toggleTheme();
    }
    
    setTimeout(() => {
        isDragging = false;
        startX = 0;
        hasDragged = false;
    }, 50);
}

function resetDrag() {
    startX = 0;
    isDragging = false;
    hasDragged = false;
}

function toggleTheme() {
    document.body.classList.toggle('light-theme');
    
    // Salva a preferência no localStorage
    const isLight = document.body.classList.contains('light-theme');
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
}

// Carrega o tema salvo ao carregar a página
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'light') {
        document.body.classList.add('light-theme');
    }
});

// ========================================
// SCRIPTS DE LOGIN E AGENDAMENTO
// ========================================

// Script de login
document.getElementById('loginForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    if (username === 'admin' && password === '123') {
        alert('✅ Login realizado com sucesso!');
    } else {
        document.getElementById('error-message').textContent = '❌ Usuário ou senha incorretos!';
    }
});

// Script simples de confirmação de agendamento
document.getElementById('form-agendamento')?.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('✅ Agendamento realizado com sucesso!');
    this.reset();
});
