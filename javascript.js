function updateMenuOrder(){
    const menuList = document.getElementById("sortable");
    const menuListOrderLi = menuList.getElementsByTagName("li");
    var index = 0;
    var arr1 = [];
    for (let li of menuListOrderLi) {
        arr1.push(li.dataset.indexNumber);
        index++;
    }
    document.cookie='menuList1='+ arr1; 

    location.href = 'update-menu';
}