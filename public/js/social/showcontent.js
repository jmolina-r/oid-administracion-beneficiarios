function showContent(idelement,idcheck) {
            element = document.getElementById(idelement);
            check = document.getElementById(idcheck);
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
}