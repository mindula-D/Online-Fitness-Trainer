function change1() {
    document.getElementById("changes1").className = "changing";
    document.getElementById("changes2").className = "nochanging";
    document.getElementById("changes3").className = "nochanging";
}
function change2() {
    document.getElementById("changes1").className = "nochanging";
    document.getElementById("changes2").className = "changing";
    document.getElementById("changes3").className = "nochanging";
}
function change3() {
    document.getElementById("changes1").className = "nochanging";
    document.getElementById("changes2").className = "nochanging";
    document.getElementById("changes3").className = "changing";
}
function change4() {
    document.getElementById("changes4").className = "changing";
    document.getElementById("changes5").className = "nochanging";
    document.getElementById("changes6").className = "nochanging";
}
function change5() {
    document.getElementById("changes4").className = "nochanging";
    document.getElementById("changes5").className = "changing";
    document.getElementById("changes6").className = "nochanging";
}
function change6() {
    document.getElementById("changes4").className = "nochanging";
    document.getElementById("changes5").className = "nochanging";
    document.getElementById("changes6").className = "changing";
}


function billing() {
    var packageValue=0, total = 0;
    var package = document.form1.basic.value;
    var term = document.form1.one.value;
    var lname = document.form1.lname.value;
    var fname = document.form1.fname.value;
    var card = document.form1.cnum.value;
    var id = document.form1.idnum.value;
    var cvv = document.form1.cvv.value;
    var date = document.form1.date.value;
    console.log(package);
    console.log(term);
    console.log(fname);
    console.log(lname);
    console.log(card);
    console.log(id);
    console.log(cvv);
    console.log(date);
    if ((package!="")&&(term!="")&&(lname!="")&&(fname!="")&&(card!="")&&(id!="")&&(cvv!="")&&(date!="")) {
        document.getElementById("namep").innerHTML = (fname+" "+lname);
        document.getElementById("idp").innerHTML = (id);
        document.getElementById("packagep").innerHTML = (package);
        document.getElementById("termp").innerHTML = (term);  
        switch (package) {
            case "Basic":
                packageValue = 25;
                break;
            case "Premium":
                packageValue = 45;
                break;
            case "Optimum":
                packageValue = 50;
                break;
            default:
                break;
        }
        switch (term) {
            case "1 Month":
                total = total + packageValue;
                break;
            case "6 Month":
                total = total + packageValue*6;
                break;
            case "1 Year":
                total = total + packageValue*12;
                break;
            default:
                break;
        }
        document.getElementById("value").innerHTML = ("$ "+total+".00"); 
    }
    else{
        alert("Please Enter All Details");
    }
}