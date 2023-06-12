import { initializeApp } from "firebase/app";

import {
  getAuth,
  onAuthStateChanged,
  signInWithEmailAndPassword,
  createUserWithEmailAndPassword,
  signOut,
} from "firebase/auth";

import { getDatabase, set, ref, push, update } from "firebase/database";

const firebaseConfig = {
  apiKey: "AIzaSyCKT1_A1vq3-RcjBC4g13YyaTL8id95ZBw",
  authDomain: "boundless-charging-20760.firebaseapp.com",
  databaseURL: "https://boundless-charging-20760-default-rtdb.firebaseio.com",
  projectId: "boundless-charging-20760",
  storageBucket: "boundless-charging-20760.appspot.com",
  messagingSenderId: "335675266042",
  appId: "1:335675266042:web:6f26ba4ab8b4b37abf8a43",
};
//initialize firebase
const app = initializeApp(firebaseConfig);

//gets authentication from firebase
const auth = getAuth();

//gets database from firebase
const database = getDatabase(app);

//displays register form and hides login form
$("#reg-btn").on("click", function () {
  $("#register-div").css("display", "inline");
  $("#login-div").css("display", "none");
});

//displays login form and hides register form
$("#log-btn").on("click", function () {
  $("#login-div").css("display", "inline");
  $("#register-div").css("display", "none");
});

//login form
document.getElementById("login-btn").addEventListener("click", function () {
  //fetches login details from input form
  const loginEmail = document.getElementById("login-email").value;
  const loginPassword = document.getElementById("login-password").value;

  //authenticates users details and logs user in if details are corrret
  signInWithEmailAndPassword(auth, loginEmail, loginPassword)
    .then((userCredential) => {
      const user = userCredential.user;
      const dt = new Date();
      update(ref(database, "users/" + user.uid), {
        last_login: dt,
      });
      var logouttext_login_pass = document.querySelector("#login-password");
      var logouttext_login_email = document.querySelector("#login-email");
      if (
        logouttext_login_email.value === loginEmail &&
        logouttext_login_pass.value === loginPassword
      )
        $("#openForm").hide();
      $("#login-div").hide();
      $("#logoutForm").show();
      $("#login-msg").show();
      setTimeout(() => {
        $("#login-msg").hide();
      }, 2500);
    })
    .catch((error) => {
      const errorCode = error.code;
      const errorMessage = error.message;
      //displays error if users details are inccorect
      $("#login-div").hide();
      $("#errorlog-msg").show();
      setTimeout(() => {
        $("#errorlog-msg").hide();
      }, 2500);
    });
});

//register form
document.getElementById("register-btn").addEventListener("click", function () {
  //fetches details from register form inputs
  const registerUsername = document.getElementById("register-username").value;
  const registerEmail = document.getElementById("register-email").value;
  const registerPassword = document.getElementById("register-password").value;

  //creates an account for the users
  createUserWithEmailAndPassword(auth, registerEmail, registerPassword)
    .then((userCredential) => {
      const user = userCredential.user;
      set(ref(database, "users/" + user.uid), {
        registerUsername: registerUsername,
        registerEmail: registerEmail,
      });

      var logouttext_register_pass =
        document.querySelector("#register-password");
      var logouttext_register_email = document.querySelector("#register-email");
      var logouttext_register_username =
        document.querySelector("#register-username");
      if (
        logouttext_register_email.value === registerEmail &&
        logouttext_register_pass.value === registerPassword &&
        logouttext_register_username.value === ""
      )
        $("#register-div").hide();
      $("#openForm").hide();
      $("#logoutForm").show();
      $("#register-msg").show();
      setTimeout(() => {
        $("#register-msg").hide();
      }, 2500);
    })
    .catch((error) => {
      const errorCode = error.code;
      const errorMessage = error.message;
      //displays error message if user if already registered/has an account.
      $("#register-div").hide();
      $("#errorReg-msg").show();
      setTimeout(() => {
        $("#errorReg-msg").hide();
      }, 2500);
    });
});

document.getElementById("logoutForm").addEventListener("click", function () {
  //signout button
  signOut(auth)
    .then(() => {
      document.getElementById("openForm").style.display = "block";
      document.getElementById("logoutForm").style.display = "none";
      $("#logout-msg").show();
      setTimeout(() => {
        $("#logout-msg").hide();
      }, 2500);
    })
    .catch((error) => {
      alert("Please try again ");
    });
});

//login form
onAuthStateChanged(auth, (user) => {
  if (user) {
    //displays logout option if users is authenticated and logged in
    document.getElementById("logoutForm").style.display = "block";
    document.getElementById("openForm").style.display = "none";
  } else {
    //hides logout option if users is not authenticated and not logged in
    document.getElementById("logoutForm").style.display = "none";
    document.getElementById("openForm").style.display = "block";
  }
});

//register form
onAuthStateChanged(auth, (userCredential) => {
  if (userCredential) {
    document.getElementById("openForm").style.display = "none";
    document.getElementById("logoutForm").style.display = "block";
  } else {
    document.getElementById("logoutForm").style.display = "none";
    document.getElementById("openForm").style.display = "block";
  }
});
document.getElementById("openForm").addEventListener("click", function () {
  document.getElementById("login-div").style.display = "inline";
});

document.getElementById("closeForm").addEventListener("click", function () {
  document.getElementById("register-div").style.display = "none";
  document.getElementById("login-div").style.display = "none";
});

document.getElementById("closeForm-2").addEventListener("click", function () {
  document.getElementById("register-div").style.display = "none";
  document.getElementById("login-div").style.display = "none";
});

$("#f-button").on("click", function writeUserData() {
  if (
    //prevents users from submitting contact form if values is null
    $("#name_fm").val() === "" ||
    $("#email_fm").val() === "" ||
    $("#subject_fm").val() === ""
  ) {
    $(".alert2").show();
    //   remove the alert
    setTimeout(() => {
      $(".alert2").hide();
    }, 2500);

    return false;
  } else {
    //data submitted to firebase database if user fills in there details
    push(ref(database, "ContactForm/"), {
      Name: $("#name_fm").val(),
      Email: $("#email_fm").val(),
      Subject: $("#subject_fm").val(),
    }),
      $(".alert").show();

    //   remove the alert
    setTimeout(() => {
      $(".alert").hide();
    }, 2500);
    $("#contactForm").trigger("reset");
  }
});

// add to cart conditions
$("#checkout").on("click", function () {
  onAuthStateChanged(auth, (user) => {
    if (user && $("#num8").html() !== "R0") {
      //directs user to payment form if user is logged in and has atleast 1 item in there cart
      document.location.href = "checkoutform.html";
    } else if ($("#num8").html() == "R0") {
      //prevents user from checking out if cart is empty
      $("#empty-msg").show();
      setTimeout(() => {
        $("#empty-msg").hide();
      }, 2500);
      return false;
    } else if (user !== auth) {
      //prevents user from checking out if user is not logged in
      $("#notlogoR-msg").show();
      setTimeout(() => {
        $("#notlogoR-msg").hide();
      }, 2500);
      $("#login-div").show();
      return false;
    }
  });
});

// buy now conditions
$(".btn-buy").on("click", function () {
  onAuthStateChanged(auth, (user) => {
    if (user) {
      document.location.href = "payment.html";
    } else {
      $("#notlogoR-msg").show();
      setTimeout(() => {
        $("#notlogoR-msg").hide();
      }, 2500);
      $("#login-div").show();
      return false;
    }
  });
});

$(".fa-eye").on("mouseover", function () {
  var PassVis = $("#login-password");
  if (PassVis.attr("type") === "password") {
    PassVis.attr("type", "text");
    //displays users password on hover (login form)
  } else {
    PassVis.attr("type", "password");
  }
});
$(".fa-eye").on("mouseout", function () {
  var PassHide = $("#login-password");
  if (PassHide.attr("type") === "text") {
    PassHide.attr("type", "password");
    //hides users password after hover (login form)
  } else {
    PassHide.attr("type", "text");
  }
});
$(".fa-eye").on("mouseover", function () {
  var RVis = $("#register-password");
  if (RVis.attr("type") === "password") {
    RVis.attr("type", "text");
    //displays users password on hover (register form)
  } else {
    RVis.attr("type", "password");
  }
});
$(".fa-eye").on("mouseout", function () {
  var RHide = $("#register-password");
  if (RHide.attr("type") === "text") {
    RHide.attr("type", "password");
    //hides users password after hover (register form)
  } else {
    RHide.attr("type", "text");
  }
});
