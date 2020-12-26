function hitung() {
  var a = document.getElementById("box1").value;
  var b = document.getElementById("box2").value;
  var op = document.getElementById("operator").value;
  if (op == "+") {
      var hasil = parseInt(a) + parseInt(b);
  }
  else if (op == "-") {
      var hasil = parseInt(a) - parseInt(b);
  }
  else if (op == "x") {
      var hasil = parseInt(a) * parseInt(b);
  }
  else {
      var hasil = parseInt(a) / parseInt(b);
  }
  if (isNaN(hasil)) {
      document.getElementById("hasil").innerHTML = "Input Error";
  }
  else {
      document.getElementById("hasil").innerHTML = a + " " + op + " " + b + " = " + hasil;
      document.getElementById("box1").value = "";
      document.getElementById("box2").value = "";
  }
}