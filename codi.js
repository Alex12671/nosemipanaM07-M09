function selectValue() {
    var form = document.getElementById("filterForm");
    var filtro = document.getElementById("filter");
    var value = filtro.value;
    var input = document.getElementById("userSearch");
    var select = document.getElementById("statusSearch");
    if(filtro.value == "userFilter") {
        input.setAttribute("type","text");
        select.setAttribute("hidden","");
        
    }
    else if(filtro.value == "statusFilter") {
        input.setAttribute("type","hidden");
        select.removeAttribute("hidden");
        
    }
    else {
        input.setAttribute("type","hidden");
        select.setAttribute("hidden","");
    }
}

function changePassword() {
    var checkbox = document.getElementById("passwdCheckbox");
    var password = document.getElementById("passwd");
    if(checkbox.checked) {
        password.setAttribute("type","text");
    }
    else {
        password.setAttribute("type","hidden");
    }
}

function openSidebar() {
    var sidebar = document.getElementById("cartSidebar");
    sidebar.style.width = "25%";

}

function closeSidebar () {
    var sidebar = document.getElementById("cartSidebar");
    sidebar.style.width = "0";
}