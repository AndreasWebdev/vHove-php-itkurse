// This little helper script listens to all uses of the "enter" key and fires the mouse click event on them if they are focussed
function EnterClick(event) {
    if (event.key === "Enter") {
        // Disable the usual action
        event.preventDefault();
        // Trigger the click event
        event.target.click();
    }
}