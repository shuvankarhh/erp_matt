var navLinks = document.querySelectorAll('.nav-link');

// Add click event listener to each nav-link
navLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        
        // Remove the 'active' class from all nav-links
        document.querySelectorAll('.nav-link').forEach(function(link) {
            link.classList.remove('active');
        });

        this.classList.add('active');
    });
});

var option1 = document.getElementById('option1');
var option2 = document.getElementById('option2');
var option3 = document.getElementById('option3');

var body1 = document.getElementById('body1');
var body2 = document.getElementById('body2');
var body3 = document.getElementById('body3');

body1.style.display = 'block';
body2.style.display = 'none';
body3.style.display = 'none';

option1.addEventListener('click', function(event) {
    event.preventDefault();
    
    body1.style.display = 'block';
    body2.style.display = 'none';
    body3.style.display = 'none';
});

option2.addEventListener('click', function(event) {
    event.preventDefault();
    
    body1.style.display = 'none';
    body2.style.display = 'block';
    body3.style.display = 'none';
});

option3.addEventListener('click', function(event) {
    event.preventDefault();
    
    body1.style.display = 'none';
    body2.style.display = 'none';
    body3.style.display = 'block';
});