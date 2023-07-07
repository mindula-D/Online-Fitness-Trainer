//Function for choose button 
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
//Funtion for calculate the additional total
var total = 0.0;
var count1 = 0.0;
var count2 = 0.0;
var count3 = 0.0;
function additionalBilling1() {
    if (count1>0) {
        total=total-30;
        count1= -1;    
    }
    else{
        total = total+30;
    }
    count1++;
    document.getElementById("value").innerHTML = ("$ "+total+".00");
}
function additionalBilling2() {
    if (count2>0) {
        total=total-20;
        count2=-1;    
    }
    else{
        total = total+20;
    }
    count2++;
    document.getElementById("value").innerHTML = ("$ "+total+".00");
}
function additionalBilling3() {
    if (count3>0) {
        total=total-15;
        count3=-1;    
    }
    else{
        total = total+15;
    }
    count3++;
    document.getElementById("value").innerHTML = ("$ "+total+".00");
}

