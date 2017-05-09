var curModal;

function openModal(modal)
{       curModal = modal;
        modal.style.display = "block";
}
function closeWithSpan(modal)
{
        modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == curModal) {
      curModal.style.display = "none";
    }
}
