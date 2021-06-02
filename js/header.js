function toogleSidebar() {
    const eleSidebar = document.getElementsByClassName("header-sidebar")[0]
    const eleHamburgerIcon = document.getElementsByClassName("hamburger-icon")[0]

    if (eleSidebar.classList.contains("active")) {
        eleSidebar.classList.remove("active")
        eleHamburgerIcon.classList.remove("active")
    } else {
        eleSidebar.classList.add("active")
        eleHamburgerIcon.classList.add("active")
    }
}