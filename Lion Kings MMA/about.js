// Function to adjust the font size and button container based on window width
function adjustButtonFontSize() {
    var windowWidth = window.innerWidth;
    var fullScreenWidth = window.screen.width;
    var threshold = fullScreenWidth * 0.7;
    var buttons = document.getElementsByClassName('button');
    var buttonsContainer = document.querySelector('.buttons-container');

    // If the window width is less than or equal to 70% of the screen width
    if (windowWidth <= threshold) {
        // Set the font size of all buttons to 27px
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].style.fontSize = '27px';
        }

        // Change the button container to wrap buttons to the next line
        buttonsContainer.style.flexWrap = 'wrap';
    } else {

        // Reset the font size of all buttons
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].style.fontSize = '';
        }

        // Reset the button container
        buttonsContainer.style.flexWrap = '';
    }
}

// Call the adjustButtonFontSize function when the window is resized
window.addEventListener('resize', adjustButtonFontSize);

// Call the adjustButtonFontSize function on page load
window.addEventListener('load', adjustButtonFontSize);



/* 
Function that ajust image-container size based on text-container size. The text container size changes when the windows is resized.
It also changes the info-container contents direction to column instead of rows when the windows width is less than 70%.
The info-containers contents also change position to make text-container before image-container when changing to columns.
*/
function adjustContainers() {
    var windowWidth = window.innerWidth;
    var infoContainers = document.querySelectorAll('.info-container');
    var fullScreenWidth = window.screen.width;
    var threshold = fullScreenWidth * 0.7;

    // Iterate through each info container
    infoContainers.forEach((infoContainer) => {
        var textContainer = infoContainer.querySelector('.text-container');
        var imageContainer = infoContainer.querySelector('.image-container');

        // Set the height of the image container equal to the height of the text container
        imageContainer.style.height = `${textContainer.offsetHeight}px`;

        // Check if the window width is below the threshold
        if (windowWidth < threshold) {
            // Check if the image container is before the text container in the DOM
            if (imageContainer.previousElementSibling === textContainer) {
                infoContainer.style.flexDirection = 'column'; // Set the layout to regular columns
            } else {
                infoContainer.style.flexDirection = 'column-reverse'; // Set the layout to reverse columns
            }
            infoContainer.style.alignItems = 'stretch'; // Stretch items vertically

        } else {
            infoContainer.style.flexDirection = 'row'; // Set the layout to rows
            infoContainer.style.alignItems = ''; // Reset the vertical alignment          
            imageContainer.style.height = `${textContainer.offsetHeight}px`; // Reset the height of the image container
        }
    });
}

// Call the adjustContainers function when the window is resized
window.addEventListener('resize', adjustContainers);

// Call the adjustContainers function when the page is loaded
window.addEventListener('load', adjustContainers);



// Smooth scrolling to info-containers when buttons are clicked
document.addEventListener('load', function () {
    const buttons = document.querySelectorAll('.button');

    buttons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const targetId = button.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            targetElement.scrollIntoView({ behavior: 'smooth' });
        });
    });
});