function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

//hamburger icon function
function myFunction1() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

let addToCartButtons = document.getElementsByClassName("btn-primary");
let cartContainer = document.getElementsByTagName("tbody")[0];
let quantityFields = document.getElementsByClassName("num");
let delete_buttons = document.getElementsByClassName("btn-dan");

// picking up all the Add-To-Cart buttons
for (let i = 0; i < addToCartButtons.length; i++) {
  addToCartButtons[i].addEventListener("click", addToCart);
}
// This function helps to add items to our cart
function addToCart(event) {
  let itemContainer = document.createElement("tr");
  let btn = event.target;
  let btnGrandParent = btn.parentElement.parentElement;
  let btnParent = btn.parentElement;
  let itemImage = btn.getAttribute("data-image");
  let itemName = btn.getAttribute("data-name");
  let itemPrice = btn.getAttribute("data-price");
  var x = document.getElementById("shop-alert");
  document.getElementById("cartcon").style.display = "block";
  setTimeout(() => {
    document.getElementById("cartcon").style.display = "none";
  }, 2000);

  x.style.opacity = "1";
  // alert(itemName + " " + "has been added to your cart");

  itemContainer.innerHTML = `
    <td><img class="uk-preserve-width uk-border-circle" src=${itemImage} width="40" alt=""></td>
    <td class="link">
        <h3 class = "item-name">${itemName}</h3>
    </td>
    <td class="item-price"><h3>${itemPrice}</h3></td>
    <td><input type = 'number' class = 'num' value = '1'></td>
    <td class="total-price"><h3>${itemPrice}</h3></td>
    <td><button class="btn-dan" type="button">Remove</button></td>
`;

  cartContainer.append(itemContainer);

  // Accessing individual quantity fields
  for (let i = 0; i < quantityFields.length; i++) {
    quantityFields[i].value = 1;
    quantityFields[i].addEventListener("change", totalCost);
  }

  // Accessing individual quantity fields
  for (let i = 0; i < delete_buttons.length; i++) {
    delete_buttons[i].addEventListener("click", removeItem);
  }

  grandTotal();
}

// This function helps to multiply the quantity and the price
function totalCost(event) {
  let quantity = event.target;
  quantity_parent = quantity.parentElement.parentElement;
  price_field = quantity_parent.getElementsByClassName("item-price")[0];
  total_field = quantity_parent.getElementsByClassName("total-price")[0];
  price_field_content = price_field.innerText.replace("R", "");
  total_field.children[0].innerText =
    "R" + quantity.value * price_field_content;
  grandTotal();
  if (isNaN(quantity.value) || quantity.value <= 0) {
    quantity.value = 1;
  }
}

// This function helps to add up the total of the items
function grandTotal() {
  var total = 0;
  let grand_total = document.getElementsByClassName("grand-total")[0];
  all_total_fields = document.getElementsByClassName("total-price");
  for (let i = 0; i < all_total_fields.length; i++) {
    all_prices = Number(all_total_fields[i].innerText.replace("R", ""));
    total += all_prices;
  }
  grand_total.children[0].innerText = "R" + total;
  grand_total.children[0].style.fontWeight = "bold";
  console.log(total);
  localStorage.setItem("total", total);
}
//removes items from cart
function removeItem(event) {
  del_btn = event.target;
  del_btn_parent = del_btn.parentElement.parentElement;
  del_btn_parent.remove();
  console.log(del_btn);
  grandTotal();
}

//displays and hide red dot show on cart icon
function myFunction6() {
  var x = document.getElementById("shop_cart");
  x.style.display = "none";
  var y = document.getElementById("shop-alert");
  y.style.opacity = "0";
}

let buyButtons = document.getElementsByClassName("btn-buy");

// picking up all the buy now buttons
for (let i = 0; i < buyButtons.length; i++) {
  buyButtons[i].addEventListener("click", buyNow);
}
// This function helps us to identify which items are being bought
function buyNow(event) {
  let btn = event.target;
  let bitemImage = btn.getAttribute("data-image");
  let bitemName = btn.previousElementSibling.getAttribute("data-name");
  let bitemPrice = btn.previousElementSibling.getAttribute("data-price");

  console.log(bitemPrice);
  localStorage.setItem("bitemPrice", bitemPrice);
}
///Prevents user from paying without enter their details
function checkForm() {
  var FirstName = document.querySelector("#FirstN");
  var EmailAdd = document.querySelector("#EmailA");
  var BillAd = document.querySelector("#BillA");
  var City = document.querySelector("#City");
  var Zip = document.querySelector("#Zip");
  var CardNum = document.querySelector("#CardNub");
  var CardName = document.querySelector("#CardNam");
  var Exp = document.querySelector("#Exp");
  var Cvv = document.querySelector("#Cvv");
  if (
    FirstName.value === "" ||
    EmailAdd.value === "" ||
    BillAd.value === "" ||
    City.value === "" ||
    Zip.value === "" ||
    CardNum.value === "" ||
    CardName.value === "" ||
    Exp.value === "" ||
    Cvv.value === ""
  ) {
    //error message if user enters nothing
    $("#errorpty").show();
    setTimeout(() => {
      $("#errorpty").hide();
    }, 2500);
  } else {
    //completed payment message if user enters there details
    $("#completepty").show();
    setTimeout(() => {
      $("#completepty").hide();
    }, 2500);
    document.getElementById("CompleteIt").reset();
    document.location.href = "index.html";
  }
}

function checkForm2() {
  var FirstName2 = document.querySelector("#FirstN");
  var EmailAdd2 = document.querySelector("#EmailA");
  var BillAd2 = document.querySelector("#BillA");
  var City2 = document.querySelector("#City");
  var Zip2 = document.querySelector("#Zip");
  var CardNum2 = document.querySelector("#CardNub");
  var CardName2 = document.querySelector("#CardNam");
  var Exp2 = document.querySelector("#Exp");
  var Cvv2 = document.querySelector("#Cvv");
  if (
    FirstName2.value === "" ||
    EmailAdd2.value === "" ||
    BillAd2.value === "" ||
    City2.value === "" ||
    Zip2.value === "" ||
    CardNum2.value === "" ||
    CardName2.value === "" ||
    Exp2.value === "" ||
    Cvv2.value === ""
  ) {
    $("#errorpty").show();
    setTimeout(() => {
      $("#errorpty").hide();
    }, 2500);
  } else {
    $("#completepty").show();
    setTimeout(() => {
      $("#completepty").hide();
    }, 2500);
    document.getElementById("Complete").reset();
    document.location.href = "index.html";
  }
}
//prevents auto submission on payment form
$(document).ready(function () {
  $("#payMen").click(function (event) {
    event.preventDefault();
  });
});
//shows cart onclick
$(".fa-shopping-cart").on("click", function () {
  $(".shop_cart").show();
});

//hides cart onclick
$(".fa-window-close").on("click", function () {
  $(".shop_cart").hide();
});

var buyValue = localStorage.getItem("bitemPrice");
let el2 = document.getElementById("bpmt-total");
if (el2 !== null) {
  document.getElementById("bpmt-total").innerHTML = "R" + buyValue;
} else {
  //do nothing
}

var buyValue1 = localStorage.getItem("bitemPrice");
let el3 = document.getElementById("bpmt-total2");
if (el3 !== null) {
  var buyValue2 = (buyValue1 * 115) / 100;
  document.getElementById("bpmt-total2").innerHTML = "R" + buyValue2;
} else {
  //do nothing
}

var buyValue3 = localStorage.getItem("bitemPrice");
let el4 = document.getElementById("bpmt-total3");
if (el4 !== null) {
  var buyValue4 = (buyValue3 * 15) / 100;
  document.getElementById("bpmt-total3").innerHTML = "R" + buyValue4;
} else {
  //do nothing
}

var totalValue = localStorage.getItem("total");
let el5 = document.getElementById("pmt-total");
if (el5 !== null) {
  document.getElementById("pmt-total").innerHTML = "R" + totalValue;
} else {
  //do nothing
}

var totalValue1 = localStorage.getItem("total");
let el6 = document.getElementById("pmt-total2");
if (el6 !== null) {
  var totalValue2 = (totalValue1 * 115) / 100;
  document.getElementById("pmt-total2").innerHTML = "R" + totalValue2;
} else {
  //do nothing
}

var totalValue3 = localStorage.getItem("total");

let el7 = document.getElementById("pmt-total3");
if (el7 !== null) {
  var totalValue4 = (totalValue3 * 15) / 100;
  document.getElementById("pmt-total3").innerHTML = "R" + totalValue4;
} else {
  //do nothing
}
