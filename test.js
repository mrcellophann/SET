// takes class info and submits to php backend
function forwardDataStorage(course_Num, course_ID, course_Title, class_Section, class_desc, instructor_name, class_sched) {
    console.log(course_Num, course_ID, course_Title, class_Section, class_desc, instructor_name, class_sched);
    console.log('test.js loaded');

    // Store course information in sessionStorage
    sessionStorage.setItem('course_Num', course_Num);
    sessionStorage.setItem('course_ID', course_ID);
    sessionStorage.setItem('course_Title', course_Title);
    sessionStorage.setItem('class_Section', class_Section);
    sessionStorage.setItem('class_desc', class_desc);
    sessionStorage.setItem('instructor_name', instructor_name);
    sessionStorage.setItem('class_sched', class_sched);

    // Redirect to eval.html
    window.location.href = 'eval.php';
}

const keys = ['course_Num', 'course_ID', 'course_Title', 'class_desc', 'instructor_name'];

keys.forEach(key => {
    const value = sessionStorage.getItem(key);
    const info = document.querySelector(`.${key} .info`);
    if (info) info.textContent = value;
});

// const classNbr = sessionStorage.getItem('classNbr');
// let info = document.querySelector('.classNumber .info');
// info.textContent = classNbr;

// const courseID = sessionStorage.getItem('courseID');
// info = document.querySelector('.courseID .info');
// info.textContent = courseID;

// const subject = sessionStorage.getItem('subject');
// info = document.querySelector('.subject .info');
// info.textContent = subject;

// const description = sessionStorage.getItem('description');
// info = document.querySelector('.description .info');
// info.textContent = description;

// const instructor = sessionStorage.getItem('instructor');
// info = document.querySelector('.instructor .info');
// info.textContent = instructor;