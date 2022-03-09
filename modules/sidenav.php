<div class="col-3 px-1 position-fixed" style="background-color: #ccc;" id="sticky-sidebar">
    <div class="nav flex-column flex-nowrap vh-100 overflow-auto text-white p-2"> 
        <a class="navlink <?php if($_SERVER['REQUEST_URI'] == "/admin-panel") echo "active";?>" href="./admin-panel"><img src="./images/page.png"/> Strony </a>
        <a class="navlink <?php if($_SERVER['REQUEST_URI'] == "/settings") echo "active";?>" href="./settings"><img src="./images/settings.png"/> Ustawienia </a>
        <a class="navlink <?php if($_SERVER['REQUEST_URI'] == "/menu") echo "active";?>" href="./menu"><img src="./images/menu.png"/> Menu </a>
        <a class="navlink <?php if($_SERVER['REQUEST_URI'] == "/layout") echo "active";?>" href="./layout"><img src="./images/themes.png"/> Szablon </a>
    </div>
</div>