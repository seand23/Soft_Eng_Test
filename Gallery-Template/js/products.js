function TheTotal1() {
    let NewWorld = 150;
    let quantity1 = document.querySelector("#quantity1").value;
    aTotal1 = (NewWorld * quantity1);
    aTotal1 = aTotal1.toFixed(2);
    document.querySelector("#aTotal1").innerHTML = aTotal1;
}
function TheTotal2() {
    let Headset = 200;
    let quantity2 = document.querySelector("#quantity2").value;
    aTotal2 = (Headset * quantity2);
    aTotal2 = aTotal2.toFixed(2);
    document.querySelector("#aTotal2").innerHTML = aTotal2;
}

function TheTotal3() {
    let NewWorldRebirth = 350;
    let quantity3 = document.querySelector("#quantity3").value;
    aTotal3  = (NewWorldRebirth * quantity3);
    aTotal3 = aTotal3.toFixed(2);
    document.querySelector("#aTotal3").innerHTML = aTotal3;
}
function TheTotal4() {
    let SoftMerch1 = 15;
    let quantity4 = document.querySelector("#quantity4").value;
    aTotal4  = (SoftMerch1 * quantity4);
    aTotal4 = aTotal4.toFixed(2);
    document.querySelector("#aTotal4").innerHTML = aTotal4;
}
function TheTotal5() {
    let SoftMerch2 = 25;
    let quantity5 = document.querySelector("#quantity5").value;
    aTotal5  = (SoftMerch2 * quantity5);
    aTotal5 = aTotal5.toFixed(2);
    document.querySelector("#aTotal5").innerHTML = aTotal5;
}
function TheTotal6() {
    let SoftMerch3 = 50;
    let quantity6 = document.querySelector("#quantity6").value;
    aTotal6  = (SoftMerch3 * quantity6);
    aTotal6 = aTotal6.toFixed(2);
    document.querySelector("#aTotal6").innerHTML = aTotal6;
}

function grandTotal() {
    let NewWorld = 150;
    let Headset = 200;
    let NewWorldRebirth = 350;
    let SoftMerch1 = 15;
    let SoftMerch2 = 25;
    let SoftMerch3 = 50;

    let quantity1 = document.querySelector("#quantity1").value;
    aTotal1 = (NewWorld * quantity1);
    aTotal1 = aTotal1.toFixed(2);
    document.querySelector("#aTotal1").innerHTML = aTotal1;

    let quantity2 = document.querySelector("#quantity2").value;
    aTotal2 = (Headset * quantity2);
    aTotal2 = aTotal2.toFixed(2);
    document.querySelector("#aTotal2").innerHTML = aTotal2;

    let quantity3 = document.querySelector("#quantity3").value;
    aTotal3  = (NewWorldRebirth * quantity3);
    aTotal3 = aTotal3.toFixed(2);
    document.querySelector("#aTotal3").innerHTML = aTotal3;

    let quantity4 = document.querySelector("#quantity4").value;
    aTotal4  = (SoftMerch1 * quantity4);
    aTotal4 = aTotal4.toFixed(2);
    document.querySelector("#aTotal4").innerHTML = aTotal4;

    let quantity5 = document.querySelector("#quantity5").value;
    aTotal5  = (SoftMerch2 * quantity5);
    aTotal5 = aTotal5.toFixed(2);
    document.querySelector("#aTotal5").innerHTML = aTotal5;

    let quantity6 = document.querySelector("#quantity6").value;
    aTotal6  = (SoftMerch3 * quantity6);
    aTotal6 = aTotal6.toFixed(2);
    document.querySelector("#aTotal6").innerHTML = aTotal6;

    subTotal = (NewWorld * quantity1) + (Headset * quantity2) + (NewWorldRebirth * quantity3) + (SoftMerch1 * quantity4) + (SoftMerch2 * quantity5) + (SoftMerch3 * quantity6);
    subTotal = subTotal.toFixed(2);
    total = subTotal;
    
    document.querySelector("#total").innerHTML = total;
}

function myFunction() {
    let NewWorld = 150;
    let Headset = 200;
    let NewWorldRebirth = 350;
    let SoftMerch1 = 15;
    let SoftMerch2 = 25;
    let SoftMerch3 = 50;
    let ship = 25;

    let quantity1 = document.querySelector("#quantity1").value;
    let quantity2 = document.querySelector("#quantity2").value;
    let quantity3 = document.querySelector("#quantity3").value;
    let quantity4 = document.querySelector("#quantity4").value;
    let quantity5 = document.querySelector("#quantity5").value;
    let quantity6 = document.querySelector("#quantity6").value;

    subTotal = (NewWorld * quantity1) + (Headset * quantity2) + (NewWorldRebirth * quantity3) + (SoftMerch1 * quantity4) + (SoftMerch2 * quantity5) + (SoftMerch3 * quantity6) + ship;
    subTotal = subTotal.toFixed(2);
    total = subTotal





    document.querySelector("#total").innerHTML = total;




    if (confirm("Your total including shipping is " + total + "\nIf you are ready to pay please press ok.\nIf otherwise, please cancel ")) {
        window.location = "shipping.html";
      } else {
        // Do nothing, or display a message, or perform some other action
      }
      
  }