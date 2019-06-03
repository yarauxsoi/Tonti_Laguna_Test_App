function validateForm() {
  var width = document.forms["GenForm"]["width"];
  var height = document.forms["GenForm"]["height"];
  var radius = document.forms["GenForm"]["radius"];
  var intersection = document.forms["GenForm"]["intersection"];
  var quantity = document.forms["GenForm"]["quantity"];

  if (width.value.match(/^\d+$/) == null) {
    window.alert("Допустимы только числовые значения для ширины"); 
    width.focus();
    return false;
  }

  if (height.value.match(/^\d+$/) == null) {
    window.alert("Допустимы только числовые значения для высоты"); 
    height.focus();
    return false;
  }

  if (radius.value.match(/^\d+$/) == null) {
    window.alert("Допустимы только числовые значения для радиуса"); 
    radius.focus();
    return false;
  } else if (radius.value > width.value / 2 || radius.value > height.value / 2) {
    window.alert("Радиус не может превышать половину ширины или высоты изображения"); 
    radius.focus();
    return false;
  }

  return true;
}