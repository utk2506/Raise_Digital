//JS for toggle menu

    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";
    
    function menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
        {
            MenuItems.style.maxHeight = "200px";    
        }
        else
        {
            MenuItems.style.maxHeight = "0px";
        }
    }

//JS for product gallery
    var ProductImg = document.getElementById("ProductImg");
    var SmallImg = document.getElementsByClassName("SmallImg");

    SmallImg[0].onclick = function()
    {
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onclick = function()
    {
        ProductImg.src = SmallImg[1].src;
    }
    SmallImg[2].onclick = function()
    {
        ProductImg.src = SmallImg[2].src;
    }
    SmallImg[3].onclick = function()
    {
        ProductImg.src = SmallImg[3].src;
    }
    
//JS for toggle form
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");
    
    function register(){
        document.getElementById("RegForm").style.transform = "translateX(0px)";
        document.getElementById("LoginForm").style.transform = "translateX(0px)";
        document.getElementById("Indicator").style.transform = "translateX(100px)";
    }
    function login(){
        document.getElementById("RegForm").style.transform = "translateX(300px)";
        document.getElementById("LoginForm").style.transform = "translateX(300px)";
        document.getElementById("Indicator").style.transform = "translateX(0px)";
    }
