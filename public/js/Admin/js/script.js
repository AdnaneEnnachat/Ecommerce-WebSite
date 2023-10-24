const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');




// allSideMenu.forEach(item=> {

//  const li = item.parentElement;




//  item.addEventListener('click', function () {

//      allSideMenu.forEach(i=> {

//          i.parentElement.classList.remove('active');

//      })

//      li.classList.add('active');

//  })

// });




// get the last active menu item from localStorage, or default to the first one

let activeMenuItem = localStorage.getItem('activeMenuItem') || allSideMenu[0].getAttribute('href');




// loop through all the menu items and add click event listeners

allSideMenu.forEach(item=> {

    const li = item.parentElement;

    const href = item.getAttribute('href');



    // set the active class on the last active menu item

    if (href === activeMenuItem) {

        li.classList.add('active');

    }




    item.addEventListener('click', function (e) {

        allSideMenu.forEach(i=> {

            i.parentElement.classList.remove('active');

        })

        li.classList.add('active');



        // store the clicked menu item in localStorage

        localStorage.setItem('activeMenuItem', href);

    })

});




// when the page loads, set the last active menu item as active

const lastActiveMenuItem = document.querySelector(`#sidebar .side-menu.top li a[href="${activeMenuItem}"]`);

if (lastActiveMenuItem) {

    lastActiveMenuItem.parentElement.classList.add('active');

}










// TOGGLE SIDEBAR

const menuBar = document.querySelector('#content nav .bx.bx-menu');

const sidebar = document.getElementById('sidebar');




menuBar.addEventListener('click', function () {

    sidebar.classList.toggle('hide');

})










const searchButton = document.querySelector('#content nav form .form-input button');

const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');

const searchForm = document.querySelector('#content nav form');




searchButton.addEventListener('click', function (e) {

    if(window.innerWidth < 576) {

        e.preventDefault();

        searchForm.classList.toggle('show');

        if(searchForm.classList.contains('show')) {

            searchButtonIcon.classList.replace('bx-search', 'bx-x');

        } else {

            searchButtonIcon.classList.replace('bx-x', 'bx-search');

        }

    }

})








if(window.innerWidth < 768) {

    sidebar.classList.add('hide');

} else if(window.innerWidth > 576) {

    searchButtonIcon.classList.replace('bx-x', 'bx-search');

    searchForm.classList.remove('show');

}





window.addEventListener('resize', function () {

    if(this.innerWidth > 576) {

        searchButtonIcon.classList.replace('bx-x', 'bx-search');

        searchForm.classList.remove('show');

    }

})






