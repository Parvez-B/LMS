let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
    nav.classList.toggle("navclose");
})


//add div dynamic
document.getElementById('addDivButton').addEventListener('click', function() {
    // Create a new div element
    const newDiv = document.createElement('div');
    
    // Add a class to the new div
    newDiv.classList.add('new-div');
    
    // Add some text to the new div
    newDiv.textContent = 'This is a dynamically created div.';
    
    // Append the new div to the container
    document.getElementById('container').appendChild(newDiv);
});