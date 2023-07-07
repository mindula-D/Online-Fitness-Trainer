function function1() {
    var ques1 = document.text1.rate111.value;
    var msg1 = document.getElementById("box").value; 
    var id = document.getElementById("id").value;
    var aid = document.getElementById("aid").value;
    if ((ques1!="")&&(msg1!="")&&(id!="")&&(aid!="")) {
        if (id.length == 10) {
            if (aid.length == 5) {
                alert("Thanks For Your Review.\nYour ID : "+id+"\nArtical ID : "+aid+"\nYou Have Given "+ques1+" For The Article.\nYour Review("+msg1+") Has Noted.");
            }
            else{
                alert("Artical ID Should Be Five Digits.");
            }
        }
        else{
            alert("User ID Should Be Ten Digits.");
        }
    }
    else{
        alert("Please Enter All Details.");
    }   
    
}