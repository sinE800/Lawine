
// Js navbar scroll stick
document.addEventListener("DOMContentLoaded", function () {
        window.addEventListener('scroll', function () {
            let navbar_height;
            if (window.scrollY > 50) {
                document.getElementById('navbar_top').classList.add('fixed-top');
                // add padding top to show content behind navbar
                navbar_height = document.querySelector('.navbar').offsetHeight;
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                document.getElementById('navbar_top').classList.remove('fixed-top');
                // remove padding top from body
                document.body.style.paddingTop = '0';
            }
        });

    });

// When the user scrolls the page, execute myFunction
// window.onscroll = function() {myFunction()};

// Get the navbar
// const navbar = document.getElementById("navbar_top");

// Get the offset position of the navbar
// const sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
// function myFunction() {
//     if (window.pageYOffset >= sticky) {
//         navbar.classList.add("sticky")
//     } else {
//         navbar.classList.remove("sticky");
//     }
// }

// AJAX Comments articles

// document.addEventListener('DOMContentLoaded', () => {
//     new App()
// } )
// class App {
//     constructor() {
//         this.enableDropdowns();
//         this.handleCommentForm()
//     }
//
//
//     enableDropdowns() {
//         const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
//         dropdownElementList.map(function (dropdownToggleEl){
//             return new Dropdown(dropdownToggleEl)
//         })
//     }
//
//     handleCommentForm(){
//         const commentForm = document.querySelector('form.comment-form');
//
//
//         if (null == commentForm){
//             return;
//         }
//
//         commentForm.addEventListener('submit', async(e) => {
//             e.preventDefault();
//
//
//             const response = await  fetch('/ajax/comments', {
//                 method: 'POST',
//                 body: new FormData(e.target)
//             });
//             if (!response.ok){
//                 return;
//             }
//
//             const json = await response.json();
//
//             console.log(json);
//
//         })
//
//
//
//
//     }
//
//
// }