const courseModalContainer = document.querySelector(".modal-details");
const courseDetailContainer = document.querySelector(".modal-details-content");
const courseContainers = document.querySelectorAll(".course");

courseContainers.forEach(function(course) {
    var courseID = course.getAttribute("data-course");

    course.addEventListener('click', function() {
        loadCourse(courseID);
    })
});

function loadCourse(courseID) {
    fetch("api/getCourseDetails.php?courseID=" + courseID)
        .then(function(response) {
            return response.json();
        })
        .then(function(courseData) {
            if(courseData.status[0] == 200) {
                constructModal(courseData);
                courseModalContainer.classList.add("open");
            }
        });
}

function closeModal() {
    courseModalContainer.classList.remove("open");
}

function constructModal(courseData) {
    console.log(courseData);

    const modalHolderTitle = document.querySelector("#modalHolderTitle");
    const modalHolderShortDescription = document.querySelector("#modalHolderShortDescription");
    const modalHolderDifficulty = document.querySelector("#modalHolderDifficulty");
    const modalHolderLongDescription = document.querySelector("#modalHolderLongDescription");

    modalHolderTitle.innerHTML = courseData.data.title;
    modalHolderShortDescription.innerHTML = courseData.data.short_description;
}