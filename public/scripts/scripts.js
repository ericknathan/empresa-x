const newButton = document.getElementById('add__new');
const cancelButton = document.querySelectorAll('.cancel');
const sendButton = document.getElementById('send');
const newModal = document.getElementById('add__modal');
const modalBackground = document.querySelectorAll('.bg');

newButton.addEventListener('click', openNewModal);
cancelButton.forEach((button) => button.addEventListener('click', closeModal));
modalBackground.forEach((bg) => bg.addEventListener('click', closeModal));

function openNewModal() {
  newModal.style.display = 'flex';
}

function closeModal() {
  newModal.style.display = 'none';
}

function deleteUser(userId) {
  let confirmation = confirm(`Deseja deletar o usuário ${userId}?`);
  if (confirmation) {
    window.location.href = `./actions/delete.php?id=${userId}`;
  }
}