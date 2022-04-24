function chk(){
    let id = (id) => document.getElementById(id);
    let classes = (classes) => document.getElementsByClassName(classes);
    let cname = id("cname"),
    certi = id("certi"),
    pht = id("pht"),
    area = id("area"),
    fnam = id("fnam"),
    snam = id("snam"),
    lnam = id("lnam"),
    em = id("em"),
    ph = id("ph"),
    add = id("add"),
    des = id("des"),
    errorMsg = classes("err");

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        
        engine(cname, 0, "Fill in the blank");
        engine(certi, 1, "Fill in the blank");
        engine(pht, 2, "Fill in the blank");
        engine(area, 3, "Fill in the blank");
        engine(fnam, 4, "Fill in the blank");
        engine(snam, 5, "Fill in the blank");
        engine(lnam, 6, "Fill in the blank");
        engine(em, 7, "Fill in the blank");
        engine(ph, 8, "Fill in the blank");
        engine(add, 9, "Fill in the blank");
        engine(des, 10, "Fill in the blank");
    });
        let engine = (id, serial, message) => {
            // alert(errorMsg[3].value);
        if (id.value.trim() === "") {
            errorMsg[serial].innerHTML = message;
            id.style.border = "2px solid red";
            return false;
        }else if(id.value.trim() != ""){
            return true;
        } else {
            errorMsg[serial].innerHTML = "";
            id.style.border = "2px solid green";
            
            }
        };
    }