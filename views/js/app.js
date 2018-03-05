var hasuser=false;

function check() {
    var data = document.getElementById("email").value;


    if(hasuser){
        alert("Username already exists,Please select another username")
        return false;
    }
    

    console.log(document.getElementById("memtype").checked);
    if (document.getElementById("univ").value == '0' && document.getElementById("memtype").checked ) {
        alert("Please Select a university");
        return false;
    }
    if (document.getElementById("phones").value.length < 10) {
        alert("Phone no should contain 9 or more letter, Eg:- 9800916365 or 021545815");
        return false;
    }

    if(document.getElementById("p1").value.length<7){
        alert("Password should be 6 or more letter");
        return false;
    }
    if (document.getElementById("p1").value == document.getElementById("p2").value){
        var regx = /\S+@\S+\.\S+/;
        if (regx.test(data)) {
            return true;
        } else {
            alert('Please enter valid email');
            return false;
        }
    }else{
        alert('Please match both passwords');
        return false;
    }
   
}

function checkuser(){
    var data1 = document.getElementById("username").value;
    console.log(data1);
    $.post("checkuser.php", { 'uname': data1 }, function (data2) {
        console.log(data2);
        if (data2 == '1') {
            hasuser=true;
        }else{
            hasuser=false;
        }
    });
}

function checknum(inp){
    console.log(inp);
    if ((inp.which > 47 && inp.which<59)|| (inp.which==8)){
console.log("sucess");
    }else{
        inp.preventDefault();
    }
}

function handleChange(p){
    console.log(p);
    $("#stddata").toggle();
}

function handleChange1(p) {
    if (document.getElementById("univ").value == '0' && document.getElementById("memtype").checked) {
        alert("Please Select a university");
        return false;
    }
    console.log(p);
    var carList = document.getElementById("univ");
    var selCar = carList.options[carList.selectedIndex].value;
    $.post("getcourse.php",{'univid':selCar}, function (data) {
        document.getElementById("course").innerHTML="";
       console.log(data);
       if(data=='null'){
alert("There are no data for this university please make a account without student data");
       }else{
           var obj = JSON.parse(data);
var inner="";
          for(i=0;i<obj.length;i++){
              var x=obj[i];
             inner+="<option value='"+ x.id+"'>"+ x.name+"</option>";
          }
          console.log(inner);
           document.getElementById("course").innerHTML =inner;
       }
    });
}

