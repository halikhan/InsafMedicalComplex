/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */

// Scripts

window.addEventListener('DOMContentLoaded', event => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    // Persist collapse state for sidebar items
    const collapseElements = document.querySelectorAll('.collapse');
    const activeCollapse = localStorage.getItem('sb|active-collapse');

    if (activeCollapse) {
        const activeElement = document.getElementById(activeCollapse);
        if (activeElement) {
            activeElement.classList.add('show'); // Ensure it's open on page load
        }
    }

    collapseElements.forEach(collapse => {
        collapse.addEventListener('show.bs.collapse', event => {
            localStorage.setItem('sb|active-collapse', event.target.id);
        });

        collapse.addEventListener('hide.bs.collapse', () => {
            localStorage.removeItem('sb|active-collapse');
        });
    });
});
