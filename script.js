// Script simples de confirmação de agendamento
document.getElementById('form-agendamento').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('✅ Agendamento realizado com sucesso!');
    this.reset();
  });
  