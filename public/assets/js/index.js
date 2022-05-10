// $(document).ready(function(){
//     $('a').click(function() {
//         $("a.active").removeClass("nav-tabs active ");
//         $(this).addClass('nav-tabs active ');
//     })})

// $(function() {
//
//     $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//         localStorage.setItem('lastTab', $(this).attr('href'));
//     });
//     const lastTab = localStorage.getItem('lastTab');
//
//     if (lastTab) {
//         $('[href="' + lastTab + '"]').tab('show');
//     }
// });


activaTab('bbb');
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
