// Get modal and buttons
const modal = document.getElementById("questionnaireModal");
const evaluateButtons = document.querySelectorAll(".evaluate-button");
const closeButton = document.querySelector(".close");

// Show modal on button click
evaluateButtons.forEach(button => {
    button.addEventListener("click", () => {
        modal.style.display = "block";
    });
});

// Hide modal on close
closeButton.addEventListener("click", () => {
    modal.style.display = "none";
});

// Close modal if clicked outside
window.addEventListener("click", event => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

// Redirects to index 
function redirectToIndex() {
    window.location.href = 'index.html'; 
}

function handleSubmit(event) {
    event.preventDefault(); 
    redirectToIndex();
}


// takes class info and submits to php backend
function forwardDataStorage(classNbr, courseID, subject, description, instructor) {
    // Store data in sessionStorage (data will persist only for this browser session)
    sessionStorage.setItem('classNbr', classNbr);
    sessionStorage.setItem('courseID', courseID);
    sessionStorage.setItem('subject', subject);
    sessionStorage.setItem('description', description);
    sessionStorage.setItem('instructor', instructor);
    
    // Redirect to the next page
    window.location.href = 'eval.html';
}


// const classNbr = sessionStorage.getItem('classNbr');
// console.log(classNbr);
// console.log("here");
// document.getElementById('class-number').textContent = classNbr;


