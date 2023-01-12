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
    if(window.screen.width >= 300 && window.screen.width <= 600){
        sidebar.style.width = "100%";
    }
    else{
        sidebar.style.width = "25%";
    }

}

function closeSidebar () {
    var sidebar = document.getElementById("cartSidebar");
    sidebar.style.width = "0";
}

function checkQuantityInput() {
    var form = document.getElementById("quantityForm");
    var quantity = document.getElementById("quantity").value;
    var maxValue = document.getElementById("quantity").max;
    if(quantity <= 0) {
        alert("Elige un número mayor que 0, puto inútil retrasado de mierda, subnormal que no sabes leer, gilipollas.");
    }
    else {
        if(quantity <= maxValue) {
            form.submit();
            window.location.reload();
        }
        else {
            quantity = maxValue;
            form.submit();
            window.location.reload();
        }
        
    }
    
}
